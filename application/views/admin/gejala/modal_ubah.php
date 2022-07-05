<?php foreach ($gejala as $gjl) : ?>
  <div class="modal fade" id="ubahGejala<?= $gjl['id_gejala']; ?>" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahModal">Ubah Data Gejala (<?= $gjl['kode_gejala']; ?>)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('gejala/ubah'); ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?= $gjl['id_gejala']; ?>">
            <div class="form-group">
              <label for="kode">Kode Gejala :</label>
              <input type="text" class="form-control" id="kode" name="kode" value="<?= $gjl['kode_gejala']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama Gejala :</label>
              <input id="nama" class="form-control" name="nama" value="<?= $gjl['nama_gejala']; ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary"> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>