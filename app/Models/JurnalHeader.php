<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalHeader extends Model
{
    protected $table            = 'jurnal_header';
    protected $primaryKey       = 'id_jurnal_header';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_jurnal_header',
        'status_posting_jurnal',
        'tanggal_jurnal',
        'id_transaksi_header',
        'keterangan_jurnal'
    ];

    public function jurnalUmum() {
        $data = $this->join('transaksi_header', 'transaksi_header.id_transaksi_header = jurnal_header.id_transaksi_header')
        ->where('jurnal_header.status_posting_jurnal', 'Belum Posting')
        ->orderBy('transaksi_header.tanggal_transaksi')
        ->get()->getResultArray();
        return $data;
    }

    public function laporanJurnalUmumHeader($awal, $akhir) {
        $data = $this->where("jurnal_header.tanggal_jurnal BETWEEN '$awal' AND '$akhir'")
        ->where('jurnal_header.status_posting_jurnal', 'Posting')
        ->orderBy('jurnal_header.tanggal_jurnal')
        ->get()->getResultArray();
        return $data;
    }

    public function bukuBesarHeader($awal, $akhir) {
        $data = $this->where("tanggal_jurnal BETWEEN '$awal' AND '$akhir'")
        ->where('jurnal_header.status_posting_jurnal', 'Posting')
        ->get()->getResultArray();
        return $data;
    }
}
