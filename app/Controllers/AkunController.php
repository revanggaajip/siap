<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun;
use Config\Services;

class AkunController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Akun';
        $this->services = new Services;
        $this->akun = new Akun;
    }

    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listAkun'] = $this->akun->get()->getResultArray();
        return view('akun/index', $data);
    }

    public function create()
    {
            $validation = $this->services::validation();
            $akun = [
                'id_akun' => $this->request->getVar('id_akun'),
                'nama_akun' => ucfirst($this->request->getVar('nama_akun')),
                'jenis_akun' => $this->request->getVar('jenis_akun'),
            ];
            if($validation->run($akun, 'createAkun')) {
                $this->akun->save($akun);
                session()->setFlashdata('success', 'Data akun berhasil disimpan');
                return redirect()->to(base_url('akun'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());
               return redirect()->to(base_url('akun'));             
            }
    }

    public function edit($id_akun)
    {   
        $validation = $this->services::validation();
        $akun = [
            'id_akun' => $this->request->getVar('id_akun'),
            'nama_akun' => ucfirst($this->request->getVar('nama_akun')),
            'jenis_akun' => $this->request->getVar('jenis_akun'),
        ];
        if ($validation->run($akun, 'editAkun')) {
            $this->akun->save($akun, ['id_akun' => $id_akun]);
            session()->setFlashdata('success', 'Data Akun berhasil diubah');
            return redirect()->to(base_url('akun'));
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
           return redirect()->to(base_url('akun'));
        }
    }

    public function delete($id_akun)
    {
        $this->akun->delete(['id_akun' => $id_akun]);
        session()->setFlashdata('success', 'Data Akun berhasil dihapus');
        return redirect()->to(base_url('akun'));
    }
}
