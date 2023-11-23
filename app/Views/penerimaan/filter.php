<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>
                    <?= $title; ?>
                </h5>

            </div>
            <form action="<?= route_to('penerimaan.report')?>" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="periodeAwal">Periode Awal</label>
                        <input type="date" name="periode_awal" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="periodeAkhir">Periode Akhir</label>
                        <input type="date" name="periode_akhir" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= route_to('penerimaan.index') ?>" class="btn text-white btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success text-white">Cetak</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>