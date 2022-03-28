<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Barang
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>
                    <?= $title; ?>
                </h5>
                <button type="button" class="btn btn-primary btn-sm" data-coreui-toggle="modal" data-coreui-target="#tambahData">
                    <i class="fas fa-plus"></i>&nbsp;Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="17%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listBarang as $key => $barang) :?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $barang['nama_barang']; ?></td>
                        <td><?= $barang['stok_barang']; ?>&nbsp;<?= $barang['satuan_barang']; ?></td>
                        <td><?= rupiah($barang['harga_barang']); ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#editData_<?= $barang['id_barang']; ?>">
                                <i class="fas fa-edit"></i>&nbsp;Ubah
                            </button>
                            <!-- Akhir Tombol Edit -->

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editData_<?= $barang['id_barang'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Form Ubah barang <?= $barang['nama_barang']; ?></h5>
                                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('barang/edit/'.$barang['id_barang']); ?>" method="post">
                                        <?php csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label for="namaBarangEdit" class="form-label">Nama barang</label>
                                                <input type="text" class="form-control" name="nama_barang" id="namaBarangEdit" value="<?= $barang['nama_barang']; ?>">
                                            </div>
                                            <div class="mb-2">
                                                <label for="stokBarangEdit" class="form-label">Stok barang</label>
                                                <input type="number" class="form-control" name="stok_barang" id="stokBarangEdit" value="<?= $barang['stok_barang']; ?>">
                                            </div>
                                            <div class="mb-2">
                                                <label for="satuanBarangEdit" class="mb-1">Satuan barang</label>
                                                <select name="satuan_barang" id="satuanBarangEdit" class="form-select">
                                                    <option value="Gram" <?= $barang['satuan_barang'] == 'Gram' ? 'selected' : null; ?>>Gram</option>
                                                    <option value="KG" <?= $barang['satuan_barang'] == 'KG' ? 'selected' : null; ?>>KG</option>
                                                    <option value="Drum" <?= $barang['satuan_barang'] == 'Drum' ? 'selected' : null; ?>>Drum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Batal</button>
                                            <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i>&nbsp;Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit -->

                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#hapusData_<?= $barang['id_barang']; ?>">
                                <i class="fas fa-trash"></i>&nbsp;Hapus
                            </button>
                            <!-- Akhir Tombol Hapus -->
                            
                            <!-- Modal hapus -->
                            <div class="modal fade" id="hapusData_<?= $barang['id_barang'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus <?= $barang['nama_barang']; ?></h5>
                                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data <?= $barang['nama_barang']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?= base_url('barang/delete/'.$barang['id_barang']); ?>" method="post">
                                                <?php csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Batal</button>
                                                <button type="submit" class="btn btn-success text-white"><i class="fas fa-trash"></i>&nbsp;Hapus</button>
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

<!-- Modal Tambah-->
<?= $this->include('barang/create'); ?>
<!-- Modal Tambah -->

<?= $this->endSection(); ?>

<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?= base_url('vendors/dataTables/css/dataTables.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('vendors/dataTables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendors/dataTables/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script>
    $(document).ready(()=> {
        $("#dataTable").DataTable();
    });
</script>
<?php $this->endSection(); ?>
