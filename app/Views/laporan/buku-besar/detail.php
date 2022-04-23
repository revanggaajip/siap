<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>
                    <?= $title; ?>
                </h5>
                <form action="<?= base_url('buku-besar/cetak') ?>" method="post" target="_blank">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="periode_awal" value="<?= $periode_awal; ?>">
                    <input type="hidden" name="periode_akhir" value="<?= $periode_akhir; ?>">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <?php 
            foreach($listAkun as $key => $akun) : 
                $total = 0;
                $debit = 0;
                $kredit = 0;?>
                <div class="d-flex justify-content-between">
                    <p><strong>Nama Akun : <?= $akun['nama_akun']; ?></strong></p>
                    <p><strong>No. Akun : <?= $akun['id_akun']; ?></strong></p>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table table-stripped">
                        <thead>
                            <tr style="background-color: #fbc100;">
                                <th><strong>Tanggal</strong></th>
                                <th><strong>Keterangan</strong></th>
                                <th><strong>Reff</strong></th>
                                <th><strong>Debit</strong></th>
                                <th><strong>Kredit</strong></th>
                                <th><strong>Saldo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listJurnalHeader as $key => $jurnalHeader) :?>
                                <?php foreach($listJurnalDetail as $key =>$jurnalDetail) : ?>
                                    <?php if(
                                        $jurnalDetail['id_jurnal_header'] == $jurnalHeader['id_jurnal_header'] && 
                                        $jurnalDetail['id_akun'] == $akun['id_akun']) : 
                                        $debit += $jurnalDetail['debit'];
                                        $kredit += $jurnalDetail['kredit'];
                                        $total = $debit - $kredit?>
                                        <tr>
                                            <td><?= date('d-m-Y', strtotime($jurnalHeader['tanggal_jurnal'])); ?></td>
                                            <td><?= $jurnalHeader['keterangan_jurnal']; ?></td>
                                            <td><?= $jurnalHeader['id_jurnal_header']; ?></td>
                                            <td class="text-success"><?= rupiah($jurnalDetail['debit']); ?></td>
                                            <td class="text-danger"><?= rupiah($jurnalDetail['kredit']); ?></td>
                                            <td class="<?= $total >= 0 ? 'text-success' : 'text-danger'; ?>"><?= rupiah(abs($total)); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


