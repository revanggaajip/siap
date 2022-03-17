<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'   => [
                'type'          => 'VARCHAR',
                'constraint'    => 10,
            ],
            'nama_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'unique'        => true
            ],
            'stok_barang' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'satuan_barang' => [
                'type'          => 'ENUM',
                'constraint'    => ['G', 'KG', 'Drum']
            ],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ]            
        ]);

        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
