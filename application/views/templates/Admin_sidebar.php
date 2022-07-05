<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
	<a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
		<i class="fe fe-x"><span class="sr-only"></span></i>
	</a>
	<nav class="vertnav navbar navbar-light">
		<div class="w-100 mb-4 d-flex">
			<ul class="navbar-nav flex-fill w-100">
				<li class="nav-item w-100 text-center">
					<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= base_url('admin/profile') ?>">
						<img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="Logo" width="50%">
					</a>
				</li>
				<p class="nav-item w-100 mb-0 mt-2 text-center"><?= $user['nama_user'] ?></p>
			</ul>
		</div>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100">
				<a class="nav-link active" href="<?= base_url('admin') ?>">
					<i class="fe fe-home fe-16"></i>
					<span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
				</a>
			</li>
		</ul>
		<p class="text-muted nav-heading mb-1">
			<span>Menu</span>
		</p>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100">
				<a class="nav-link" href="<?= base_url('gejala') ?>">
					<i class="fe fe-clipboard fe-16"></i>
					<span class="ml-3 item-text">Data Gejala</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="<?= base_url('penyakit') ?>">
					<i class="fe fe-activity fe-16"></i>
					<span class="ml-3 item-text">Data Penyakit</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="<?= base_url('pengetahuan') ?>">
					<i class="fe fe-box fe-16"></i>
					<span class="ml-3 item-text">Basis Aturan</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="<?= base_url('laporan') ?>">
					<i class="fe fe-layers fe-16"></i>
					<span class="ml-3 item-text">Riwayat Konsultasi</span>
				</a>
			</li>
		</ul>
		<p class="text-muted nav-heading mb-1">
			<span>Administrator</span>
		</p>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item dropdown">
				<a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
					<i class="fe fe-user fe-16"></i>
					<span class="ml-3 item-text">Profile Admin</span>
				</a>
				<ul class="collapse list-unstyled pl-4 w-100" id="profile">
					<a class="nav-link pl-3" href="<?= base_url('admin/profile'); ?>">
						<i class="fe fe-eye fe-16"></i>
						<span class=" ml-1">Lihat Profil</span>
					</a>
				</ul>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="<?= base_url('auth/logout') ?>" onclick=" return confirm('Anda yakin ingin keluar?')">
					<i class="fe fe-log-out fe-16"></i>
					<span class="ml-3 item-text">Keluar</span>
				</a>
			</li>
		</ul>
	</nav>
</aside>
