<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriNonMedis;
use Config\Services;

class KategoriNonMedisController extends BaseController
{
public function __construct()
    {
        $this->title = 'Kategori Non Medis';
        $this->knm = new KategoriNonMedis();
        $this->services = new Services();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['listKNM'] = $this->knm->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('knm/index', $data);
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
        if ($validation->run($data, 'knm')) {
            // Simpan data ke tabel
            $this->knm->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('knm.index'))->with('success', 'Data Kategori Non Medis Berhasil Disimpan');
            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('knm
            .index'))->with('error', 'Data Kategori Non Medis Gagal Disimpan');
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
        $validationResult  = $validation->run($data, 'knm');
        // Jika validasi sukses
        if ($validationResult) {
            // Simpan data ke tabel
            $this->knm->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('knm.index'))->with('success', 'Data Kategori Non Medis Berhasil Diedit');

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('knm.index'))->with('error', 'Data Kategori Non Medis Gagal Diedit');
        }
    }

    public function delete($id)
    {
        $deleted = $this->knm->delete(['id', $id]);
        if ($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('knm.index'))->with('success', 'Data Kategori Non Medis Berhasil Dihapus');
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('knm.index'))->with('error', 'Data Kategori Non Medis Gagal Dihapus');
        }
    }
}