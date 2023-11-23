<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Golongan;
use Config\Services;

class GolonganController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Golongan Obat';
        $this->golongan = new Golongan();
        $this->services = new Services();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['listGolongan'] = $this->golongan->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('golongan/index', $data);
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
        if ($validation->run($data, 'golongan')) {
            // Simpan data ke tabel
            $this->golongan->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('golongan.index'))->with('success', 'Data Golongan Obat Berhasil Disimpan');
            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('golongan.index'))->with('error', 'Data Golongan Obat Gagal Disimpan');
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
        $validationResult  = $validation->run($data, 'golongan');
        // Jika validasi sukses
        if ($validationResult) {
            // Simpan data ke tabel
            $this->golongan->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('golongan.index'))->with('success', 'Data Golongan Obat Berhasil Diedit');

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('golongan.index'))->with('error', 'Data Golongan Obat Gagal Diedit');
        }
    }

    public function delete($id)
    {
        $deleted = $this->golongan->delete(['id', $id]);
        if ($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('golongan.index'))->with('success', 'Data Golongan Obat Berhasil Dihapus');
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('golongan.index'))->with('error', 'Data Golongan Obat Gagal Dihapus');
        }
    }
}