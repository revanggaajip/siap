<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiHeader;
use Dompdf\Dompdf;

class LaporanPenjualanController extends BaseController
{

    public function __construct()
    {
        $this->title = "Laporan Penjualan";
        $this->transaksiHeader = new TransaksiHeader;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/penjualan/index', $data);
    }

    public function detail()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listLaporan'] = $this->transaksiHeader->laporanPenjualan($awal, $akhir);
        $data['periode_awal'] = $awal;
        $data['periode_akhir'] = $akhir;
        return view('laporan/penjualan/detail', $data);
    }

    public function cetak()
    {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $data['listLaporan'] = $this->transaksiHeader->laporanPenjualan($awal, $akhir);
        $filename = "Laporan penjualan periode $awal s/d $akhir";
        $dompdf = new Dompdf();
        $dompdf->setBasePath(base_url('assets/css/sb-admin-2.css'));
        $dompdf->loadHtml(view('history/laporan', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
