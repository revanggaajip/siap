<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelangganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_incremnt' => true],
            'nama_pelanggan' => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp_pelanggan' => ['type' => 'VARCHAR', 'constraint' => 14],
            'alamat_pelanggan' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->addKey('id_pelanggan', true);
    }

    public function down()
    {
        //
    }
}
