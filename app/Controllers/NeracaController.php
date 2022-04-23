<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun;
use App\Models\JurnalDetail;
use Dompdf\Dompdf;

class NeracaController extends BaseController
{
    public function __construct()
    {
        $this->title = "Neraca";
        $this->akun = new Akun;
        $this->jurnalDetail = new JurnalDetail;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/neraca/index', $data);
    }

    public function detail()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listAkun'] = $this->akun->get()->getResultArray();
        $data['listDetail'] = $this->jurnalDetail->neraca($awal, $akhir);
        $data['periode_awal'] = $awal;
        $data['periode_akhir'] = $akhir;
        return view('laporan/neraca/detail', $data);

    }

    public function cetak()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan neraca periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listAkun'] = $this->akun->get()->getResultArray();
        $data['listDetail'] = $this->jurnalDetail->neraca($awal, $akhir);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $dompdf = new Dompdf;
        $dompdf->loadHtml(view('laporan/neraca/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
