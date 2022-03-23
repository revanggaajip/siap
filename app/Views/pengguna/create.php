<div class="modal fade" id="tambahData" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahData">Tambah pengguna Baru</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('pengguna/create'); ?>" method="post">
          <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="mb-2">
            <label for="namaPengguna" class="form-label">Nama pengguna</label>
            <input type="text" class="form-control" name="nama_pengguna" id="namaPengguna">
        </div>
        <div class="mb-2">
            <label for="tglLahirPengguna" class="form-label">Tanggal lahir pengguna</label>
            <input type="date" class="form-control" name="tanggal_lahir_pengguna" id="tanggalLahirPengguna">
        </div>
        <div class="mb-2">
            <label for="usernamePengguna" class="form-label">Username pengguna</label>
            <input type="text" class="form-control" name="username_pengguna" id="usernamePengguna">
        </div>
        <div class="mb-2">
            <label for="hakAksesPengguna" class="mb-1">Hak akses pengguna</label>
            <select name="hak_akses_pengguna" id="hakAksesPengguna" class="form-select">
                <option value="Admin">Admin</option>
                <option value="Pemilik">Pemilik</option>
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