<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Laporan penjualan periode <?= date('d/m/Y',strtotime($awal)); ?> s/d <?= date('d/m/Y',strtotime($akhir)); ?>
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
        <p style="font-size: 24px; font-weight: bold;">Laporan Penjualan</p>
        <p style="margin-top: -20px;">Periode <?= date('d/m/Y',strtotime($awal)); ?> -
            <?= date('d/m/Y',strtotime($akhir)); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                foreach($listLaporan as $key => $laporan) :
                $total = $total + $laporan['total'];
            ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $laporan['nama']; ?></td>
                <td><?= date('d-m-Y', strtotime($laporan['tanggal'])); ?></td>
                <td><?= rupiah($laporan['total']); ?></td>
                <td><?= $laporan['keterangan']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>