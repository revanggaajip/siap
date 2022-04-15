<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AngsuranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_angsuran' => ['type' => 'char', 'constraint' => 20],
            'tanggal_angsuran' => ['type' => 'date'],
            'id_transaksi_header' => ['type' => 'char', 'constraint' => 20],
            'nomor_angsuran' => ['type' => 'int', 'constraint' => 3],
            'nominal_angsuran' => ['type' => 'long'],
            'piutang_transaksi' => ['type' => 'long'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]   
        ]);
        $this->forge->addKey('id_angsuran', true);
        $this->forge->createTable('angsuran');
    }

    public function down()
    {
        $this->forge->dropTable('angsuran');
    }
}
