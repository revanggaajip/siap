<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Instansi;
use App\Models\Obat;
use App\Models\PenerimaanDetail;
use App\Models\PenerimaanHeader;
use App\Models\Riwayat;
use Config\Services;
use Dompdf\Dompdf;

class PenerimaanController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Penerimaan Obat';
        $this->obat = new Obat();
        $this->header = new PenerimaanHeader();
        $this->detail = new PenerimaanDetail();
        $this->obat = new Obat();
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
        return view('penerimaan/index', $data);
    }

    public function create()
    {
        $data['title'] = $this->title;
        $data['listObat'] = $this->obat->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('penerimaan/create', $data);
    }

    public function store()
    {
        // Panggil library validation
        $validation = $this->services::validation();
        // Tangkap data dari inputan
        $data = [
            'no_faktur' => $this->request->getVar('no_faktur'),
            'tanggal' => $this->request->getVar('tanggal'),
            'sp' => $this->request->getVar('sp'),
            'nama_supplier' => $this->request->getVar('nama_supplier')
        ];
        // Lakukan validasi data yang diinput berdasarkan file app/Config/Validation.php
        // Jika validasi sukses
        if ($validation->run($data, 'penerimaan')) {
            // Simpan data ke tabel
            $this->header->save($data);
            $jumlah = count($this->request->getvar('id_obat'));
            for ($i=0; $i < $jumlah; $i++) { 
                $id_obat = $this->request->getVar('id_obat')[$i];
                $quantity = $this->request->getVar('quantity')[$i];
                $kadaluarsa = $this->request->getVar('kadaluarsa')[$i];
                if ($quantity == true) {
                    $data = [
                        'id_penerimaan_header' => $this->header->getInsertID(),
                        'id_obat' => $id_obat,
                        'quantity' => $quantity,
                        'kadaluarsa' => $kadaluarsa
                    ];
                    $this->detail->save($data);

                    $obat = $this->obat->find($id_obat);
                    $stok = $obat['stok'] + $quantity;
                    $this->obat->save([
                        'id' => $id_obat,
                        'stok' => $stok, ['id' => $id_obat]
                    ]);

                    $this->riwayat->save([
                        'nama' => $obat['nama'],
                        'tanggal' => date('Y-m-d h:i:s'),
                        'stok_awal' => $obat['stok'],
                        'stok_perubahan' => $quantity,
                        'stok_akhir' => $stok,
                        'status' => 'Penerimaan',
                        'id_header' => $this->detail->getInsertID()
                    ]);
                }
            }
            return redirect()->to(route_to('home.index'));

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kategori.index'))->with('error', 'Data Kategori Obat Gagal Disimpan');
        }
    }

    public function bill($id) {
        $data['header'] = $this->header->where('id', $id)->first();
        $data['detail'] = $this->detail->detailPenerimaan($id);
        $instansi = new Instansi();
        $data['instansi'] = $instansi->first();
        return view('penerimaan/bill', $data);        
    }

    public function detail($id) {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        // $data['listObat'] = $this->obat->where('stok >', 0)->get()->getResultArray();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['header'] = $this->header->find($id);
        $data['dataPenerimaan'] = $this->detail->select('penerimaan_detail.id, obat.nama, obat.satuan, penerimaan_detail.quantity, penerimaan_detail.kadaluarsa')->join('obat', 'obat.id = penerimaan_detail.id_obat')->where('id_penerimaan_header', $id)->findAll();
        // dd($data);
        return view('penerimaan/detail', $data);
    }

    public function filter() {
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['validation'] = $this->services::validation();
        $data['title'] = 'Filter '. $this->title;
        return view('penerimaan/filter', $data);
    }

    public function report()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan penerimaan obat periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listLaporan'] = $this->header->where('tanggal >=', $awal)->where('tanggal <=', $akhir)->findAll();
        $data['instansi'] = $this->instansi->find(1);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('penerimaan/report', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }


}