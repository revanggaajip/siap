<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Pelanggan
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
                            <th>Nama</th>
                            <th>No.Handphone</th>
                            <th>Alamat</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listPelanggan as $key => $pelanggan) :?>
                        <tr>
                            <td><?= $key+1; ?></td>
                            <td><?= $pelanggan['nama_pelanggan'] ?></td>
                            <td><?= $pelanggan['no_hp_pelanggan']; ?></td>
                            <td><?= $pelanggan['alamat_pelanggan']; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#editData_<?= $pelanggan['id_pelanggan']; ?>">
                                    <i class="fas fa-edit"></i>&nbsp;Ubah
                                </button>
                                <!-- Akhir Tombol Edit -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editData_<?= $pelanggan['id_pelanggan'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Form Ubah pelanggan <?= $pelanggan['nama_pelanggan']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('pelanggan/edit/'.$pelanggan['id_pelanggan']); ?>" method="post">
                                            <?php csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="namaPelangganEdit" class="form-label">Nama pelanggan</label>
                                                    <input type="text" class="form-control" name="nama_pelanggan" id="namaPelangganEdit" value="<?= $pelanggan['nama_pelanggan']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="noHpPelangganEdit" class="form-label">No.Handphone pelanggan</label>
                                                    <input type="text" class="form-control" name="no_hp_pelanggan" id="noHpPelangganEdit" value="<?=$pelanggan['no_hp_pelanggan']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="alamatPelanggan" class="form-label">Alamat pelanggan</label>
                                                    <textarea class="form-control" name="alamat_pelanggan" id="alamatPelangganEdit"><?= $pelanggan['alamat_pelanggan']; ?></textarea>
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
                                <button type="button" class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#hapusData_<?= $pelanggan['id_pelanggan']; ?>">
                                    <i class="fas fa-trash"></i>&nbsp;Hapus
                                </button>
                                <!-- Akhir Tombol Hapus -->
                                
                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapusData_<?= $pelanggan['id_pelanggan'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus <?= $pelanggan['nama_pelanggan']; ?></h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data <?= $pelanggan['nama_pelanggan']; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('pelanggan/delete/'.$pelanggan['id_pelanggan']); ?>" method="post">
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
<?= $this->include('pelanggan/create'); ?>
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