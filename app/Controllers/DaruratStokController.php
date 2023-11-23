<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Obat;

class DaruratStokController extends BaseController
{
    public function index()
    {
        $obat = new Obat();
        $title = 'Darurat Stok';
        $data['title'] = $title;
        $data['breadcrumb'] = $this->breadcrumb($title);
        $data['listObat'] = $obat->minStok();
        return view('darurat/index', $data);
    }
}