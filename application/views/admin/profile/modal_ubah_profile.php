<div class="modal fade" id="ubahProfile<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahProfile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahProfile">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('admin/ubahProfile'); ?>
      <div class="modal-body">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <div class="form-group">
          <label for="username"> Username : </label>
          <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="nama"> Nama : </label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama_user']; ?>">
        </div>
        <div class="form-group">
          <label for="gambar"> Foto Profil : </label>
          <br>
          <img class="mb-2" width="100" src=" <?= base_url('assets/img/') . $user['image']; ?>">
          <input type="file" class="form-control" id="gambar" name="gambar" value="">
          <input type="hidden" class="form-control" id="namafile" name="namafile" value="<?= $user['image']; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
        <button type="submit" class="btn btn-primary">Ubah profil</button>
      </div>
      </form>
    </div>
  </div>
</div>