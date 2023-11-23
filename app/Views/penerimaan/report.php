<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Laporan penerimaan periode <?= date('d/m/Y',strtotime($awal)); ?> s/d <?= date('d/m/Y',strtotime($akhir)); ?>
    </title>
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
        background-color: #303C54;
        color: white;
    }
    </style>
</head>

<body>
    <div class="header" style="text-align: center; margin-top: -40px;">
        <h1 style="margin-bottom: 5px;"><?= $instansi['nama']?></h1>
        <small><?= $instansi['alamat'] ?></small>
        <small><?= $instansi['telepon'] ?></small>
        <hr>
    </div>
    <div class="keterangan" style="text-align: center; margin-bottom: 20px;">
        <p style="font-size: 24px; font-weight: bold;">Laporan Penerimaan</p>
        <p style="margin-top: -20px;">Periode <?= date('d/m/Y',strtotime($awal)); ?> -
            <?= date('d/m/Y',strtotime($akhir)); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Faktur</th>
                <th>Surat Pemesanan</th>
                <th>Nama Supplier</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listLaporan as $key => $laporan) :
            ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $laporan['no_faktur']; ?></td>
                <td><?= $laporan['sp'] ?></td>
                <td><?= $laporan['nama_supplier']; ?></td>
                <td><?= date('d-m-Y', strtotime($laporan['tanggal'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>