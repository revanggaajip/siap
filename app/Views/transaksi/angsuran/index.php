<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>
                <?= $title; ?>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th width="15">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Id transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Piutang Transaksi</th>
                        <th width="17%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPiutang as $key => $piutang) :?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $piutang['nama_pelanggan']; ?></td>
                        <td><?= $piutang['id_transaksi_header']; ?></td>
                        <td><?= date('d-m-Y', strtotime($piutang['tanggal_transaksi'])); ?></td>
                        <td><?= rupiah($piutang['piutang_transaksi']); ?></td>
                        <td><a href="<?= base_url("angsuran/detail/".$piutang['id_transaksi_header']); ?>" class="btn btn-info text-white btn-sm">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<?= $this->include('barang/create'); ?>
<!-- Modal Tambah -->

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
