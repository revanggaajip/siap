<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriNonMedisTable extends Migration
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
        $this->forge->createTable('kategori_non_medis');
    }
    
    public function down()
    {
        $this->forge->dropTable('kategori_non_medis');
    }
}