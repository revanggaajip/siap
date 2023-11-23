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
        <form action="<?= base_url('penjualan/create') ?>" method="post">
            <div class="card-body">
                <?= csrf_field(); ?>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="idPenjualanHeader" class="form-label">ID Transaksi</label>
                            <input type="text" class="form-control" name="id_penjualan_header" id="idPenjualanHeader"
                                value="<?= $id; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="namaPasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="namaPasien">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="4"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-success text-white mb-3" data-coreui-toggle="modal"
                    data-coreui-target="#tambahKeranjangModal" id="tambahKeranjang">
                    <i class="fas fa-cart-plus"></i>&nbsp;Tambah Keranjang
                </button>
                <?= $this->include('penjualan/create'); ?>
                <table class="table table-striped table-bordered mb-4" id="dataTable">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('/'); ?>" class="btn btn-danger text-white"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                    <button type="submit" class="btn btn-success text-white"><i class="fas fa-save"></i>
                        Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
<!-- ---------------------------------------------------------------------------------- -->
<?= $this->section('scripts'); ?>
<script>
$(document).ready(() => {
    lihatKeranjang();
    tambahKeranjang();
    hapusKeranjang();
    seleksi();
});

function rupiah(angka) {
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
        let id = $('#namaObat').val();
        let quantity = $('#quantityObat').val();
        $.ajax({
            url: "<?= base_url('penjualan/tambah-keranjang') ?>",
            method: "POST",
            data: {
                _token: "<?= csrf_token(); ?>",
                id: id,
                quantity: quantity
            },
            success: (response) => {
                let result = JSON.parse(response)
                console.log(result);
            }
        });
        $('#namaObat').val(null)
        $("#quantityObat").val(null);
        $("#tambahKeranjangModal").modal('hide');
        lihatKeranjang()
    });
}

function lihatKeranjang() {
    $('tbody').html('');
    $('tfoot').html('');
    let nomor = 1;
    $.ajax({
        url: "<?= base_url('penjualan/lihat-keranjang') ?>",
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
                                <i class="fas fa-times"></i> Hapus
                            </button>
                        </td>
                    </tr>`
                $('tbody').append(keranjang);
                total += data.subtotal;
            });
            let totalKeranjang = `
                <tr>
                    <td colspan="4" class="text-center">Total Penjualan</td>
                    <td colspan="2">Rp. ${rupiah(total)}</td>
                </tr>`
            $('tfoot').append(totalKeranjang)
        }
    });
}

function hapusKeranjang() {
    $(document).on('click', '.btn-hapus', (result) => {
        if (confirm('Apakah anda yakin untuk menghapus data keranjang?')) {
            let id = $(result.target).val()
            $.ajax({
                url: "<?= base_url('penjualan/hapus-keranjang') ?>/" + id,
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
    let obat = $("#namaObat").val()
    let quantity = $("#quantityObat").val()
    // console.log(obat, quantity);
    if (obat != '' && quantity != '') {
        $.ajax({
            url: "<?= base_url('penjualan/cek-subtotal') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                _token: "<?= csrf_token() ?>",
                id: obat,
                qty: quantity
            },
            success: (response) => {
                // console.log(response);
                $("#subtotalObat").val(`Rp. ${rupiah(response.data)}`)
                let cekStok = response.obat.stok - quantity;
                // console.log(cekStok);
                if (cekStok < 0) {
                    $('#quantityObat').addClass('is-invalid');
                    $('#quantityValidasi').html(
                        `Maaf, sisa stok obat tinggal ${response.obat.stok} ${response.obat.satuan}`
                    );
                    $('#satuanObat').html('');
                    $('#btnTambahKeranjang').attr('disabled');
                    $('#btnTambahKeranjang').prop('disabled', true);
                } else {
                    $('#satuanObat').html(`(${response.obat.satuan})`);
                    $('#quantityObat').removeClass('is-invalid');
                    $('#quantityValidasi').html('');
                    $('#btnTambahKeranjang').prop('disabled', false);
                }
            }
        })
    }
}

function seleksi()
{
    $('#namaObat').select2({
        dropdownParent: $("#tambahKeranjangModal")
    });
}


</script>
<?php $this->endSection(); ?>