<?php

namespace App\Database\Seeds;

use App\Models\Golongan;
use CodeIgniter\Database\Seeder;

class GolonganSeeder extends Seeder
{
    public function run()
    {
        $golongan = new Golongan();

        $golongan->insertBatch([
            ['nama' => 'Obat Bebas'],
            ['nama' => 'Obat Bebas Terbatas'],
            ['nama' => 'Obat Keras'],
            ['nama' => 'Multivitamin']
        ]);
    }
}