<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_pengguna' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'tanggal_lahir_pengguna' => [
                'type'              => 'DATE'
            ],
            'username_pengguna' => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                'unique'            => true,
            ],
            'password_pengguna' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'hak_akses_pengguna'=> [
                'type'              => 'ENUM',
                'constraint'        => ['Admin', 'Pemilik']
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
        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
