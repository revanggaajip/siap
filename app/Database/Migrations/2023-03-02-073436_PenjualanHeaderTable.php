<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenjualanHeaderTable extends Migration
{    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'char', 'constraint' => 22 ],
            'nama' => ['type' => 'varchar', 'constraint' => 100],
            'tanggal' => ['type' => 'date'],
            'total' => ['type' => 'bigint'],
            'keterangan' => ['type' => 'text', 'null' => true],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penjualan_header');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan_header');
    }
}