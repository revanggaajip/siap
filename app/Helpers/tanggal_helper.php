<?php 

function tanggal($tgl) {
    $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $hari = date('d', strtotime($tgl));
    $bulan = date('m', strtotime($tgl));
    $bulan = $namaBulan[$bulan +1];
    $tahun = date('Y', strtotime($tgl));

    return $hari." ".$bulan." ".$tahun;

}

?>