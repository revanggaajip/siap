<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use Config\Services;

class BarangController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Barang';
        $this->services = new Services;
        $this->barang = new Barang;
    }

    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listBarang'] = $this->barang->get()->getResultArray();
        return view('barang/index', $data);
    }

    public function create()
    {
        // validasi input data
        $validation = $this->services::validation();
        $barang = [
            'nama_barang' => ucfirst($this->request->getVar('nama_barang')),
            'stok_barang' => $this->request->getVar('stok_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
        ];
        // jika validasi sukses
        if($validation->run($barang, 'createBarang')) {
            $this->barang->save($barang);
            session()->setFlashdata('success', 'Data barang berhasil disimpan');
            return redirect()->to(base_url('barang'));
        // jika validasi gagal
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('barang'));             
        }
    }

    public function edit($id_barang)
    {
        // Panggil library validasi
        $validation = $this->services::validation();
        // ambil data dari form
        $barang = [
            'id_barang' => $id_barang,
            'nama_barang' => ucfirst($this->request->getVar('nama_barang')),
            'stok_barang' => $this->request->getVar('stok_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
        ];
        // validasi data
        if ($validation->run($barang, 'editBarang')) {
            // jika benar save
            $this->barang->save($barang, ['id_barang' => $id_barang]);
            session()->setFlashdata('success', 'Data barang berhasil diubah');
            return redirect()->to(base_url('barang'));
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
           return redirect()->to(base_url('barang'));
        }
    }

    public function delete($id_barang)
    {
        $this->barang->delete(['id_barang' => $id_barang]);
        session()->setFlashdata('success', 'Data barang berhasil dihapus');
        return redirect()->to(base_url('barang'));
    }
}
