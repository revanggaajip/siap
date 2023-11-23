<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Obat;
use App\Models\Riwayat;

class OpnameController extends BaseController
{
    public function __construct()
    {
        $this->obat = new Obat;
        $this->title = 'Stock Opname';
        $this->riwayat = new Riwayat;
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listObat'] = $this->obat->findAll();
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('opname/index', $data);
    }

    public function store()
    {
        $jumlah = count($this->request->getVar('id'));
        
        for ($i=0; $i < $jumlah; $i++) { 
            $id = $this->request->getVar('id')[$i];
            $stok = $this->request->getVar('stok')[$i];
            if ($stok == true) {
                $data = [
                    'id' => $id,
                    'stok' => $stok
                ];
    
                $obat = new Obat();
                
                $dataObat = $obat->where('id', $id)->first();

                $this->riwayat->save([
                    'nama'  => $dataObat['nama'],
                    'tanggal' => date('Y-m-d h:i:s'),
                    'stok_awal' => $dataObat['stok'],
                    'stok_perubahan' => $stok - $dataObat['stok'],
                    'stok_akhir' => $stok,
                    'status' => 'Stock Opname',
                ]);
                
                $obat->save($data, ['id' => $id]);
            }
        }
        return redirect()->to(route_to('dashboard.index'))->with('success', 'Data stock opname berhasil disimpan');

    }
}