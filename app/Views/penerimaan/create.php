<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <form action="<?= route_to('penerimaan.store'); ?>" method="post">
        <?= csrf_field() ?>
            <div class="card-header">
                <h5>
                    <?= $title; ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_faktur" class="form-label">No. Faktur</label>
                            <input type="text" class="form-control" name="no_faktur" id="no_faktur">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sp" class="form-label">No. Surat Pemesanan</label>
                            <input type="text" class="form-control" name="sp" id="sp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th width="15">No</th>
                                <th>Nama Obat</th>
                                <th width="50px">Satuan</th>
                                <th width="50px">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listObat as $key => $obat) :?>
                            <tr>
                                <input type="hidden" name="id_obat[]" value="<?= $obat['id']; ?>">
                                <td><?= $key+1; ?></td>
                                <td><?= $obat['nama']; ?></td>
                                <td><?= $obat['satuan']; ?></td>
                                <td><input type="text" class="form-control" name="quantity[]"></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="<?= route_to('home.index'); ?>" class="btn btn-danger text-white"><i
                            class="fas fa-times"></i>
                        Batal</a>
                    <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
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