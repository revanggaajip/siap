<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Instansi;
use App\Models\Obat;
use App\Models\PenjualanDetail;
use App\Models\PenjualanHeader;
use App\Models\Riwayat;
use Config\Services;
use Dompdf\Dompdf;

class PenjualanController extends BaseController
{
    public function __construct()
    {
        $this->obat = new Obat();
        $this->title = 'Penjualan Obat';
        $this->header = new PenjualanHeader(); 
        $this->detail = new PenjualanDetail();
        $this->riwayat = new Riwayat();
        $this->services = new Services();
        $this->instansi = new Instansi();
    }
    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['listHeader'] = $this->header->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('penjualan/data', $data);
    }

    public function create()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['listObat'] = $this->obat->where('stok >', 0)->get()->getResultArray();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $jumlahPenjualanHarian = $this->header->where('DATE_FORMAT(created_at, "%Y-%m-%d")', date('Y-m-d'))->countAllResults();
        if($jumlahPenjualanHarian > 0) {
            $data['id'] = 'P-'.date('dmY')."-".sprintf("%03s", ++$jumlahPenjualanHarian);
        } else {
            $data['id'] = 'P-'.date('dmY')."-001";
        }
        return view('penjualan/index', $data);
    }

    public function store()
    {
        $data['validation'] = $this->services::validation();
        $total = 0;
        $cart = \Config\Services::cart();
        // dd($cart);
        if(count($cart->contents()) == 0) {
            session()->setFlashdata('danger', 'Tidak ada data penjualan obat');
            return redirect()->to(route_to('penjualan.create'));
        }
        // simpan data transaksi header
        $this->header->insert([
            'id' => $this->request->getVar('id_penjualan_header'),
            'nama' => $this->request->getVar('nama'),
            'tanggal' => $this->request->getVar('tanggal'),
            'total' => 0,
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        // Simpan data transaksi detail
        foreach($cart->contents() as $item) {
            $this->detail->save([
                'id_penjualan_header' => $this->request->getVar('id_penjualan_header'),
                'id_obat' => $item['id'],
                'quantity' => $item['qty'],
                'subtotal' => $item['subtotal'],
            ]);

            $obat = $this->obat->find($item['id']); 
            $stok = $obat['stok'] - $item['qty'];

            // update stok obat
            $this->obat->save([
                'id' => $item['id'],
                'stok' => $stok], ['id' => $item['id']
            ]);

            $this->riwayat->save([
                'nama' => $obat['nama'],
                'tanggal' => date('Y-m-d h:i:s'),
                'stok_awal' => $obat['stok'],
                'stok_perubahan' => $item['qty'],
                'stok_akhir' => $stok,
                'status' => 'Penjualan',
                'id_header' => $this->detail->getInsertID()
            ]);

            // menghitung total transaksi
            $total += $item['subtotal'];
        }
        $cart->destroy();

        // update total transaksi
        $this->header->save([
            'id' => $this->request->getVar('id_penjualan_header'),
            'total' => $total,
        ], ['id' => $this->request->getVar('id_penjualan_header')]);

        return redirect()->to(base_url('penjualan/bill/'.$this->request->getVar('id_penjualan_header')));
    }

    public function tambahKeranjang() {
        $cart = \Config\Services::cart();
        $obat = $this->obat->where('id', $this->request->getVar('id'))->first();
        $cart->insert([
            'id'    => $this->request->getVar('id'),
            'qty'   => $this->request->getVar('quantity'),
            'price' => $obat['harga'],
            'name'  => $obat['nama'],
        ]);
        return json_encode([
            'status' => 'success',
            'pesan' => 'Obat berhasil ditambah ke keranjang'
        ]);

    }

    public function lihatKeranjang() {
        if($this->request->isAJAX()) {
            $cart = \Config\Services::cart();
            $response = $cart->contents();
            return json_encode($response);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapusKeranjang($id) {
        if($this->request->isAJAX()){
            $cart = \Config\Services::cart();
            $cart->remove($id);
            return json_encode([
                'status' => 'success',
                'pesan' => 'Obat berhasil dihapus dari keranjang'
            ]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function cekSubtotal() {
        if($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $qty = $this->request->getVar('qty');
            $obat = $this->obat->where('id', $id)->first();
            $subtotal = $obat['harga'] * $qty;
            return json_encode([
                'status' => 'success',
                'obat' => $obat,
                'data' => $subtotal
            ]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function bill($id) {
        $data['header'] = $this->header->where('id', $id)->first();
        $data['detail'] = $this->detail->detailPenjualan($id);
        $instansi = new Instansi;
        $data['instansi'] = $instansi->first();
        return view('penjualan/bill', $data);
    }

    public function detail($id) {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['listObat'] = $this->obat->where('stok >', 0)->get()->getResultArray();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['header'] = $this->header->find($id);
        $data['dataPenjualan'] = $this->detail->select('penjualan_detail.id, obat.nama, obat.harga, penjualan_detail.quantity, penjualan_detail.subtotal')->join('obat', 'obat.id = penjualan_detail.id_obat')->where('id_penjualan_header', $id)->findAll();
        return view('penjualan/detail', $data);
    }
    
    public function filter() {
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['validation'] = $this->services::validation();
        $data['title'] = 'Filter '. $this->title;
        return view('penjualan/filter', $data);
    }

    public function report() {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan penjualan periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listLaporan'] = $this->header->where('tanggal >=', $awal)->where('tanggal <=', $akhir)->findAll();
        $data['instansi'] = $this->instansi->find(1);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('penjualan/report', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}