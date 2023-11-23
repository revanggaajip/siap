<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('InstansiSeeder');
        $this->call('PenggunaSeeder');
        $this->call('SatuanSeeder');
        $this->call('GolonganSeeder');
        $this->call('KategoriSeeder');
        $this->call('JenisSeeder');
    }
}