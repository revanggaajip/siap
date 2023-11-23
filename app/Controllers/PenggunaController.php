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
            'nama' => ucfirst($this->request->getVar('nama_pengguna')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir_pengguna'),
            'username' => $this->request->getVar('username_pengguna'),
            'password' => $encryptPassword,
            'hak_akses' => $this->request->getVar('hak_akses_pengguna'),
        ];
        // jika validasi sukses
        if($validation->run($pengguna, 'pengguna')) {
            $this->pengguna->save($pengguna);
            session()->setFlashdata('success', 'Data pengguna berhasil disimpan');
            return redirect()->to(base_url('pengguna'));
        // jika validasi gagal
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pengguna'));             
        }
    }

    public function edit($id_pengguna)
    {
        // validasi input data
        $validation = $this->services::validation();
        $pengguna = [
            'id' => $id_pengguna,
            'nama' => ucfirst($this->request->getVar('nama_pengguna')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir_pengguna'),
            'username' => $this->request->getVar('username_pengguna'),
            'hak_akses' => $this->request->getVar('hak_akses_pengguna'),
        ];
        if ($validation->run($pengguna, 'pengguna')) {
            $this->pengguna->save($pengguna, ['id' => $id_pengguna]);
            session()->setFlashdata('success', 'Data pengguna berhasil diubah');
            return redirect()->to(base_url('pengguna'));
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
           return redirect()->to(base_url('pengguna'));
        }
    }

    public function delete($id_pengguna)
    {
        $this->pengguna->delete(['id' => $id_pengguna]);
        session()->setFlashdata('success', 'Data Pengguna berhasil dihapus');
        return redirect()->to(base_url('pengguna'));
    }
}