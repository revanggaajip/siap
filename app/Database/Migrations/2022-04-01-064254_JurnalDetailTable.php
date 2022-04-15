<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JurnalDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jurnal_detail' => ['type' => 'bigint', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'id_jurnal_header' => ['type' => 'char', 'constraint' => 20],
            'id_akun' => ['type' => 'varchar', 'constraint' => 5],
            'debit' => ['type' => 'long'],
            'kredit' => ['type' => 'long'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]   
        ]);
        $this->forge->addKey('id_jurnal_detail', true);
        $this->forge->createTable('jurnal_detail');
    }

    public function down()
    {
        $this->forge->dropTable('jurnal_detail');
    }
}
