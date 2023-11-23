<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Satuan;
use Config\Services;

class SatuanController extends BaseController
{
public function __construct()
    {
        $this->title = 'Satuan Obat';
        $this->satuan = new Satuan();
        $this->services = new Services();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['listSatuan'] = $this->satuan->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('satuan/index', $data);
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
        if ($validation->run($data, 'satuan')) {
            // Simpan data ke tabel
            $this->satuan->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('satuan.index'))->with('success', 'Data Satuan Obat Berhasil Disimpan');
            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('satuan.index'))->with('error', 'Data Satuan Obat Gagal Disimpan');
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
        $validationResult  = $validation->run($data, 'satuan');
        // Jika validasi sukses
        if ($validationResult) {
            // Simpan data ke tabel
            $this->satuan->save($data);
            // Redirect ke halaman index + Pesan
            return redirect()->to(route_to('satuan.index'))->with('success', 'Data Satuan Obat Berhasil Diedit');

            // jika validasi gagal
        } else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('satuan.index'))->with('error', 'Data Satuan Obat Gagal Diedit');
        }
    }

    public function delete($id)
    {
        $deleted = $this->satuan->delete(['id', $id]);
        if ($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('satuan.index'))->with('success', 'Data Satuan Obat Berhasil Dihapus');
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('satuan.index'))->with('error', 'Data Satuan Obat Gagal Dihapus');
        }
    }
}