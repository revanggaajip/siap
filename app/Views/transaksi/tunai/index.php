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
            <form action="<?= base_url('transaksi-tunai/create') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idTransaksiHeader" class="form-label">ID Transaksi</label>
                                <input type="text" class="form-control" name="id_transaksi_header" id="idTransaksiHeader" value="<?= $id; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tglTransaksiHeader" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal_transaksi" id="tglTransaksiHeader" value="<?= date('Y-m-d'); ?>">
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
                    <table class="table table-striped table-bordered mb-4" id="dataTable">
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
                        <tbody></tbody>
                        <tfoot></tfoot>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('/'); ?>" class="btn btn-danger text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<!-- ---------------------------------------------------------------------------------- -->
<?= $this->section('scripts'); ?>
<script>
    $(document).ready(()=> {
        lihatKeranjang();
        tambahKeranjang();
        hapusKeranjang();
        // cekTotalBayar();
    });

    function rupiah(angka){
        let reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function reverseRupiah(angka) {
        let deleteRp = angka.replace('Rp. ', '')
        let result = deleteRp.replaceAll('.', '')
        return result
    }

    function tambahKeranjang() {
        $('#btnTambahKeranjang').click(() => {
            let id_barang = $('#namaBarang').val();
            let quantity_barang = $('#quantityBarang').val();
            $.ajax({
                url: "<?= base_url('transaksi-tunai/tambah-keranjang') ?>",
                method: "POST",
                data: {
                    _token: "<?= csrf_token(); ?>",
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
        $('tfoot').html('');
        let nomor = 1;
        $.ajax({
            url: "<?= base_url('transaksi-tunai/lihat-keranjang') ?>",
            method: "GET",
            dataType: "JSON",
            success: (response) => {
                let total = 0;
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
                    total += data.subtotal;
                });
                let totalKeranjang = `
                <tr>
                    <td colspan="4" class="text-center">Total Transaksi</td>
                    <td colspan="2">Rp. ${rupiah(total)}</td>
                </tr>`
                $('tfoot').append(totalKeranjang)
            }
        });
    }

    function hapusKeranjang() {
        $(document).on('click', '.btn-hapus', (result) => {
            if(confirm('Apakah anda yakin untuk menghapus data keranjang?')) {
                let id  = $(result.target).val()
                $.ajax({
                    url: "<?= base_url('transaksi-tunai/hapus-keranjang') ?>/"+id,
                    method: "GET",
                    success: (response) => {
                        console.log(response);
                    }
                })
            }
            lihatKeranjang()
        })
    }

    function cekSubtotal() {
        let barang = $("#namaBarang").val()
        let quantity = $("#quantityBarang").val()
        if(barang !='' && quantity !='') {
            $.ajax({
                url: "<?= base_url('transaksi-tunai/cek-subtotal') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    _token: "<?= csrf_token() ?>",
                    id: barang,
                    qty: quantity
                },
                success: (response) => {
                    $("#subtotalBarang").val(`Rp. ${rupiah(response.data)}`)
                    let cekStok = response.barang.stok_barang - quantity;
                    if(cekStok < 0) {
                        $('#quantityBarang').addClass('is-invalid');
                        $('#quantityValidasi').html(`Maaf, ${response.barang.nama_barang} hanya tersisa ${response.barang.stok_barang} ${response.barang.satuan_barang}`);
                        $('#btnTambahKeranjang').attr('disabled');
                        $('#btnTambahKeranjang').prop('disabled', true);
                    } else {
                        $('#quantityBarang').removeClass('is-invalid');
                        $('#quantityValidasi').html('');
                        $('#btnTambahKeranjang').prop('disabled', false);
                    }
                }
            })
        }
    }

</script>
<?php $this->endSection(); ?>


