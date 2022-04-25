<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalDetail extends Model
{
    protected $table            = 'jurnal_detail';
    protected $primaryKey       = 'id_jurnal_detail';
    protected $useTimestamps = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_jurnal_detail',
        'id_jurnal_header',
        'id_akun',
        'debit',
        'kredit'
    ];
    
    public function laporanJurnalUmumDetail() {
        $data = $this->join('akun', 'akun.id_akun = jurnal_detail.id_akun')
        ->get()->getResultArray();
        return $data;
    }

    public function neraca($awal, $akhir) {
        $data = $this->join('jurnal_header', 'jurnal_header.id_jurnal_header = jurnal_detail.id_jurnal_header')
        ->where("jurnal_header.tanggal_jurnal BETWEEN '$awal' AND '$akhir'")
        ->where('jurnal_header.status_posting_jurnal', 'Posting')
        ->get()->getResultArray();
        return $data;
    }
}
