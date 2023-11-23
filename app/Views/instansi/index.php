<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Instansi
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <form action="<?= route_to('instansi.update') ?>" method="post">
    <?= csrf_field() ?>
    <div class="card">
        <div class="card-header">
            <h5>
                <?= $title; ?>
            </h5>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <label for="nama" class="form-label">Nama Instansi</label>
                    <input type="text" name="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null ?>" id="nama" value="<?= $instansi['nama'] ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="telepon" class="form-label">No.Telepon Instansi</label>
                    <input type="text" name="telepon" class="form-control <?= $validation->hasError('telepon') ? 'is-invalid': null ?>" id="telepon" value="<?= $instansi['telepon'] ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="alamat" class="form-label">Alamat Instansi</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control <?= $validation->hasError('telepon') ? 'is-invalid': null ?>" id="telepon" value="<?= $instansi['alamat'] ?>"><?= $instansi['alamat'] ?></textarea>                
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="<?= route_to('home.index') ?>" class="btn btn-danger text-white"><i class="fas fa-times"></i> Batal</a>
                <button class="btn btn-success text-white"><i class="fas fa-print"></i> Simpan</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?= $this->endSection(); ?>