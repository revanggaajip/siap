<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ObatTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'   => [
                'type'          => 'CHAR',
                'constraint'    => 7,
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'kandungan'     => [
                'type'          => 'TEXT'
            ],
            'satuan'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 50
            ],
            'kapasitas'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 20
            ],
            'jenis'         => [
                'type'          => 'VARCHAR',
                'constraint'     => 100
            ],
            'kategori'         => [
                'type'          => 'VARCHAR',
                'constraint'     => 100
            ],
            'golongan'         => [
                'type'          => 'VARCHAR',
                'constraint'     => 100
            ],
            'harga'         => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'stok'          => [
                'type'          => 'INT',
                'constraint'    => 5,
                'default'       => 0
            ],
            'min_stok'      => [
                'type'          => 'INT',
                'constraint'    => 5,
                'default'       => 0
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
        $this->forge->createTable('obat');
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
