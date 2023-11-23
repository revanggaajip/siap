<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan <?= $header['id']; ?></title>
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
            <a href="<?= session('hak_akses_pengguna') == 'Admin' ? route_to('penjualan.index') : route_to('home.index'); ?>"
                class="btn btn-sm btn-danger text-white"><i class="fa fa-arrow-left"></i> Kembali</a>
            <button type="button" class="btn btn-sm btn-primary text-white" onclick="print()"><i
                    class="fa fa-print"></i>
                Cetak</button>
        </div>
    </nav>
    <div class="container">
        <header class="text-center">
            <h3 class="mb-2" style="color: black;"><?= $instansi['nama'] ?></h3>
            <small><?= $instansi['alamat'] ?></small>
            <br>
            <small>Telp: <?= $instansi['telepon'] ?></small>
            <hr size="5px" color="black">
        </header>
        <main>
            <h5 class="my-4 text-center" style="color: black;">Nota Penjualan</h5>
            <div class="row">
                <div class="col">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><?= $header['nama']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Tanggal Transaksi</td>
                            <td width="1%">:</td>
                            <td><?= tanggal($header['tanggal']); ?></td>
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
                                <th>Nama Obat</th>
                                <th>Jumlah Obat</th>
                                <th>Harga Obat</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detail as $index => $obat) :?>
                            <tr>
                                <td><?= 1+$index; ?></td>
                                <td><?= $obat['nama']; ?></td>
                                <td><?= $obat['quantity']; ?> <?= $obat['satuan']; ?></td>
                                <td><?= rupiah($obat['harga']); ?></td>
                                <td><?= rupiah($obat['subtotal']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: center;"><strong>Total Transaksi</strong></td>
                                <td><?= rupiah($header['total']); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div style="margin-top: 75px;">
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <table>
                                    <tr>
                                        <td class="text-center">Penanggung Jawab</td>
                                    </tr>
                                    <tr>
                                        <td style="height: 50px;"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><?= session("nama_pengguna"); ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
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