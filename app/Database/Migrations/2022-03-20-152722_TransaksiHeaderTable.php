<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiHeaderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi_header' => ['type' => 'char', 'constraint' => 20 ],
            'id_pelanggan' =>  ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'jenis_transaksi' => ['type' => 'enum', 'constraint' => ['Tunai', 'Kredit']],
            'tanggal_transaksi' => ['type' => 'date'],
            'tanggal_jatuh_tempo_transaksi' => ['type' => 'date', 'null' => true],
            'total_transaksi' => ['type' => 'long'],
            'piutang_transaksi' => ['type' => 'long'],
            'status_transaksi' => ['type' => 'enum', 'constraint' => ['Lunas', 'Belum Lunas']],
            'keterangan_transaksi' => ['type' => 'text', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id_transaksi_header', true);
        $this->forge->createTable('transaksi_header');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_header');
    }
}
