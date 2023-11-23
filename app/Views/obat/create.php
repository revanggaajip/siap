<div class="modal fade" id="tambahData" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1"
    aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahData">Tambah Obat Baru</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= route_to('obat.store') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="id" class="form-label">Id</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $id; ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select name="satuan" id="satuan" class="form-control">
                                <?php foreach($listSatuan as $key => $satuan) :?>
                                <option value="<?= $satuan['nama']; ?>"><?= $satuan['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <?php foreach($listJenis as $key => $jenis) :?>
                                <option value="<?= $jenis['nama']; ?>"><?= $jenis['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php foreach($listKategori as $key => $kategori) :?>
                                <option value="<?= $kategori['nama']; ?>"><?= $kategori['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="golongan" class="form-label">golongan</label>
                            <select name="golongan" id="golongan" class="form-control">
                                <?php foreach($listGolongan as $key => $golongan) :?>
                                <option value="<?= $golongan['nama']; ?>"><?= $golongan['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="text" class="form-control" id="kapasitas" placeholder="500 ML"
                                name="kapasitas">
                        </div>
                        <div class="col-6">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="minStok" class="form-label">Minimal Stok</label>
                            <input type="number" id="minStok" name="min_stok" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="kandungan" class="form-label">Kandungan</label>
                            <textarea name="kandungan" id="kandungan" cols="30" rows="3"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i
                            class="fas fa-times"></i>&nbsp;Batal</button>
                    <button type="submit" id="simpanTambah" class="btn btn-success text-white"><i
                            class="fas fa-save"></i>&nbsp;Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>