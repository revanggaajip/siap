<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Angsuran <?= $kredit['id_transaksi_header']; ?></title>
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
            <a href="<?= base_url('angsuran'); ?>" class="btn btn-sm btn-danger text-white"><i
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
            <h5 class="my-4 text-center" style="color: black;">Nota Angsuran</h5>
            <div class="d-flex justify-content-between">
                <p>Id Transaksi : <?= $kredit['id_transaksi_header']; ?></p>
                <p>Tanggal Transaksi : <?= tanggal($kredit['tanggal_transaksi']); ?></p>
            </div>
            <div class="border border-secondary mt-4">
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless">
                            <tr>
                                <td>Id Angsuran</td>
                                <td>:</td>
                                <td><?= $angsuran['id_angsuran']; ?></td>
                            </tr>
                            <tr>
                                <td width="150px">Nama Pelanggan</td>
                                <td width="1%">:</td>
                                <td><?= $kredit['nama_pelanggan']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Angsuran</td>
                                <td>:</td>
                                <td><?= tanggal($angsuran['tanggal_angsuran']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col mx-1">
                        <table class="table table-striped">
                            <tr>
                                <td width="170px">Total Hutang</td>
                                <td width="1%">:</td>
                                <td><?= rupiah($kredit['piutang_transaksi'] + $angsuran['nominal_angsuran']); ?></td>
                            </tr>
                            <tr>
                                <td>Nominal Pembayaran</td>
                                <td class="border-left-0 border-right-0">:</td>
                                <td><?= rupiah($angsuran['nominal_angsuran']); ?></td>
                            </tr>
                            <tr>
                                <td>Terbilang</td>
                                <td>:</td>
                                <td><?= terbilang($angsuran['nominal_angsuran']); ?></td>
                            </tr>
                            <tr>
                                <td>Sisa Hutang</td>
                                <td>:</td>
                                <td><?= rupiah($kredit['piutang_transaksi']); ?></td>
                            </tr>
                        </table>
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