<div class="modal fade" id="tambahKeranjangModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="tambahKeranjangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKeranjangModalLabel"><i class="fas fa-cart-plus"></i> Tambah Keranjang</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-2">
            <label for="namaBarang" class="mb-1">Nama Barang</label>
            <select name="id_barang" id="namaBarang" class="form-select">
              <?php foreach($listBarang as $barang) :?>
              <option value="<?= $barang['id_barang']; ?>"><?= $barang['nama_barang']; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-2">
          <label for="quantityBarang" class="mb-1">Quantity</label>
          <input type="number" class="form-control" name="quantity_barang" id="quantityBarang">
        </div>
        <div class="mb-2">
          <label for="subtotalBarang" class="mb-1">Subtotal</label>
          <input type="text" class="form-control" name="subtotal_barang" id="subtotalBarang" value="<?= rupiah(0); ?>" readonly>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <button type="button" id="btnTambahKeranjang" class="btn btn-success text-white"><i class="fas fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>