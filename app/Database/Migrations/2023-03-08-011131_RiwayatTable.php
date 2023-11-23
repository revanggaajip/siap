<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatTable extends Migration
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
            'tanggal'        => [
                'type'              => 'DATETIME'
            ],
            'stok_awal'      => [
                'type'              => 'INT',
                'constraint'        => 5
            ],
            'stok_perubahan'      => [
                'type'              => 'INT',
                'constraint'        => 5
            ],
            'stok_akhir'      => [
                'type'              => 'INT',
                'constraint'        => 5
            ],
            'status'        => [
                'type'         => 'VARCHAR',
                'constraint'    => 25
            ],
            'id_header'     => [
                'type'              => 'BIGINT',
                'constraint'        => 20
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
        $this->forge->createTable('riwayat');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat');
    }
}