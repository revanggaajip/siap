<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null ?>
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
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_faktur" class="form-label">No. Faktur</label>
                        <input type="text" class="form-control" name="no_faktur" id="no_faktur"
                            value="<?= $header['no_faktur'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="<?= $header['tanggal'] ?>">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sp" class="form-label">No. Surat Pemesanan</label>
                        <input type="text" class="form-control" name="sp" id="sp" value="<?= $header["sp"]?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                            value="<?= $header['nama_supplier']?>">
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="15">No</th>
                            <th width="50%">Nama Obat</th>
                            <th width="50px">Satuan</th>
                            <th width="50px">Quantity</th>
                            <th width="50px">Kadaluarsa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataPenerimaan as $key => $penerimaan) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $penerimaan['nama']; ?></td>
                            <td><?= $penerimaan['satuan']; ?></td>
                            <td><?= $penerimaan['quantity']; ?></td>
                            <td><?= date('d-m-Y', strtotime($penerimaan['kadaluarsa'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="<?= route_to('home.index'); ?>" class="btn btn-danger text-white"><i
                        class="fas fa-arrow-left"></i>
                    Kembali</a>
                <a href="<?= route_to('penerimaan.bill', $header['id']); ?>" class="btn btn-info text-white"><i
                        class="fas fa-print"></i>
                    Cetak</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>