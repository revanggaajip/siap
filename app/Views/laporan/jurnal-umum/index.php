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
                <a href="<?= base_url('jurnal-umum/cetak'); ?>" class="btn btn-primary btn-sm"><i
                        class="fas fa-print"></i> Cetak</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="7%">No</th>
                            <th>Id Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nominal Pembayaran</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listLaporan as $key => $laporan) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $laporan['id_transaksi_header'] ?></td>
                            <td><?= date('d-m-Y', strtotime($laporan['tanggal_transaksi'])); ?></td>
                            <td><?= rupiah($laporan['total_transaksi'] - $laporan['piutang_transaksi']); ?></td>
                            <td class="text-center">
                                <form action="<?= base_url('jurnal-umum/posting'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id_jurnal_header"
                                        value="<?= $laporan['id_jurnal_header']; ?>">
                                    <button class="btn btn-info text-white btn-sm"><i class="fas fa-paper-plane"></i>
                                        Posting</button>
                                </form>
                            </td>
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
$(document).ready(() => {
    $("#dataTable").DataTable();

    $('#simpanTambah').click(() => {

    });
});
</script>
<?php $this->endSection(); ?>