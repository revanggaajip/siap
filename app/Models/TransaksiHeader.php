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
        'nama_pelanggan',
        'jenis_transaksi', 
        'tanggal_transaksi', 
        'tanggal_jatuh_tempo_transaksi', 
        'total_transaksi', 
        'piutang_transaksi',
        'status_transaksi',
        'keterangan_transaksi'
    ];

    public function listPiutang() {
        $data = $this->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_header.id_pelanggan')
        ->where('transaksi_header.jenis_transaksi', 'Kredit')
        ->where('transaksi_header.status_transaksi', 'Belum Lunas')
        ->orderBy('transaksi_header.created_at', 'desc')
        ->get()->getResultArray();
        return $data;
    }

    public function detailPiutang($id) {
        $data = $this->where('id_transaksi_header', $id)
        ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_header.id_pelanggan')
        ->first();
        return $data;
    }

    public function laporanPenjualan($awal, $akhir) {
        $data = $this->join('transaksi_detail', 'transaksi_detail.id_transaksi_header = transaksi_header.id_transaksi_header')
        ->join('barang', 'barang.id_barang = transaksi_detail.id_barang')
        // ->where('transaksi_header.jenis_transaksi', 'tunai')
        ->where("transaksi_header.tanggal_transaksi BETWEEN '$awal' AND '$akhir'")
        ->orderBy('transaksi_header.tanggal_transaksi')
        ->get()->getResultArray();
        return $data;
    }

    public function laporanPiutang($awal, $akhir) {
        $data = $this->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_header.id_pelanggan')
        ->where("transaksi_header.tanggal_transaksi BETWEEN '$awal' AND '$akhir'")
        ->orderBy('transaksi_header.tanggal_transaksi')
        ->get()->getResultArray();
        return $data;
    }

    public function detailPelanggan($id) {
        $data = $this->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_header.id_pelanggan')
        ->where('transaksi_header.id_transaksi_header', $id)
        ->first();
        return $data;
    }
}