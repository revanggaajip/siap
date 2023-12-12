<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Stock Opname
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <form action="<?= route_to('opname.store'); ?>" method="post">
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
                                <th width="50px">Stok Sistem</th>
                                <?php if(session('hak_akses_pengguna') == 'Admin') :?>
                                <th width="50px">Stok Asli</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listObat as $key => $obat) :?>
                            <tr>
                                <input type="hidden" name="id[]" value="<?= $obat['id']; ?>">
                                <td><?= $key+1; ?></td>
                                <td><?= $obat['nama']; ?></td>
                                <td><?= $obat['stok']; ?></td>
                                <?php if(session('hak_akses_pengguna') == 'Admin') :?>
                                <td><input type="text" class="form-control" name="stok[]"></td>
                                <?php endif ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if(session('hak_akses_pengguna') == 'Admin') :?>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="<?= route_to('home.index'); ?>" class="btn btn-danger text-white"><i
                            class="fas fa-times"></i>
                        Batal</a>
                    <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            <?php endif ?>
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