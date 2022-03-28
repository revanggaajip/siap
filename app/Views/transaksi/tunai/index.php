<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idTransaksiHeader" class="form-label">ID Transaksi</label>
                                <input type="text" class="form-control" name="id_transaksi_header" id="idTransaksiHeader" value="<?= $id; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tglTransaksiHeader" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal_transaksi_header" id="tglTransaksiHeader" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="keteranganTransaksi" class="mb-1">Keterangan</label>
                                <textarea name="keterangan_transaksi" id="keteranganTramsaksi" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-success text-white mb-3" data-coreui-toggle="modal" data-coreui-target="#tambahKeranjangModal">
                        <i class="fas fa-cart-plus"></i>&nbsp;Tambah Keranjang
                    </button>
                    <?= $this->include('transaksi/tunai/create'); ?>
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th width="12%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<!-- ---------------------------------------------------------------------------------- -->
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?= base_url('vendors/dataTables/css/dataTables.bootstrap4.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('vendors/dataTables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendors/dataTables/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script>
    $(document).ready(()=> {
        lihatKeranjang();
        tambahKeranjang();
        hapusKeranjang();
    });

    function rupiah(angka){
        var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function tambahKeranjang() {
        $('#btnTambahKeranjang').click(() => {
            let id_barang = $('#namaBarang').val();
            let quantity_barang = $('#quantityBarang').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?= base_url('transaksi-tunai/tambah-keranjang') ?>",
                method: "POST",
                data: {
                    id_barang:id_barang,
                    quantity_barang:quantity_barang
                },
                success: (response) => {
                    let result = JSON.parse(response)
                    console.log(result);
                }
            });
            $('#namaBarang').val(1)
            $("#quantityBarang").val(null);
            $("#tambahKeranjangModal").modal('hide');
            lihatKeranjang()
        });
    }

    function lihatKeranjang() {
        $('tbody').html('');
        let nomor = 1;
        $.ajax({
            url: "<?= base_url('transaksi-tunai/lihat-keranjang') ?>",
            method: "GET",
            dataType: "JSON",
            success: (response) => {
                $.each(response, (key, data) => {
                    let keranjang = `
                    <tr>
                        <td>${nomor++}</td>
                        <td>${data.name}</td>
                        <td>Rp. ${rupiah(data.price)}</td>
                        <td>${data.qty}</td>
                        <td>Rp. ${rupiah(data.subtotal)}</td>
                        <td class="text-center">
                            <button type="button" class="btn-hapus btn btn-danger btn-sm text-white" value="${data.rowid}">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </td>
                    </tr>`
                    $('tbody').append(keranjang);
                });
            }
        });
    }
    function hapusKeranjang() {
        $(document).on('click', '.btn-hapus', (result) => {
            let id  = $(result.target).val()
            console.log(id)
            $.ajax({
                url: "<?= base_url('transaksi-tunai/hapus-keranjang') ?>/"+id,
                method: "GET",
                success: (response) => {
                    console.log(response);
                }
            })
            lihatKeranjang()
        })
    }

</script>
<?php $this->endSection(); ?>


