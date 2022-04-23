<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Laporan Penjualan
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
                    <form action="<?= base_url('laporan-penjualan') ?>" method="post">
                        <strong>Pilih Periode Laporan</strong>
                        <div class="row mt-4">
                            <div class="col-md-6 mb-2">
                                <label for="priodeAwal" class="mb-1">Periode Awal</label>
                                <input type="date" class="form-control" id="periodeAwal" name="periode_awal" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="priodeAkhir" class="mb-1">Periode Akhir</label>
                                <input type="date" class="form-control" id="periodeAkhir" name="periode_akhir" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success text-white mt-3"><i class="fas fa-save"></i> Lihat</button>
                        <button type="reset" class="btn btn-warning text-white mt-3"><i class="fas fa-redo"></i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>