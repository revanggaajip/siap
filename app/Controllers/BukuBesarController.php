<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun;
use App\Models\JurnalDetail;
use App\Models\JurnalHeader;
use Dompdf\Dompdf;

class BukuBesarController extends BaseController
{

    public function __construct()
    {
        $this->title = 'Buku Besar';
        $this->akun = new Akun;
        $this->jurnalHeader = new JurnalHeader;
        $this->jurnalDetail = new JurnalDetail;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/buku-besar/index', $data);
    }

    public function detail() {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $data['title'] = $this->title;
        $data['periode_awal'] = $awal;
        $data['periode_akhir'] = $akhir;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listAkun'] = $this->akun->get()->getResultArray();
        $data['listJurnalHeader'] = $this->jurnalHeader->bukuBesarHeader($awal, $akhir);
        $data['listJurnalDetail'] = $this->jurnalDetail->get()->getResultArray();
        return view('laporan/buku-besar/detail', $data);
    }

    public function cetak() {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan buku periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listAkun'] = $this->akun->get()->getResultArray();
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['listJurnalHeader'] = $this->jurnalHeader->bukuBesarHeader($awal, $akhir);
        $data['listJurnalDetail'] = $this->jurnalDetail->get()->getResultArray();
        $dompdf = new Dompdf;
        $dompdf->loadHtml(view('laporan/buku-besar/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
