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

}
