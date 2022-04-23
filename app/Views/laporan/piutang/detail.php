<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>
                    <?= $title; ?>
                </h5>
                <form action="<?= base_url('laporan-piutang/cetak') ?>" method="post" target="_blank">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="periode_awal" value="<?= $periode_awal; ?>">
                    <input type="hidden" name="periode_akhir" value="<?= $periode_akhir; ?>">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
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
                        <?php foreach($listLaporan as $key => $laporan) :?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= date('d-m-Y', strtotime($laporan['tanggal_transaksi'])); ?></td>
                            <td><?= $laporan['nama_pelanggan']; ?></td>
                            <td><?= rupiah($laporan['total_transaksi']); ?></td>
                            <td><?= rupiah($laporan['total_transaksi'] - $laporan['piutang_transaksi']); ?></td>
                            <td><?= rupiah($laporan['piutang_transaksi']); ?></td>
                            <td class="<?= $laporan['status_transaksi'] == 'Lunas' ? 'text-success' : 'text-danger'; ?>"><?= $laporan['status_transaksi']; ?></td>
                        </tr>
                        <?php endforeach; ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?= base_url('vendors/dataTables/css/dataTables.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('vendors/dataTables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendors/dataTables/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script>
    $(document).ready(()=> {
        $("#dataTable").DataTable();
    });
</script>
<?php $this->endSection(); ?>
