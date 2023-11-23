<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Obat
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>
                    <?= $title; ?>
                </h5>
                <button type="button" class="btn btn-primary btn-sm" data-coreui-toggle="modal"
                    data-coreui-target="#tambahData">
                    <i class="fas fa-plus"></i>&nbsp;Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="15">No</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Kapasitas</th>
                            <th>Satuan</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Golongan</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listObat as $key => $obat) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $obat['nama']; ?></td>
                            <td><?= $obat['stok']; ?></td>
                            <td><?= rupiah($obat['harga']); ?></td>
                            <td><?= $obat['kapasitas']; ?></td>
                            <td><?= $obat['satuan']; ?></td>
                            <td><?= $obat['jenis']; ?></td>
                            <td><?= $obat['kategori']; ?></td>
                            <td><?= $obat['golongan']; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm text-white"
                                    data-coreui-toggle="modal" data-coreui-target="#editData_<?= $obat['id']; ?>">
                                    <i class="fas fa-edit"></i>&nbsp;Ubah
                                </button>
                                <!-- Akhir Tombol Edit -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editData_<?= $obat['id'] ?>" data-coreui-backdrop="static"
                                    data-coreui-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Form Ubah obat
                                                    <?= $obat['nama']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?= route_to('obat.update',$obat['id']); ?>" method="post">
                                                <?php csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            <label for="id" class="form-label">Id</label>
                                                            <input type="text" class="form-control" name="id" id="id"
                                                                value="<?= $obat['id']; ?>" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" name="nama"
                                                                id="nama" value="<?= $obat['nama']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            <label for="satuan" class="form-label">Satuan</label>
                                                            <select name="satuan" id="satuan" class="form-control">
                                                                <?php foreach($listSatuan as $key => $satuan) :?>
                                                                <option value="<?= $satuan['nama']; ?>"
                                                                    <?= $obat['satuan'] == $satuan['nama'] ? 'selected' : null; ?>>
                                                                    <?= $satuan['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="jenis" class="form-label">Jenis</label>
                                                            <select name="jenis" id="jenis" class="form-control">
                                                                <?php foreach($listJenis as $key => $jenis) :?>
                                                                <option value="<?= $jenis['nama']; ?>"
                                                                    <?= $obat['jenis'] == $jenis['nama'] ? 'selected' : null; ?>>
                                                                    <?= $jenis['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select name="kategori" id="kategori" class="form-control">
                                                                <?php foreach($listKategori as $key => $kategori) :?>
                                                                <option value="<?= $kategori['nama']; ?>"
                                                                    <?= $obat['kategori'] == $kategori['nama'] ? 'selected' : null; ?>>
                                                                    <?= $kategori['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="golongan" class="form-label">golongan</label>
                                                            <select name="golongan" id="golongan" class="form-control">
                                                                <?php foreach($listGolongan as $key => $golongan) :?>
                                                                <option value="<?= $golongan['nama']; ?>"
                                                                    <?= $obat['golongan'] == $satuan['nama'] ? 'selected' : null; ?>>
                                                                    <?= $golongan['nama']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            <label for="kapasitas" class="form-label">Kapasitas</label>
                                                            <input type="text" class="form-control" id="kapasitas"
                                                                placeholder="500 ML" name="kapasitas"
                                                                value="<?= $obat['kapasitas']; ?>">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="number" class="form-control" id="harga"
                                                                name="harga" value="<?= $obat['harga']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="minStok" class="form-label">Minimal Stok</label>
                            <input type="number" id="minStok" name="min_stok" class="form-control">
                        </div>
                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label for="kandungan" class="form-label">Kandungan</label>
                                                            <textarea name="kandungan" id="kandungan" cols="30" rows="3"
                                                                class="form-control"><?= $obat['kandungan']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger text-white"
                                                        data-coreui-dismiss="modal"><i
                                                            class="fas fa-times"></i>&nbsp;Batal</button>
                                                    <button type="submit" class="btn btn-success text-white"><i
                                                            class="fas fa-save"></i>&nbsp;Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Edit -->

                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-danger btn-sm text-white"
                                    data-coreui-toggle="modal" data-coreui-target="#hapusData_<?= $obat['id']; ?>">
                                    <i class="fas fa-trash"></i>&nbsp;Hapus
                                </button>
                                <!-- Akhir Tombol Hapus -->

                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapusData_<?= $obat['id'] ?>" data-coreui-backdrop="static"
                                    data-coreui-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus
                                                    <?= $obat['nama']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data <?= $obat['nama']; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= route_to('obat.delete', $obat['id']) ?>"
                                                    method="post">
                                                    <?php csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-danger text-white"
                                                        data-coreui-dismiss="modal"><i
                                                            class="fas fa-times"></i>&nbsp;Batal</button>
                                                    <button type="submit" class="btn btn-success text-white"><i
                                                            class="fas fa-trash"></i>&nbsp;Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Hapus -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<?= $this->include('obat/create'); ?>
<!-- Modal Tambah -->

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