<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jenis;
use Config\Services;

class JenisController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Jenis Obat';
        $this->jenis = new Jenis();
        $this->services = new Services();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['listJenis'] = $this->jenis->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('jenis/index', $data);
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
        if ($validation->run($data, 'jenis')) {
            // Simpan data ke tabel
            $this->jenis->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('jenis.index'))->with('success', 'Data Jenis Obat Berhasil Disimpan');
            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('jenis.index'))->with('error', 'Data Jenis Obat Gagal Disimpan');
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
        $validationResult  = $validation->run($data, 'jenis');
        // Jika validasi sukses
        if ($validationResult) {
            // Simpan data ke tabel
            $this->jenis->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('jenis.index'))->with('success', 'Data Jenis Obat Berhasil Diedit');

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('jenis.index'))->with('error', 'Data Jenis Obat Gagal Diedit');
        }
    }

    public function delete($id)
    {
        $deleted = $this->jenis->delete(['id', $id]);
        if ($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('jenis.index'))->with('success', 'Data Jenis Obat Berhasil Dihapus');
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('jenis.index'))->with('error', 'Data Jenis Obat Gagal Dihapus');
        }
    }
}