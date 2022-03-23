<div class="modal fade" id="tambahData" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahData">Tambah Akun Baru</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('akun/create'); ?>" method="post">
          <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="mb-2">
            <label for="idAkun" class="form-label">Id Akun</label>
            <input type="text" class="form-control" name="id_akun" id="idAkun" placeholder="101">
        </div>
        <div class="mb-2">
            <label for="namaAkun" class="form-label">Nama Akun</label>
            <input type="text" class="form-control" name="nama_akun" id="namaAkun" placeholder="Penjualan">
        </div>
        <div class="mb-2">
            <label for="jenisAkun" class="mb-1">Jenis Akun</label>
            <select name="jenis_akun" id="jenisAkun" class="form-select">
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
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