<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-0">
					<div class="col">
						<?= $this->session->flashdata('pesan'); ?>
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
				<div class="card shadow mb-2">
					<div class="card-header">
						<h3 class="page-title text-center mb-0 mt-2">
							Sistem Pakar - Diagnosa Penyakit Nyeri Mata Pada Kucing Menggunakan Kombinasi Metode Teorema Bayes dan Certainty Factor
						</h3>
					</div>
					<div class="card-body">
						<h5 class="card-title mb-1">Dashboard Menu :</h5>
						<div class="row">
							<div class="col-md-6 col-sm-6 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-3 text-center">
												<a href="<?= base_url('gejala') ?>">
													<span class="circle circle-sm bg-primary-light">
														<i class="fe fe-16 fe-clipboard text-white mb-0"></i>
													</span>
												</a>
											</div>
											<div class="col pr-0">
												<p class="small mb-0">Total Data Gejala :</p>
												<span class="mb-0">
													<strong> <?= $totalGejala . ' Data Gejala' ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-3 text-center">
												<a href="<?= base_url('penyakit') ?>">
													<span class="circle circle-sm bg-primary-light">
														<i class="fe fe-16 fe-activity text-white mb-0"></i>
													</span>
												</a>
											</div>
											<div class="col pr-0">
												<p class="small text-muted mb-0">Total Data Penyakit :</p>
												<span class="mb-0">
													<strong> <?= $totalPenyakit . ' Data Penyakit' ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-3 text-center">
												<a href="<?= base_url('pengetahuan') ?>">
													<span class="circle circle-sm bg-primary-light">
														<i class="fe fe-16 fe-box text-white mb-0"></i>
													</span>
												</a>
											</div>
											<div class="col pr-0">
												<p class="small text-muted mb-0">Total Basis Aturan :</p>
												<span class="mb-0">
													<strong> <?= $totalPengetahuan . ' Basis Aturan' ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-3 text-center">
												<a href="<?= base_url('laporan') ?>">
													<span class="circle circle-sm bg-primary-light">
														<i class="fe fe-16 fe-layers text-white mb-0"></i>
													</span>
												</a>
											</div>
											<div class="col pr-0">
												<p class="small text-muted mb-0">Riwayat Konsultasi:</p>
												<span class="mb-0">
													<strong> <?= $totalLaporan . ' Riwayat Konsultasi' ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 mb-4">
								<h5 class="card-title mb-2">Pengumpulan Data dan Profil Pakar : </h5>
								<div class="card profile shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-md-12">
												<p class="text">
													<strong class="h5 ml-2">K</strong>egiatan wawancara dilakukan kepada pemilik dari Pet Shop Risjhona yang berada di Jln. Karya Wisata. Dalam observasi, peneliti melakukan pra-riset terlebih dahulu untuk mencari masalah yang terjadi dalam menentukan penyakit nyeri mata pada kucing. Kemudian dari masalah tersebut akan dirumuskan dalam sistem ini sehingga menemukan rumusan apa saja yang perlu di persiapkan untuk menyelesaikan masalah tersebut.
												</p>
											</div>
											<div class="col-md-12 text-center">
												<a class="avatar avatar-xl">
													<img class="avatar-img rounded-circle" src="<?= base_url('assets') ?>/home/assets/img/bg3.jpg" width="100%" alt="Avatar">
												</a>
												<h4 class="mb-1">(drh. Dara Keumala chan)</h4>
												<p class="small mb-3">
													<span class="badge badge-primary">
														<i class="fe fe-award"></i> Pemilik Pet Shop Risjhona
													</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
