<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan;
use Config\Services;

class pelangganController extends BaseController
{

    public function __construct()
    {
        $this->title = 'Pelanggan';
        $this->services = new Services;
        $this->pelanggan = new Pelanggan;
    }

    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listPelanggan'] = $this->pelanggan->get()->getResultArray();
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        $validation = $this->services::validation();
        $pelanggan = [
            'nama_pelanggan' => ucfirst($this->request->getVar('nama_pelanggan')),
            'no_hp_pelanggan' => $this->request->getVar('no_hp_pelanggan'),
            'alamat_pelanggan' => $this->request->getVar('alamat_pelanggan')
        ];
        // jika validasi sukses
        if($validation->run($pelanggan, 'createPelanggan')) {
            $this->pelanggan->save($pelanggan);
            session()->setFlashdata('success', 'Data pelanggan berhasil disimpan');
            return redirect()->to(base_url('pelanggan'));
        // jika validasi gagal
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pelanggan'));             
        }
    }

    public function edit($id_pelanggan)
    {
        // validasi input data
        $validation = $this->services::validation();
        $pelanggan = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => ucfirst($this->request->getVar('nama_pelanggan')),
            'no_hp_pelanggan' => $this->request->getVar('no_hp_pelanggan'),
            'alamat_pelanggan' => $this->request->getVar('alamat_pelanggan')
        ];
        if ($validation->run($pelanggan, 'editPelanggan')) {
            $this->pelanggan->save($pelanggan, ['id_pelanggan' => $id_pelanggan]);
            session()->setFlashdata('success', 'Data pelanggan berhasil diubah');
            return redirect()->to(base_url('pelanggan'));
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
           return redirect()->to(base_url('pelanggan'));
        }
    }

    public function delete($id_pelanggan)
    {
        $this->pelanggan->delete(['id_pelanggan' => $id_pelanggan]);
        session()->setFlashdata('success', 'Data pelanggan berhasil dihapus');
        return redirect()->to(base_url('pelanggan'));
    }
}
