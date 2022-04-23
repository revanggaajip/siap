<?php

namespace App\Controllers;

use App\Models\TransaksiHeader;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->title = "Home";
        $this->transaksiHeader = new TransaksiHeader;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['kolom1'] = $this->transaksiHeader->where('tanggal_transaksi', date('Y-m-d'))->countAllResults();
        $data['kolom2'] = $this->transaksiHeader->selectSum('total_transaksi')->where('tanggal_transaksi', date('Y-m-d'))->first();
        $data['kolom3'] = $this->transaksiHeader->where('month(tanggal_transaksi)', date('m'))->where('year(tanggal_transaksi)', date('Y'))->countAllResults();
        $data['kolom4'] = $this->transaksiHeader->selectSum('total_transaksi')->where('month(tanggal_transaksi)', date('m'))->where('year(tanggal_transaksi)', date('Y'))->first();
        return view('home/index', $data);
    }
}
