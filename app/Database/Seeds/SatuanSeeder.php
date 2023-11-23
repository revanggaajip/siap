<?php

namespace App\Database\Seeds;

use App\Models\Satuan;
use CodeIgniter\Database\Seeder;

class SatuanSeeder extends Seeder
{
    public function run()
    {
        $satuan = new Satuan();

        $satuan->insertBatch([
            ['nama' => 'Ampul'],
            ['nama' => 'Tablet'],
            ['nama' => 'Botol'],
            ['nama' => 'Kapsul'],
            ['nama' => 'PCS']
        ]);
    }
}