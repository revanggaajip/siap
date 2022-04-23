<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiHeader;
use Dompdf\Dompdf;

class LaporanPiutangController extends BaseController
{
    public function __construct()
    {
        $this->title = "Laporan Piutang";
        $this->transaksiHeader = new TransaksiHeader;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/piutang/index', $data);
    }

    public function detail()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listLaporan'] = $this->transaksiHeader->laporanPiutang($awal, $akhir);
        $data['periode_awal'] = $awal;
        $data['periode_akhir'] = $akhir;
        return view('laporan/piutang/detail', $data);
    }

    public function cetak()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan penjualan periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listLaporan'] = $this->transaksiHeader->laporanPiutang($awal, $akhir);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $dompdf = new Dompdf;
        $dompdf->loadHtml(view('laporan/piutang/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
