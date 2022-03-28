<?php

namespace App\Database\Seeds;

use App\Models\Pengguna;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $pengguna  = new Pengguna;
        $pengguna->insertBatch([
            [
                'nama_pengguna' => 'Pemilik',
                'tanggal_lahir_pengguna' => '2022-01-01',
                'username_pengguna' => 'pemilik',
                'password_pengguna' => password_hash('pemilik', PASSWORD_DEFAULT),
                'hak_akses_pengguna' => 'Pemilik'
            ],
            [
                'nama_pengguna' => 'Admin',
                'tanggal_lahir_pengguna' => '2022-01-01',
                'username_pengguna' => 'admin',
                'password_pengguna' => password_hash('admin', PASSWORD_DEFAULT),
                'hak_akses_pengguna' => 'Admin'
            ]
        ]);
    }
}
