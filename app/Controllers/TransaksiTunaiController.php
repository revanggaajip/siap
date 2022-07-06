<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\JurnalDetail;
use App\Models\JurnalHeader;
use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Config\Services;
use Dompdf\Dompdf;

class TransaksiTunaiController extends BaseController
{
    public function __construct()
    {
        $this->title = "Transaksi Tunai";
        $this->header = new TransaksiHeader;
        $this->detail = new TransaksiDetail;
        $this->services = new Services;
        $this->barang = new Barang;
        $this->jurnalHeader = new JurnalHeader;
        $this->jurnalDetail = new JurnalDetail;
    }
    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['listBarang'] = $this->barang->get()->getResultArray();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $jumlahTranksaksiHarian = $this->header->where('tanggal_transaksi', date('Y-m-d'))->countAllResults();
        if($jumlahTranksaksiHarian > 0) {
            $data['id'] = 'Transaksi-'.date('dmY')."-".sprintf("%03s", ++$jumlahTranksaksiHarian);
        } else {
            $data['id'] = 'Transaksi-'.date('dmY')."-001";
        }
        return view('transaksi/tunai/index', $data);
    }

    public function tambahKeranjang() {
        $cart = \Config\Services::cart();
        $barang = $this->barang->where('id_barang', $this->request->getVar('id_barang'))->first();
        $cart->insert([
            'id'    => $this->request->getVar('id_barang'),
            'qty'   => $this->request->getVar('quantity_barang'),
            'price' => $barang['harga_barang'],
            'name'  => $barang['nama_barang'],
        ]);
        return json_encode([
            'status' => 'success',
            'pesan' => 'Barang berhasil ditambah ke keranjang'
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
                'pesan' => 'Barang berhasil dihapus dari keranjang'
            ]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function cekSubtotal() {
        if($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $qty = $this->request->getVar('qty');
            $barang = $this->barang->where('id_barang', $id)->first();
            $subtotal = $barang['harga_barang'] * $qty;
            return json_encode([
                'status' => 'success',
                'barang' => $barang,
                'data' => $subtotal
            ]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create() {
        $data['validation'] = $this->services::validation();
        $total = 0;
        $cart = \Config\Services::cart();
        if(count($cart->contents()) == 0) {
            session()->setFlashdata('danger', 'Tidak ada data transaksi');
            return redirect()->to(base_url('transaksi-tunai'));
        }
        // simpan data transaksi header
        $this->header->insert([
            'id_transaksi_header' => $this->request->getVar('id_transaksi_header'),
            'id_pelanggan' => null,
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'jenis_transaksi' => 'Tunai',
            'tanggal_transaksi' => $this->request->getVar('tanggal_transaksi'),
            'tanggal_jatuh_tempo_transaksi' => null,
            'total_transaksi' => 0,
            'piutang_transaksi' => 0,
            'status_transaksi' => 'Lunas',
            'keterangan_transaksi' => $this->request->getVar('keterangan_transaksi'),
        ]);
        // Simpan data transaksi detail
        foreach($cart->contents() as $item) {
            $this->detail->save([
                'id_transaksi_header' => $this->request->getVar('id_transaksi_header'),
                'id_barang' => $item['id'],
                'quantity_barang' => $item['qty'],
                'subtotal_transaksi' => $item['subtotal'],
            ]);
            // update stok barang
            $barang = $this->barang->where('id_barang', $item['id'])->first();
            $stok = $barang['stok_barang'] - $item['qty'];
            $this->barang->save([
                'id_barang' => $item['id'],
                'stok_barang' => $stok], ['id_barang' => $item['id']
            ]);
            // menghitung total transaksi
            $total += $item['subtotal'];
        }
        $cart->destroy();

        // update total transaksi
        $this->header->save([
            'id_transaksi_header' => $this->request->getVar('id_transaksi_header'),
            'total_transaksi' => $total,
        ], ['id_transaksi_header' => $this->request->getVar('id_transaksi_header')]);

        // simpan data jurnal header
        $idJurnal = str_replace("Transaksi-","JU-",$this->request->getVar('id_transaksi_header'));
        $this->jurnalHeader->insert([
            'id_jurnal_header' => $idJurnal,
            'status_posting_jurnal' => 'Belum Posting',
            'tanggal_jurnal' => $this->request->getVar('tanggal_transaksi'),
            'id_transaksi_header' => $this->request->getVar('id_transaksi_header'),
            'keterangan_jurnal' => 'Penjualan'
        ]);
        // simpan data jurnal detail
        $this->jurnalDetail->insertBatch([
            [
                'id_jurnal_header' =>  $idJurnal,
                'id_akun' => '101',
                'debit' => $total,
                'kredit' => 0
            ],
            [
                'id_jurnal_header' =>  $idJurnal,
                'id_akun' => '400',
                'debit' => 0,
                'kredit' => $total
            ]
        ]);
        return redirect()->to(base_url('transaksi-tunai/bill/'.$this->request->getVar('id_transaksi_header')));

    }

    public function bill($id) {
        $data['header'] = $this->header->where('id_transaksi_header', $id)->first();
        $data['detail'] = $this->detail->detailNota($id);
        return view('transaksi/tunai/bill', $data);
    }
}