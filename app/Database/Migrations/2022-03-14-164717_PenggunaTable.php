<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'tanggal_lahir' => [
                'type'              => 'DATE'
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                'unique'            => true,
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'hak_akses'=> [
                'type'              => 'ENUM',
                'constraint'        => ['Admin', 'User']
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
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
