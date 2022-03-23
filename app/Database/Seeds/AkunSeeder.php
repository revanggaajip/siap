<?php

namespace App\Database\Seeds;

use App\Models\Akun;
use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $akun = new Akun;
        $akun->insertBatch([
            [
                'id_akun' => 101,
                'nama_akun' => 'Kas',
                'jenis_akun' => 'Debit',
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa")
            ],
            [
                'id_akun' => 102,
                'nama_akun' => 'Persediaan barang dagang',
                'jenis_akun' => 'Debit',
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa")
            ],
            [
                'id_akun' => 103,
                'nama_akun' => 'Piutang usaha',
                'jenis_akun' => 'Debit',
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa")
            ],
            [
                'id_akun' => 400,
                'nama_akun' => 'Penjualan',
                'jenis_akun' => 'Kredit',
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa")
            ],
            [
                'id_akun' => 402,
                'nama_akun' => 'Potongan penjualan',
                'jenis_akun' => 'Debit',
                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa")
            ],

        ]);
    }
}
