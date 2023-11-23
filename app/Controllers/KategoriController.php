<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use CodeIgniter\Config\Services;

class KategoriController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Kategori Obat';
        $this->kategori = new Kategori();
        $this->services = new Services();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['listKategori'] = $this->kategori->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('kategori/index', $data);
    }

    public function store()
    {
        // Panggil library validation
        $validation = $this->services::validation();
        // Tangkap data dari inputan
        $data = [
            'nama' => ucfirst($this->request->getVar('nama')),
        ];
        // Lakukan validasi data yang diinput berdasarkan file app/Config/Validation.php
        // Jika validasi sukses
        if ($validation->run($data, 'kategori')) {
            // Simpan data ke tabel
            $this->kategori->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('kategori.index'))->with('success', 'Data Kategori Obat Berhasil Disimpan');
            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kategori.index'))->with('error', 'Data Kategori Obat Gagal Disimpan');
        }
    }

    public function update($id)
    {

        // Panggil library validation
        $validation = $this->services::validation();
        // Tangkap data dari inputan
        $data = array(
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
        );
        // Lakukan validasi data yang diinput berdasarkan file app/Config/Validation.php
        $validationResult  = $validation->run($data, 'kategori');
        // Jika validasi sukses
        if ($validationResult) {
            // Simpan data ke tabel
            $this->kategori->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('kategori.index'))->with('success', 'Data Kategori Obat Berhasil Diedit');

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kategori.index'))->with('error', 'Data Kategori Obat Gagal Diedit');
        }
    }

    public function delete($id)
    {
        $deleted = $this->kategori->delete(['id', $id]);
        if ($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('kategori.index'))->with('success', 'Data Kategori Obat Berhasil Dihapus');
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('kategori.index'))->with('error', 'Data Kategori Obat Gagal Dihapus');
        }
    }
}