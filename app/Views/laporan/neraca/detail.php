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
                <form action="<?= base_url('neraca/cetak') ?>" method="post" target="_blank">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="periode_awal" value="<?= $periode_awal; ?>">
                    <input type="hidden" name="periode_akhir" value="<?= $periode_akhir; ?>">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Id Akun</th>
                            <th>Nama Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalDebit = 0;
                        $totalKredit = 0;
                        foreach($listAkun as $key => $akun) :
                            $debit = 0;
                            $kredit = 0; ?>
                            <?php 
                                foreach( $listDetail as $key =>$detail) : 
                                    if($detail['id_akun'] == $akun['id_akun']) :
                                        $debit += $detail['debit'];
                                        $kredit += $detail['kredit'];
                                    endif;
                                endforeach; 
                            ?>
                            <?php 
                                if($debit > 0 || $kredit > 0) :
                            ?>
                                <tr>
                                    <td><strong><?= $akun['id_akun'] ?></strong></td>
                                    <td><?= $akun['nama_akun']; ?></td>
                                    <td><?= rupiah($debit); ?></td>
                                    <td><?= rupiah($kredit); ?></td>
                                </tr>
                            <?php 
                                endif; 
                                $totalDebit += $debit;
                                $totalKredit += $kredit;
                            ?>
                        <?php endforeach; ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center"><strong>Total Nominal</strong></td>
                            <td><?= rupiah($totalDebit); ?></td>
                            <td><?= rupiah($totalKredit); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
