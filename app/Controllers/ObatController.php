<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Golongan;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Obat;
use App\Models\Satuan;
use Config\Services;

class ObatController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Obat';
        $this->obat = new Obat();
        $this->jenis = new Jenis();
        $this->golongan = new Golongan();
        $this->kategori = new Kategori();
        $this->satuan = new Satuan();
        $this->services = new Services();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listObat'] = $this->obat->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listGolongan'] = $this->golongan->findAll();
        $data['listSatuan'] = $this->satuan->findAll();
        $data['listJenis'] = $this->jenis->findAll();
        $data['listKategori'] = $this->kategori->findAll();
        $jumlahObat = $this->obat->countAll();
        if ($jumlahObat > 0) {
            $data['id'] = 'OBT-'.sprintf("%03s", ++$jumlahObat);
        } else {
            $data['id'] = 'OBT-001';
        }
        return view('obat/index', $data);
    }
    
    // public function create()
    // {
    //     $data['listGolongan'] = $this->golongan->findAll();
    //     $data['listSatuan'] = $this->satuan->findAll();
    //     $data['listJenis'] = $this->jenis->findAll();
    //     $data['listKategori'] = $this->kategori->findAll();
    //     $data['title'] = $this->title;
    //     $data['validation'] = $this->services::validation();
    //     return view('obat/create', $data);

    // }

    public function store()
    {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $data = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'kandungan' => $this->request->getVar('kandungan'),
            'jenis' => $this->request->getVar('jenis'),
            'satuan' => $this->request->getVar('satuan'),
            'golongan' => $this->request->getVar('golongan'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'kapasitas' => $this->request->getVar('kapasitas'),
            'min_stok' => $this->request->getVar('min_stok'),
        ];
        // dd($data);
         // Lakukan validasi
        if($validation->run($data, 'obat')) {
            //jika validasi sukses
            // Simpan Data
            $this->obat->save($data);
            // Redirect + pesan sukses
            return redirect()->to(route_to('obat.index'))->with('success', 'Data obat berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->back()->withInput()->with('error', 'Data obat gagal disimpan');             
        }
        
    }

    public function detail($id)
    {
        $data['title'] = $this->title;
        $data['obat'] = $this->obat->where('id', $id)->first();
        $data['listGolongan'] = $this->golongan->findAll();
        $data['listSatuan'] = $this->satuan->findAll();
        $data['listJenis'] = $this->jenis->findAll();
        $data['listKategori'] = $this->kategori->findAll();
        return view('obat/detail', $data);
        
    }
    
    public function edit($id)
    {
        // Panggil data judul;
        $data['title'] = $this->title;
        // Panggill validasi
        $data['validation'] = $this->services::validation();
        // panggil data obat
        $data['obat'] = $this->obat->where('id', $id)->first();

        $data['listGolongan'] = $this->golongan->findAll();
        $data['listSatuan'] = $this->satuan->findAll();
        $data['listJenis'] = $this->jenis->findAll();
        $data['listKategori'] = $this->kategori->findAll();
        // tampilkan halaman edit obat
        return view('obat/edit', $data);
    }

        public function update($id)
    {
         // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kandungan' => $this->request->getVar('kandungan'),
            'jenis' => $this->request->getVar('jenis'),
            'satuan' => $this->request->getVar('satuan'),
            'golongan' => $this->request->getVar('golongan'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'kapasitas' => $this->request->getVar('kapasitas'),
            'min_stok' => $this->request->getVar('min_stok'),
        ];
         // Lakukan validasi
        if($validation->run($data, 'obat')) {
            //jika validasi sukses
            // Simpan Data
            $this->obat->save($data, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('obat.index'))->with('success', 'Data obat berhasil update');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->back()->withInput()->with('error', 'Data obat gagal diupdate');             
        }
    }

    public function delete($id) {
        // Menghapus data
        $deleted = $this->obat->delete(['id' => $id]);
        // Jika data terhapus
        if($deleted) {
            // redirect index obat + pesan sukses
            return redirect()->to(route_to('obat.index'))->with('success', 'Data obat berhasil dihapus');
        // Jika data tidak terhapus
        } else {
            // redirect index obat + pesan gagal
            return redirect()->to(route_to('obat.index'))->with('error', 'Data obat gagal dihapus');             
        }
    }
}