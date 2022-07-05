<div class="modal fade" id="tambahPengetahuan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Tambah Basis Aturan <span class="badge">(Baru)</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('pengetahuan/tambah'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="penyakit">Data Penyakit :</label>
						<select name="penyakit" id="penyakit" class="form-control">
							<option value="">-- Pilih Penyakit --</option>
							<?php foreach ($penyakit as $K) : ?>
								<option value="<?= $K['id_penyakit']; ?>"><?= $K['kode_penyakit']; ?> - <?= $K['nama_penyakit']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="gejala">Data Gejala :</label>
						<select name="gejala" id="gejala" class="form-control">
							<option value="">-- Pilih Gejala --</option>
							<?php foreach ($gejala as $G) : ?>
								<option value="<?= $G['id_gejala']; ?>"><?= $G['kode_gejala']; ?> - <?= $G['nama_gejala']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="cf_gejala">CF Gejala :</label>
						<input type="text" class="form-control" id="cf_gejala" name="cf_gejala" placeholder="" required>
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
