<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenerimaanDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'bigint', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'id_penerimaan_header' => ['type' => 'bigint', 'constraint' => 20],
            'id_obat' => ['type' => 'char', 'constraint' => 7],
            'quantity' => ['type' => 'int', 'constraint' => 5],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penerimaan_detail');
    }

    public function down()
    {
        $this->forge->dropTable('penerimaan_detail');
    }
}
