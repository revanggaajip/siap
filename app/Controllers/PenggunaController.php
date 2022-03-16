<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use Config\Services;

class PenggunaController extends BaseController
{

    public function __construct()
    {
        $this->title = 'Pengguna';
        $this->services = new Services;
        $this->pengguna = new Pengguna;
    }

    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listPengguna'] = $this->pengguna->get()->getResultArray();
        return view('pengguna/index', $data);
    }

    public function create()
    {
        // Ambil data tanggal lahir untuk password
        $passwordPengguna = date("dmY", strtotime($this->request->getVar('tanggal_lahir_pengguna')));
        // enkripsi data password
        $encryptPassword = password_hash($passwordPengguna, PASSWORD_DEFAULT);
        // validasi input data
        $validation = $this->services::validation();
        $pengguna = [
            'nama_pengguna' => ucfirst($this->request->getVar('nama_pengguna')),
            'tanggal_lahir_pengguna' => $this->request->getVar('tanggal_lahir_pengguna'),
            'username_pengguna' => $this->request->getVar('username_pengguna'),
            'password_pengguna' => $passwordPengguna,
            'hak_akses_pengguna' => $this->request->getVar('hak_akses_pengguna'),
        ];
        // jika validasi sukses
        if($validation->run($pengguna, 'createPengguna')) {
            $this->pengguna->save($pengguna);
            session()->setFlashdata('success', 'Data kriteria berhasil disimpan');
            return redirect()->to(base_url('pengguna'));
        // jika validasi gagal
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pengguna'));             
        }
    }
}
