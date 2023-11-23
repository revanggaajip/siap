<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenjualanDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'bigint', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'id_penjualan_header' => ['type' => 'char', 'constraint' => 22],
            'id_obat' => ['type' => 'char', 'constraint' => 7],
            'quantity' => ['type' => 'int', 'constraint' => 5],
            'subtotal' => ['type' => 'bigint', 'constraint' => 20],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penjualan_detail');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan_detail');
    }
}