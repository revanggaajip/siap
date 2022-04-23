<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JurnalHeaderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jurnal_header' => ['type' => 'char', 'constraint' => 19],
            'status_posting_jurnal' => ['type' => 'enum', 'constraint' => ['Posting', 'Belum Posting']],
            'tanggal_jurnal' => ['type' => 'date'],
            'id_transaksi_header' => ['type' => 'char', 'constraint' => 20],
            'keterangan_jurnal' => ['type' => 'varchar', 'constraint' => 100],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]   
        ]);
        $this->forge->addKey('id_jurnal_header', true);
        $this->forge->createTable('jurnal_header');
    }

    public function down()
    {
        $this->forge->dropTable('jurnal_header');
    }
}
