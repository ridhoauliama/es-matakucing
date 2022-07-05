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
								<a class="btn btn-primary mb-2" href="<?= base_url('laporan/cetakLaporan') ?>" target="_blank">
									<i class="fe fe-printer fe-16"></i> Cetak Laporan
								</a>
								<a class="btn btn-danger mb-2" href="<?= base_url('laporan/hapusLaporan') ?>" onclick="return confirm('Seluruh data laporan akan dihapus. Apakah anda yakin?');">
									<i class="fe fe-trash-2 fe-16"></i> Hapus Laporan
								</a>
								<?= $this->session->userdata('pesan'); ?>
								<table class="table table-hover table-borderless border-v datatables" id="dataTable-1">
									<thead class="thead-dark">
										<tr class="text-center">
											<th>No</th>
											<th>Tanggal Diagnosa</th>
											<th>Nama Pengguna</th>
											<th>Alamat</th>
											<th>Gejala yang Dialami</th>
											<th>Hasil Diagnosa Penyakit</th>
											<th>Persentase Keyakinan</th>
										</tr>
									</thead>
									<tbody>
										<?php $x = 1; ?>
										<?php foreach ($laporan as $l) : ?>
											<tr class="text-center">
												<td><?= $x; ?></td>
												<td><?= date('d-m-Y', strtotime($l['waktu'])); ?></td>
												<td><?= $l['nama']; ?></td>
												<td><?= $l['alamat']; ?></td>
												<td style="text-align: left">
													<?php
													$hasil = $this->ML->get_per_pasien($l);
													$jGejala = strlen($hasil['kode_gejala']) / 3;
													$start = 0;
													for ($i = 1; $i <= $jGejala; $i++) {
													?>
														<?php
														${'g' . $i} = substr($hasil['kode_gejala'], $start, 3);
														${'c' . $i} = substr($hasil['nilai_gejala'], $start, 3);
														if (${'c' . $i} == 1.0) {
															$pilihan = 'Ya';
														}
														if (${'c' . $i} == 0.0) {
															$pilihan = 'Tidak';
														}
														$g = $this->db->get_where('tbl_gejala', ['kode_gejala' => ${'g' . $i}])->row_array();
														?>
														<?= ${'g' . $i} ?> - <?= $g['nama_gejala'] ?> <b>(<?= $pilihan ?>)</b>;</br>
														<?php
														$start = $start + 3;
														?>
													<?php } ?>
												</td>
												<td><?= $l['nama_penyakit']; ?></td>
												<td><?= ($l['nilaicf'] * 100); ?>%</td>
											</tr>
											<?php $x++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
