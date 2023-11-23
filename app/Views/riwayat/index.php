<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Obat
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="15">No</th>
                            <th>Nama Obat</th>
                            <th>Tanggal</th>
                            <th>Stok Awal</th>
                            <th>Stok Perubahan</th>
                            <th>Stok Akhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listRiwayat as $key => $riwayat) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $riwayat['nama']; ?></td>
                            <td><?= date('d-m-Y h:i:s', strtotime($riwayat['tanggal'])); ?></td>
                            <td><?= $riwayat['stok_awal'] ?></td>
                            <td class="<?= ($riwayat['stok_akhir'] - $riwayat['stok_awal']) < 0 ? 'text-danger' : 'text-success'?>"><?= $riwayat['stok_perubahan'] ?></td>
                            <td><?= $riwayat['stok_akhir']; ?></td>
                            <td><?= $riwayat['status']; ?></td>
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
});
</script>
<?php $this->endSection(); ?>