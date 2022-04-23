<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan penjualan periode <?= date('d/m/Y',strtotime($awal)); ?> s/d <?= date('d/m/Y',strtotime($akhir)); ?></title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #FBC100;
            color: black;
        }

        .akun {
            display: flex;
            justify-content: space-between;
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
       <p style="font-size: 24px; font-weight: bold;">Laporan Buku Besar</p>
       <p style="margin-top: -20px;">Periode <?= date('d/m/Y',strtotime($awal)); ?> - <?= date('d/m/Y',strtotime($akhir)); ?></p>
    </div>
    <?php 
    foreach($listAkun as $key => $akun) : 
        $total = 0;
        $debit = 0;
        $kredit = 0;?>
    <div class="akun">
        <p><strong>Nama Akun : <?= $akun['nama_akun']; ?></strong></p>
        <p style="margin-top: -10px;">No. Akun : <?= $akun['id_akun']; ?></p>
    </div>
    <table style="margin-bottom: 50px;">
        <thead>
            <tr>
                <th><strong>Tanggal</strong></th>
                <th><strong>Keterangan</strong></th>
                <th><strong>Reff</strong></th>
                <th><strong>Debit</strong></th>
                <th><strong>Kredit</strong></th>
                <th><strong>Saldo</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listJurnalHeader as $key => $jurnalHeader) :?>
                <?php foreach($listJurnalDetail as $key =>$jurnalDetail) : ?>
                    <?php if(
                        $jurnalDetail['id_jurnal_header'] == $jurnalHeader['id_jurnal_header'] && 
                        $jurnalDetail['id_akun'] == $akun['id_akun']) : 
                        $debit += $jurnalDetail['debit'];
                        $kredit += $jurnalDetail['kredit'];
                        $total = $debit - $kredit?>
                            <tr>
                                <td><?= date('d-m-Y', strtotime($jurnalHeader['tanggal_jurnal'])); ?></td>
                                <td><?= $jurnalHeader['keterangan_jurnal']; ?></td>
                                <td><?= $jurnalHeader['id_jurnal_header']; ?></td>
                                <td style="color: green"><?= rupiah($jurnalDetail['debit']); ?></td>
                                <td style="color: red"><?= rupiah($jurnalDetail['kredit']); ?></td>
                                <td style="<?= $total >= 0 ? 'color: green' : 'color: red'; ?>"><?= rupiah(abs($total)); ?></td>
                            </tr>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endforeach ?>
</body>
</html>