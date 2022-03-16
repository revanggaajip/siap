<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Pengguna
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
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th width="17%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPengguna as $key => $pengguna) :?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $pengguna['nama_pengguna'] ?></td>
                        <td><?= $pengguna['username_pengguna']; ?></td>
                        <td><?= $pengguna['hak_akses_pengguna']; ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#editData_<?= $pengguna['id_pengguna']; ?>">
                                <i class="fas fa-edit"></i>&nbsp;Ubah
                            </button>
                            <!-- Akhir Tombol Edit -->

                            <!-- Modal Edit -->

                            <!-- Akhir Modal Edit -->

                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#hapusData_<?= $pengguna['id_pengguna']; ?>">
                                <i class="fas fa-trash"></i>&nbsp;Hapus
                            </button>
                            <!-- Akhir Tombol Hapus -->
                            
                            <!-- Modal hapus -->
                            <div class="modal fade" id="hapusData_<?= $pengguna['id_pengguna'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus <?= $pengguna['nama_pengguna']; ?></h5>
                                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data <?= $pengguna['nama_pengguna']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?= base_url('pengguna/delete/'.$pengguna['id_pengguna']); ?>" method="post">
                                                <?php csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i class="fas fa-angle-left"></i>&nbsp;Batal</button>
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
<?= $this->include('pengguna/create'); ?>
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