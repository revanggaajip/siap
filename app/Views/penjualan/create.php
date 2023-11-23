<div class="modal fade" id="tambahKeranjangModal" data-coreui-backdrop="static" data-coreui-keyboard="false"
    tabindex="-1" aria-labelledby="tambahKeranjangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKeranjangModalLabel"><i class="fas fa-cart-plus"></i> Tambah Keranjang
                </h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="namaObat" class="mb-1">Nama Obat</label>
                    <select name="id" id="namaObat" class="form-control pilihan" onchange="cekSubtotal()" style="width: 100%; height: 35px !important;">
                        <option disabled selected>Pilih Obat</option>
                        <?php foreach($listObat as $obat) :?>
                        <option value="<?= $obat['id']; ?>"><?= $obat['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="quantityObat" class="mb-1">Quantity <span id="satuanObat"></span></label>
                    <input type="number" class="form-control" name="quantity" id="quantityObat" onkeyup="cekSubtotal()"
                        onchange="cekSubtotal()" value="0">
                    <div id="quantityValidasi" class="invalid-feedback"></div>
                </div>
                <div class="mb-2">
                    <label for="subtotalObat" class="mb-1">Subtotal</label>
                    <input type="text" class="form-control" name="subtotal" id="subtotalObat" value="<?= rupiah(0); ?>"
                        readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal"><i
                        class="fas fa-times"></i> Batal</button>
                <button type="button" id="btnTambahKeranjang" disabled class="btn btn-success text-white"><i
                        class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('styles') ?>
<style>
    .select2-container .select2-selection--single {
height: 40px !important;
}
</style>
<?= $this->endSection() ?>