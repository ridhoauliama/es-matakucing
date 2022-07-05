<div class="modal fade" id="tambahPenyakit" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Input Data Penyakit Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('penyakit/tambah'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="kode" class="col-form-label">Kode Penyakit :</label>
						<input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama" class="col-form-label">Nama Penyakit : </label>
						<input type="text" class="form-control" id="nama" name="nama">
					</div>
					<div class="form-group">
						<label for="solusi" class="col-form-label">Solusi :</label>
						<textarea id="solusi" class="form-control" type="text" name="solusi"></textarea>
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
