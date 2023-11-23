<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idPenjualanHeader" class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" name="id_penjualan_header" id="idPenjualanHeader"
                            value="<?= $header['id']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="<?= $header['tanggal']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="namaPasien" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" id="namaPasien"
                            value=" <?= $header['nama'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"
                            readonly><?= $header['keterangan'] ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <table class="table table-striped table-bordered mb-4" id="dataTable">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama Obat</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0; 
                    foreach($dataPenjualan as $i => $penjualan) { ?>
                    <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $penjualan['nama']; ?></td>
                        <td><?= rupiah($penjualan['harga']); ?></td>
                        <td><?= $penjualan['quantity']; ?></td>
                        <td><?= rupiah($penjualan['subtotal']); ?></td>
                    </tr>
                    <?php
                    $total += $penjualan['subtotal'];
                } ?>
                    <tr>
                        <td colspan="4" class="text-center">Total Penjualan</td>
                        <td><?= rupiah($total); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('/'); ?>" class="btn btn-danger text-white btn-sm"><i
                        class="fas fa-arrow-left"></i>
                    Kembali</a>
                <a href="<?= route_to('penjualan.bill', $header['id']); ?>" class="btn btn-info text-white btn-sm"><i
                        class="fas fa-print"></i>
                    Cetak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<!-- ---------------------------------------------------------------------------------- -->