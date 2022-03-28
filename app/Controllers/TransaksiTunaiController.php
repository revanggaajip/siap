<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Config\Services;

class TransaksiTunaiController extends BaseController
{
    public function __construct()
    {
        $this->title = "Transaksi Tunai";
        $this->header = new TransaksiHeader;
        $this->detail = new TransaksiDetail;
        $this->services = new Services;
        $this->barang = new Barang;
    }
    public function index()
    {
        $data['validation'] = $this->services::validation();
        $data['title'] = $this->title;
        $data['listBarang'] = $this->barang->get()->getResultArray();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['id'] = "TRX-" . date("Ymd") . "-" . date("iH") . "-" . date("s");
        return view('transaksi/tunai/index', $data);
    }

    public function tambahKeranjang() {
        $cart = \Config\Services::cart();
        $barang = $this->barang->where('id_barang', $this->request->getVar('id_barang'))->first();
        $cart->insert([
            'id'    => $this->request->getVar('id_barang'),
            'qty'   => $this->request->getVar('quantity_barang'),
            'price' => $barang['harga_barang'],
            'name'  => $barang['nama_barang'],

        ]);
        return json_encode([
            'status' => 'success',
            'pesan' => 'Barang berhasil ditambah ke keranjang'
        ]);

    }

    public function lihatKeranjang() {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        return json_encode($response);
    }

    public function hapusKeranjang($id) {
        $cart = \Config\Services::cart();
        $cart->remove($id);
        return json_encode([
            'status' => 'success',
            'pesan' => 'Barang berhasil dihapus dari keranjang'
        ]);


    }
}
