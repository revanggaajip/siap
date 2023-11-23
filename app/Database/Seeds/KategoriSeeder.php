<?php

namespace App\Database\Seeds;

use App\Models\Kategori;
use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = new Kategori();
        $kategori->insertBatch([
            ['nama' => 'Generik'],
            ['nama' => 'Non Generik']
        ]);
    }
}