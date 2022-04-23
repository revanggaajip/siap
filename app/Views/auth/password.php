<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>
                        <?= $title; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('edit-password/'. session('id_pengguna')) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-2">
                            <label for="passwordLama" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" name="password_lama" id="passwordLama">
                        </div>
                        <div class="mb-2">
                            <label for="passwordBaru" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" id="passwordBaru">
                        </div>
                        <div class="mb-2">
                            <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasiPassword">
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('/'); ?>" class="btn btn-danger text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
