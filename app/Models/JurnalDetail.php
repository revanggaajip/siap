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
    
}
