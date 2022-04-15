<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class AuthController extends BaseController
{

    public function __construct()
    {
        $this->pengguna = new Pengguna;
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $pengguna = $this->pengguna->where('username_pengguna', $username)->first();
        if ($pengguna) {
            if (password_verify($password, $pengguna['password_pengguna'])) {
                $session_data = [
                    'id_pengguna' => $pengguna['id_pengguna'],
                    'nama_pengguna' => $pengguna['nama_pengguna'],
                    'hak_akses_pengguna' => $pengguna['hak_akses_pengguna']
                ];
                session()->set($session_data);
                return redirect()->to(base_url('/'));
            } else {
                return redirect()->to(base_url('login'))->withInput()->with('danger', 'Password tidak sesuai');
            }
        } else {
            return redirect()->to(base_url('login'))->withInput()->with('danger', 'Username tidak ditemukan');
        }

    }

    public function edit()
    {}

    public function update()
    {

    }

    public function logout() 
    {
        session()->remove('id_pengguna');
        session()->remove('nama_pengguna');
        session()->remove('hak_akses_pengguna');
        return redirect()->to(base_url('login'));
    }
}
