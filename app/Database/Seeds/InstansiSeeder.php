<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Instansi;

class InstansiSeeder extends Seeder
{
    public function run()
    {
        $instansi = new Instansi();
        $instansi->save([
            'nama' => 'Puskesmas Batang I',
            'alamat'=> 'Jl. RE Martadinata No.145, Klidangkongsi, Proyonanggan Utara, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216',
            'telepon' => '(0285) 391483'
        ]);
    }
}