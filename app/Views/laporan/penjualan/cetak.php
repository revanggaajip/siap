<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan penjualan periode <?= tanggal($awal); ?> s/d <?= tanggal($akhir); ?></title>
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
        <p style="font-size: 24px; font-weight: bold;">Laporan Penjualan <?= ucfirst($jenis); ?></p>
        <p style="margin-top: -20px;">Periode <?= tanggal($awal); ?> - <?= tanggal($akhir); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                foreach($listLaporan as $key => $laporan) :
                $subtotal = $laporan['harga_barang'] * $laporan['quantity_barang'];
            ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= date('d-m-Y', strtotime($laporan['tanggal_transaksi'])); ?></td>
                <td><?= $laporan['nama_barang']; ?></td>
                <td><?= rupiah($laporan['harga_barang']); ?></td>
                <td><?= $laporan['quantity_barang']; ?> <?= $laporan['satuan_barang']; ?></td>
                <td><?= rupiah($subtotal); ?></td>
            </tr>
            <?php
                $total += $subtotal;
                endforeach;
            ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #FBC100;">
                <td colspan="5" style="text-align: center;"><strong>Total Penjualan</strong></td>
                <td><strong><?= rupiah($total); ?></strong></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>