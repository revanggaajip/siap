<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class PenerimaanHeaderTable extends Migration
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
            'no_faktur'     => [
                'type'      => 'varchar',
                'constraint' => 50
            ],
            'tanggal' => [
                'type' => 'date'
            ],
            'sp' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nama_supplier' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'keterangan' => ['type' => 'text', 'null' => true],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penerimaan_header');
    }

    public function down()
    {
        $this->forge->dropTable('penerimaan_header');
    }
}