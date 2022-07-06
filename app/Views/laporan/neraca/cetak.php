<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan neraca periode <?= tanggal($awal); ?> s/d <?= tanggal($akhir); ?></title>
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
        background-color: #FBC100;
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
        <p style="font-size: 24px; font-weight: bold;">Laporan Neraca</p>
        <p style="margin-top: -20px;">Periode <?= date('d/m/Y',strtotime($awal)); ?> -
            <?= date('d/m/Y',strtotime($akhir)); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Id Akun</th>
                <th>Nama Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $totalDebit = 0;
            $totalKredit = 0;
            foreach($listAkun as $key => $akun) :
                $debit = 0;
                $kredit = 0; ?>
            <?php 
                    foreach( $listDetail as $key =>$detail) : 
                        if($detail['id_akun'] == $akun['id_akun']) :
                            $debit += $detail['debit'];
                            $kredit += $detail['kredit'];
                        endif;
                    endforeach; 
                ?>
            <?php 
                    if($debit > 0 || $kredit > 0) :
                ?>
            <tr>
                <td><strong><?= $akun['id_akun'] ?></strong></td>
                <td><?= $akun['nama_akun']; ?></td>
                <td><?= rupiah($debit); ?></td>
                <td><?= rupiah($kredit); ?></td>
            </tr>
            <?php 
                    endif; 
                    $totalDebit += $debit;
                    $totalKredit += $kredit;
                ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #FBC100;">
                <td colspan="2" style="text-align: center;"><strong>Total Nominal</strong></td>
                <td><strong><?= rupiah($totalDebit); ?></strong></td>
                <td><strong><?= rupiah($totalKredit); ?></strong></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>