<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penerimaan <?= $header['no_faktur']; ?></title>
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
            <a href="<?= session('hak_akses_pengguna') == 'Admin' ? route_to('penerimaan.index') : route_to('home.index'); ?>"
                class="btn btn-sm btn-danger text-white"><i class="fa fa-arrow-left"></i> Kembali</a>
            <button type="button" class="btn btn-sm btn-primary text-white" onclick="print()"><i
                    class="fa fa-print"></i>
                Cetak</button>
        </div>
    </nav>
    <div class="container">
        <header class="text-center" style="margin-top: 50px;">
            <h3 class="mb-2" style="color: black;"><?= $instansi['nama'] ?></h3>
            <small><?= $instansi['alamat'] ?></small>
            <br>
            <small>Telp: <?= $instansi['telepon'] ?></small>
            <hr size="5px" color="black">
        </header>
        <main>
            <h5 class="my-4 text-center" style="color: black;">Nota Penerimaan</h5>
            <div class="row">
                <div class="col">
                    <table class="table table-borderless">
                        <tr>
                            <td>No. Faktur</td>
                            <td>:</td>
                            <td><?= $header['no_faktur']; ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Surat Pemesanan</td>
                            <td width="1%">:</td>
                            <td><?= $header['nama_supplier'] ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Tanggal</td>
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
                                <th width="5px">No</th>
                                <th width="50%">Nama Obat</th>
                                <th>Satuan</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detail as $key => $penerimaan) :?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $penerimaan['nama']; ?></td>
                                <td><?= $penerimaan['satuan']; ?></td>
                                <td><?= $penerimaan['quantity']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
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