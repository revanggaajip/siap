<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan Tunai <?= $header['id_transaksi_header']; ?></title>
    <link href="<?= base_url('css/style.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('vendors/fontawesome/css/all.min.css'); ?>">
    <style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
    }

    .no-print {
        display: none;
    }

    hr {
        border-top: solid 1px #000 !important;
    }
    </style>
</head>

<body>
    <nav class="bg-dark mb-3 no-print">
        <div class="container d-flex justify-content-between py-1">
            <a href="<?= base_url('transaksi-tunai'); ?>" class="btn btn-sm btn-danger text-white"><i
                    class="fa fa-arrow-left"></i> Kembali</a>
            <button type="button" class="btn btn-sm btn-primary text-white" onclick="print()"><i
                    class="fa fa-print"></i>
                Cetak</button>
        </div>
    </nav>
    <div class="container">
        <header class="text-center">
            <h3 class="mb-2" style="color: black;">Toko Obat Batik Murni</h3>
            <small>Jl. Salak No.44 Sampangan Pekalongan</small>
            <hr size="5px" color="black">
        </header>
        <main>
            <h5 class="my-4 text-center" style="color: black;">Nota Penjualan</h5>
            <div class="row">
                <div class="col">
                    <table class="table table-borderless">
                        <tr>
                            <td width="150px">Nama Pelanggan</td>
                            <td width="1%">:</td>
                            <td><?= $header['nama_pelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Transaksi</td>
                            <td>:</td>
                            <td><?= tanggal($header['tanggal_transaksi']); ?></td>
                        </tr>
                        <tr>
                            <td>Id Transaksi</td>
                            <td>:</td>
                            <td><?= $header['id_transaksi_header']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detail as $index => $barang) :?>
                            <tr>
                                <td><?= 1+$index; ?></td>
                                <td><?= $barang['nama_barang']; ?></td>
                                <td><?= $barang['quantity_barang']; ?></td>
                                <td><?= rupiah($barang['harga_barang']); ?></td>
                                <td><?= rupiah($barang['subtotal_transaksi']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-center">Total Transaksi</td>
                                <td><?= rupiah($header['total_transaksi']); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="<?= base_url('vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script>
    print()
    </script>

</body>

</html>