<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Riwayat;

class RiwayatController extends BaseController
{
    public function __construct()
    {
        $this->riwayat = new Riwayat();
        $this->title = 'Riwayat';
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listRiwayat'] = $this->riwayat->orderBy('created_at', 'DESC')->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('riwayat/index', $data);
    }
}
