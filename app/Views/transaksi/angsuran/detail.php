<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title ?? null; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5><?= $title; ?> - <?= $transaksi['id_transaksi_header']; ?></h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('angsuran/create/'. $transaksi['id_transaksi_header']); ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" id="namaPelanggan" class="form-control" value="<?= $transaksi['nama_pelanggan']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="idTransaksi" class="form-label">ID Transaksi</label>
                        <input type="text" name="id_transaksi" id="idTransaksi" class="form-control" value="<?= $transaksi['id_transaksi_header']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="tglTransaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="text" name="tanggal_transaksi" id="tglTransaksi" class="form-control" value="<?= date('d-m-Y', strtotime($transaksi['tanggal_transaksi'])); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="tglJatuhTempo" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="text" name="tanggal_jatuh_tempo" id="tglJatuhTempo" class="form-control" value="<?= date('d-m-Y', strtotime($transaksi['tanggal_jatuh_tempo_transaksi'])); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <label for="keteranganTransaksi" class="form-label">Keterangan Transaksi</label>
                        <textarea name="keterangan_transaksi" id="keteranganTransaksi" cols="30" rows="5" class="form-control" disabled><?= $transaksi['keterangan_transaksi']; ?></textarea>
                    </div>
                </div>
            </div>
            <hr class="mb-2">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="noAngsuran" class="form-label">Angsuran Ke</label>
                        <input type="number" name="nomor_angsuran" id="tglJatuhTempo" class="form-control" value="<?= $noAngsuran; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="tglJatuhTempo" class="form-label">Piutang Transaksi</label>
                        <input type="text" name="tanggal_jatuh_tempo" id="tglJatuhTempo" class="form-control" value="<?= rupiah($transaksi['piutang_transaksi']) ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="nominalAngsuran" class="form-label">Nominal Angsuran</label>
                        <input type="number" name="nominal_angsuran" id="nominalAngsuran" class="form-control" value="0" >
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="tglAngsuran" class="form-label">Tanggal Angsuran</label>
                        <input type="date" name="tanggal_angsuran" id="tglAngsuran" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('angsuran'); ?>" class="btn btn-danger text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-success text-white"><i class="fas fa-hand-holding-usd"></i> Bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>