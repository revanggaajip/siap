<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanDetail extends Model
{
    protected $table            = 'penjualan_detail';
    protected $allowedFields    = ['id', 'quantity', 'subtotal', 'id_penjualan_header', 'id_obat'];

    // Dates
    protected $useTimestamps = true;

    public function detailPenjualan($id){
        $data = $this->join('obat', 'obat.id = penjualan_detail.id_obat')
        ->where('penjualan_detail.id_penjualan_header', $id)
        ->get()->getResultArray();

        return $data;
    }
}