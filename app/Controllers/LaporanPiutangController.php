<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LaporanPiutangController extends BaseController
{
    public function __construct()
    {
        $this->title = "Laporan Piutang";
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/piutang/index', $data);
    }
}
