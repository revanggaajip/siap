<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiHeader extends Model
{
    protected $table            = 'transaksi_header';
    protected $primaryKey       = 'id_transaksi_header';
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_transaksi_header',
        'id_pelanggan', 
        'jenis_transaksi', 
        'tanggal_transaksi', 
        'tanggal_jatuh_tempo_transaksi', 
        'total_transaksi', 
        'piutang_transaksi',
        'status_transaksi',
        'keterangan_transaksi'
    ];

    public function listPiutang() {
        $data = $this->db->query('SELECT * FROM transaksi_header 
        JOIN pelanggan ON pelanggan.id_pelanggan = transaksi_header.id_pelanggan
        WHERE transaksi_header.jenis_transaksi = "Kredit"
        AND transaksi_header.status_transaksi = "Belum Lunas"')->getResultArray();
        return $data;
    }
}
