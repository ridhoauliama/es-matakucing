<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-0">
					<div class="col">
						<h5 class="mb-0 page-title"><?= $tabel ?></h5>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group d-none d-lg-inline">
								<label for="reportrange" class="sr-only">Date Ranges</label>
								<div id="reportrange" class="px-2 py-2">
									<span class="small"></span>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row my-1">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<button type="button" class="btn btn-primary btn-round mb-2" data-toggle="modal" data-target="#tambahPenyakit" data-whatever="@mdo">
									<i class="fe fe-plus-square fe-16"></i> Tambah Penyakit
								</button>
								<?= $this->session->flashdata('pesan'); ?>
								<table class="table table-hover table-borderless border-v datatables" id="dataTable-1">
									<thead class="thead-dark">
										<tr class="text-center">
											<th>No</th>
											<th>Kode Penyakit</th>
											<th>Nama Penyakit</th>
											<th>Solusi</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($tbl_penyakit as $penyakit) : ?>
											<tr>
												<td class="text-center"><?= $i; ?></td>
												<td class="text-center"><?= $penyakit['kode_penyakit']; ?></td>
												<td class="text-center"><?= $penyakit['nama_penyakit']; ?></td>
												<td><?= $penyakit['solusi']; ?></td>
												<td class="text-center">
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text-muted sr-only">Aksi</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<button class="dropdown-item" class="btn btn-primary" data-toggle="modal" data-target="#ubahPenyakit<?= $penyakit['id_penyakit']; ?>">
															<i class="fe fe-edit"></i> Ubah
														</button>
														<a class="dropdown-item" href="<?= base_url('penyakit/hapus/') . $penyakit['id_penyakit']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
															<i class="fe fe-trash-2"></i> Hapus
														</a>
													</div>
												</td>
											</tr>
											<?php $i++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
