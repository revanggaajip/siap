<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan jurnal umum periode <?= tanggal($awal); ?> s/d
        <?= tanggal($akhir); ?></title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #fbc100;
        color: black;
    }
    </style>
</head>

<body>
    <div class="header" style="text-align: center; margin-top: -40px;">
        <h1 style="margin-bottom: 5px;">Toko Obat Batik Murni</h1>
        <small>Jl. Salak No.44 Sampangan Pekalongan</small>
        <hr>
    </div>
    <div class="keterangan" style="text-align: center; margin-bottom: 20px;">
        <p style="font-size: 24px; font-weight: bold;">Jurnal Umum</p>
        <p style="margin-top: -20px;">Periode <?= tanggal($awal); ?> -
            <?= tanggal($akhir); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listLaporanHeader as $header) :?>
            <tr style="background:#cecece" ;>
                <td><strong><?= date('d-m-Y', strtotime($header['tanggal_jurnal'])); ?></strong></td>
                <td><strong><?= $header['keterangan_jurnal']; ?></strong></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php 
                foreach($listLaporanDetail as $detail) :
                    if ($detail['id_jurnal_header'] == $header['id_jurnal_header']) :
                ?>
            <tr>
                <td></td>
                <td></td>
                <td><?= $detail['nama_akun']; ?></td>
                <td><?= $detail['debit'] > 0 ? rupiah($detail['debit']) : null ?></td>
                <td><?= $detail['kredit'] > 0 ? rupiah($detail['kredit']) : null; ?></td>
            </tr>
            <?php
                    endif;
                endforeach;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>