<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiHeader;

class AngsuranController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Angsuran';
        $this->transaksiHeader = new TransaksiHeader;
    }
    public function index()
    {
        $data['listPiutang'] = $this->transaksiHeader->listPiutang();
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('transaksi/angsuran/index', $data);
    }
}
