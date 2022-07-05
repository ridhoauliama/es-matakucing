<?php foreach ($pengetahuan as $P) : ?>
	<div class="modal fade" id="ubahPengetahuan<?= $P['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Data Relasi ke -<?= $P['id']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open_multipart('pengetahuan/ubah'); ?>
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $P['id']; ?>">
					<div class="form-group">
						<label for="penyakit">Data Penyakit :</label>
						<select name="penyakit" id="penyakit" class="form-control">
							<?php foreach ($penyakit as $k) : ?>
								<option value="<?= $k['id_penyakit']; ?>" <?php if ($P['id_penyakit'] == $k['id_penyakit']) {
																														echo 'selected';
																													} ?>><?= $k['kode_penyakit']; ?> - <?= $k['nama_penyakit']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="gejala">Data Gejala :</label>
						<select name="gejala" id="gejala" class="form-control">
							<?php foreach ($gejala as $g) : ?>
								<option value="<?= $g['id_gejala']; ?>" <?php if ($P['id_gejala'] == $g['id_gejala']) {
																													echo 'selected';
																												} ?>><?= $g['kode_gejala']; ?> - <?= $g['nama_gejala']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="cf_gejala">Bobot MB :</label>
						<input type="text" class="form-control" id="cf_gejala" name="cf_gejala" value="<?= $P['cf_gejala']; ?>">
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
