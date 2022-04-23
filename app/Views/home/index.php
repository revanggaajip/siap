<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Home
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-2">
    <div class="card text-white bg-info">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-shopping-cart icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold"><?= $kolom1; ?> Transaksi</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Jumlah Transaksi Hari ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-lg-3 mb-2">
    <div class="card text-white bg-success">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-money-bill icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold"><?= rupiah($kolom2['total_transaksi']); ?></div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Nominal Transaksi Hari ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-lg-3 mb-2">
    <div class="card text-white bg-warning">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-shopping-cart icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold"><?= $kolom3; ?> Transaksi</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Jumlah Transaksi Bulan ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-lg-3 mb-2">
    <div class="card text-white bg-danger">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-money-bill icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold"><?= rupiah($kolom4['total_transaksi']); ?></div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Nominal Transaksi Bulan ini</small>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection();; ?>