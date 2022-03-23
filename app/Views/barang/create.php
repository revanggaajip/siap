<div class="modal fade" id="tambahData" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahData">Tambah Barang Baru</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('barang/create'); ?>" method="post">
          <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="mb-2">
            <label for="namaBarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="namaBarang">
        </div>
        <div class="mb-2">
            <label for="stokBarang" class="form-label">Stok Barang</label>
            <input type="number" class="form-control" name="stok_barang" id="stokBarang">
        </div>
        <div class="mb-2">
            <label for="satuanBarang" class="mb-1">Satuan Barang</label>
            <select name="satuan_barang" id="jenisbarang" class="form-select">
                <option value="Gram">Gram</option>
                <option value="KG">KG</option>
                <option value="Drum">Drum</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Batal</button>
        <button type="submit" id="simpanTambah" class="btn btn-success text-white"><i class="fas fa-save"></i>&nbsp;Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>