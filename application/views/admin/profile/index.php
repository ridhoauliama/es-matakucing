<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h3 class="page-title">Profil Admin</h3>
				<div class="col-md-12 mb-4">
					<div class="card profile shadow">
						<div class="card-body my-4">
							<?= $this->session->flashdata('pesan') ?>
							<div class="row align-items-center">
								<div class="col-md-3 text-center mb-5">
									<a class="avatar avatar-xl">
										<img class="avatar-img rounded-circle" src="<?= base_url('assets/img/') . $user['image']; ?>" alt="Avatar" title="<?= $user['image']; ?>">
									</a>
								</div>
								<div class="col">
									<div class="row align-items-center">
										<div class="col-md-12">
											<h4 class="mb-1"><?= $user['nama_user'] ?></h4>
											<p class="small mb-3 mr-auto">
												<span class="badge badge-dark"><i class="fe fe-award"></i> Administrator</span>
											</p>
										</div>
									</div>
									<div class="row align-items-center">
										<div class="col-md-12">
											<strong>About me :</strong>
											<p class="text"> Nama : Sahira Nasution <br> NIRM : 2018020015 </p>
										</div>
									</div>
									<div class="row align-items-center">
										<div class="col mr-auto">
											<button class="btn btn-primary" data-toggle="modal" data-target="#ubahProfile<?= $user['id_user']; ?>">
												<i class="fe fe-settings fe-16"></i> Pengaturan Akun
											</button>
											<a href="" data-toggle="modal" data-target="#ubahPassword" class="btn btn-warning">
												<i class="fe fe-shield fe-16"></i> Keamanan Akun
											</a>
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
</main>
