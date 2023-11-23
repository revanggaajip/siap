<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Instansi;
use Config\Services;

class InstansiController extends BaseController
{
    public function index()
    {
        $instansi = new Instansi();
        
        $data['title'] = 'Instansi';
        $data['instansi'] = $instansi->find('1');
        $data['validation'] = Services::validation();
        $data['breadcrumb'] = $this->breadcrumb('Instansi');
        return view('instansi/index', $data);
    }

    public function update()
    {
        $instansi = new Instansi();
        // panggil helper validasi input data
        $validation = Services::validation();

        // Ambil data dari inputan
        $data = [
            'id' => 1,
            'nama' => $this->request->getVar('nama'),
            'alamat'=> $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
            // 'role' => $this->request->getVar('role'),
        ];
        // Lakukan validasi
        if($validation->run($data, 'instansi')) {
            //jika validasi sukses
            // Simpan Data
            $instansi->save($data, ['id' => 1]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('instansi.index'))->with('success', 'Data instansi berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('instansi.index'))->with('error', 'Data instansi gagal diupdate');             
        }
    }
}