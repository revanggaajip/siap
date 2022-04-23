<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Akun
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="7%">No</th>
                            <th width="12%">Id Akun</th>
                            <th>Nama Akun</th>
                            <th width="20%">Jenis Akun</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listAkun as $key => $akun) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $akun['id_akun']; ?></td>
                            <td><?= $akun['nama_akun']; ?></td>
                            <td><?= $akun['jenis_akun']; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#editData_<?= $akun['id_akun']; ?>">
                                    <i class="fas fa-edit"></i>&nbsp;Ubah
                                </button>
                                <!-- Akhir Tombol Edit -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editData_<?= $akun['id_akun'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Form Ubah Akun <?= $akun['nama_akun']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('akun/edit/'.$akun['id_akun']); ?>" method="post">
                                            <?php csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="idAkunEdit" class="form-label">Id Akun</label>
                                                    <input type="text" class="form-control" name="id_akun" id="idAkunEdit" placeholder="101" value="<?= $akun['id_akun'] ?>" readonly>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="namaAkunEdit" class="form-label">Nama Akun</label>
                                                    <input type="text" class="form-control" name="nama_akun" id="namaAkunEdit" placeholder="Penjualan" value="<?= $akun['nama_akun']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="jenisAkunEdit" class="mb-1">Jenis Akun</label>
                                                    <select name="jenis_akun" id="jenisAkunEdit" class="form-select">
                                                        <option value="Debit" <?= $akun['jenis_akun'] == 'Debit' ? 'selected' : null; ?>>Debit</option>
                                                        <option value="Kredit" <?= $akun['jenis_akun'] == 'Kredit' ? 'selected' : null; ?>>Kredit</option>
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
                                <button type="button" class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#hapusData_<?= $akun['id_akun']; ?>">
                                    <i class="fas fa-trash"></i>&nbsp;Hapus
                                </button>
                                <!-- Akhir Tombol Hapus -->
                                
                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapusData_<?= $akun['id_akun'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus <?= $akun['nama_akun']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data <?= $akun['nama_akun']; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('akun/delete/'.$akun['id_akun']); ?>" method="post">
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
</div>

<!-- Modal Tambah-->
<?= $this->include('akun/create'); ?>
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

        $('#simpanTambah').click(() => {
            
        });
    });
</script>
<?php $this->endSection(); ?>
