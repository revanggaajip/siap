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
                'nama' => 'admin',
                'tanggal_lahir' => '2023-01-01',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'hak_akses' => 'Admin'
            ],
            [
                'nama' => 'user',
                'tanggal_lahir' => '2023-01-01',
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'hak_akses' => 'User'
            ]
        ]);
    }
}
