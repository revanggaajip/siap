<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi_detail' => ['type' => 'bigint', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'id_transaksi_header' => ['type' => 'varchar', 'constraint' => 20],
            'id_barang' => ['type' => 'bigint', 'constraint' => 20],
            'quantity_barang' => ['type' => 'bigint', 'constraint' => 20],
            'subtotal_transaksi' => ['type' => 'long'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]            
        ]);
        $this->forge->addKey('id_transaksi_detail', true);
        $this->forge->createTable('transaksi_detail');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_detail');
    }
}
