<?php

namespace App\Models;

use CodeIgniter\Model;

class Angsuran extends Model
{
    protected $table            = 'angsuran';
    protected $primaryKey       = 'id_angsuran';
    protected $useAutoIncrement = false;
    protected $useTimestamps    = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_angsuran',
        'tanggal_angsuran',
        'id_transaksi_header',
        'nomor_angsuran',
        'nominal_angsuran',
        'piutang_transaksi'];

}
