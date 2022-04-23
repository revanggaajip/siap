<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Angsuran;
use App\Models\JurnalDetail;
use App\Models\JurnalHeader;
use App\Models\TransaksiHeader;

class AngsuranController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Angsuran';
        $this->transaksiHeader = new TransaksiHeader;
        $this->angsuran = new Angsuran;
        $this->jurnalHeader = new JurnalHeader;
        $this->jurnalDetail = new JurnalDetail;
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listPiutang'] = $this->transaksiHeader->listPiutang();
        return view('transaksi/angsuran/index', $data);
    }

    public function detail($id) {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['transaksi'] = $this->transaksiHeader->detailPiutang($id);
        $data['noAngsuran'] = $this->angsuran->where('id_transaksi_header', $id)->countAllResults() + 1;
        return view('transaksi/angsuran/detail', $data);
    }

    public function create($id) {
        $statusTransaksi = "Belum Lunas";
        $transaksi = $this->transaksiHeader->where("id_transaksi_header", $id)->first();
        $piutang = intval($transaksi['piutang_transaksi']) - $this->request->getVar("nominal_angsuran");
        if ($piutang < 0) {
            session()->setFlashdata('danger', 'Nominal angsuran melebihi piutang');
            return redirect()->to(base_url('angsuran/detail/'.$id));
        }
        $this->angsuran->save([
            'id_angsuran' => 'ANG-'.date("Ymd") . "-" . date("Hi") . "-" . date("s"),
            'tanggal_angsuran' => $this->request->getVar('tanggal_angsuran'),
            'id_transaksi_header' => $id,
            'nomor_angsuran' => $this->request->getVar('nomor_angsuran'),
            'nominal_angsuran' => $this->request->getVar('nominal_angsuran'),
            'piutang_angsuran' => $piutang
        ]);

        if($piutang == 0) {
            $statusTransaksi = "Lunas";
        }

        $this->transaksiHeader->save([
            "id_transaksi_header" => $id,
            'status_transaksi' => $statusTransaksi,
            'piutang_transaksi' => $piutang
        ], ["id_transaksi_header" => $id]);

        $idJurnal = "JU-" . date("Ymd") . "-" . date("Hi") . "-" . date("s");

        $this->jurnalHeader->insert([
            'id_jurnal_header' => $idJurnal,
            'status_posting_jurnal' => 'Posting',
            'tanggal_jurnal' => $this->request->getVar('tanggal_angsuran'),
            'id_transaksi_header' => $id,
            'keterangan_jurnal' => 'Angsuran'
        ]);

        $this->jurnalDetail->insertBatch([
            [
                'id_jurnal_header' =>  $idJurnal,
                'id_akun' => '101',
                'debit' => $this->request->getVar('nominal_angsuran'),
                'kredit' => 0
            ],
            [
                'id_jurnal_header' =>  $idJurnal,
                'id_akun' => '103',
                'debit' => 0,
                'kredit' => $this->request->getVar("nominal_angsuran")
            ]
        ]);

        session()->setFlashdata('success', 'Data angsuran berhasil disimpan');
        return redirect()->to(base_url('angsuran'));

    }
}
