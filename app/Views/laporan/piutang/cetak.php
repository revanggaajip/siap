<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan piutang periode <?= tanggal($awal); ?> s/d <?= tanggal($akhir); ?></title>
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
        <p style="font-size: 24px; font-weight: bold;">Laporan Piutang</p>
        <p style="margin-top: -20px;">Periode <?= tanggal($awal); ?> - <?= tanggal($akhir); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nominal Transaksi</th>
                <th>Nominal Pembayaran</th>
                <th>Nominal Piutang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach($listLaporan as $key => $laporan) :
            $total += $laporan['piutang_transaksi']?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= date('d-m-Y', strtotime($laporan['tanggal_transaksi'])); ?></td>
                <td><?= $laporan['nama_pelanggan']; ?></td>
                <td><?= rupiah($laporan['total_transaksi']); ?></td>
                <td><?= rupiah($laporan['total_transaksi'] - $laporan['piutang_transaksi']); ?></td>
                <td><?= rupiah($laporan['piutang_transaksi']); ?></td>
                <td class="<?= $laporan['status_transaksi'] == 'Lunas' ? 'text-success' : 'text-danger'; ?>">
                    <?= $laporan['status_transaksi']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr style="background-color: #FBC100;">
                <td colspan="5" style="text-align: center;"><strong>Total Piutang</strong></td>
                <td colspan="2"><strong><?= rupiah($total); ?></strong></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>