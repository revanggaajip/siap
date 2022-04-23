<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetail extends Model
{
    protected $table            = 'transaksi_detail';
    protected $primaryKey       = 'id_transaksi_detail';
    protected $protectFields    = true;
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $allowedFields    = ['id_transaksi_detail', 'id_transaksi_header', 'id_barang', 'quantity_barang', 'subtotal_transaksi'];
}
