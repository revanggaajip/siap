<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JurnalDetail;
use App\Models\JurnalHeader;
use Dompdf\Dompdf;

class JurnalUmumController extends BaseController
{

    public function __construct()
    {
        $this->title = "Jurnal Umum";
        $this->jurnalHeader = new JurnalHeader;
        $this->jurnalDetail = new JurnalDetail;
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        $data['listLaporan'] = $this->jurnalHeader->jurnalUmum();
        return view('laporan/jurnal-umum/index', $data);
    }

    public function posting()
    {
        $id =  $this->request->getVar('id_jurnal_header');
        $posting = $this->jurnalHeader->where('id_jurnal_header', $id)->first();
        // dd($posting);
        $this->jurnalHeader->save([
            'id_jurnal_header' => $id,
            'status_posting_jurnal' => 1
        ], ['id_jurnal_header' => $id]);
        session()->setFlashdata('success', 'Data berhasil diposting');
        return redirect()->to(base_url('jurnal-umum'));
    }

    public function filter() {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('laporan/jurnal-umum/filter', $data);
    }

    public function cetak() {
        $awal = $this->request->getVar('periode_awal');
        $akhir = $this->request->getVar('periode_akhir');
        $filename = "Laporan jurnal umum periode ".date('d/m/Y',strtotime($awal))." sampai". date('d/m/Y',strtotime($akhir));
        $data['listLaporanHeader'] = $this->jurnalHeader->laporanJurnalUmumHeader($awal, $akhir);
        $data['listLaporanDetail'] = $this->jurnalDetail->laporanJurnalUmumDetail();
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $dompdf = new Dompdf;
        $dompdf->loadHtml(view('laporan/jurnal-umum/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
