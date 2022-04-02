<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Home
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!--  -->
  <div class="col-sm-6 col-md-3">
    <div class="card text-white bg-info">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-shopping-cart icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold">87.500</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Penjualan Hari ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-md-3">
    <div class="card text-white bg-success">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-money-bill icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold">87.500</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Penjualan Hari ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-md-3">
    <div class="card text-white bg-warning">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-money-bill icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold">87.500</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Penjualan Hari ini</small>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="col-sm-6 col-md-3">
    <div class="card text-white bg-danger">
      <div class="card-body">
        <div class="text-medium-emphasis-inverse text-end mb-4">
            <i class="fas fa-money-bill icon icon-xxl"></i>
        </div>
        <div class="fs-4 fw-semibold">87.500</div>
        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Penjualan Hari ini</small>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection();; ?>