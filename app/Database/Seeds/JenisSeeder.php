<?php

namespace App\Database\Seeds;

use App\Models\Jenis;
use CodeIgniter\Database\Seeder;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $jenis = new Jenis();

        $jenis->insertBatch([
            ['nama' => 'Obat Oral'],
            ['nama' => 'Obat Oles']
        ]);
    }
}