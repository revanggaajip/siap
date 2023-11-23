<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InstansiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'alamat'        => [
                'type'              => 'TEXT'
            ],
            'telepon'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 16
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('instansi');
    }
    
    public function down()
    {
        $this->forge->dropTable('instansi');
    }
}
