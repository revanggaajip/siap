<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun'   => [
                'type'          => 'VARCHAR',
                'constraint'    => 5,
            ],
            'nama_akun' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'unique'        => true
            ],
            'jenis_akun' => [
                'type'          => 'ENUM',
                'constraint'    => ['Debit', 'Kredit']
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
        $this->forge->addKey('id_akun', true);
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}
