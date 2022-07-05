<header id="header" class="fixed-top">
	<div class="container-fluid d-flex">
		<div class="logo mr-auto mt-3">
			<h1 class="text-light">
				<a href="<?= base_url('home') ?>"><span> Sistem Pakar</span></a>
			</h1>
		</div>
		<nav class="nav-menu d-none d-lg-block mt-3">
			<ul>
				<li class="active"><a href="#header"><i class='bx bx-home'></i> Beranda</a></li>
				<li><a href="#faq"><i class="bx bx-cube-alt"></i> Penyakit dan Solusi</a></li>
				<li><a href="#team"><i class='bx bx-user-circle'></i> Profil Pakar</a></li>
				<li class="get-started"><a href="<?= base_url('auth') ?>">Admin</a></li>
			</ul>
		</nav>
	</div>
</header>
<section id="hero" class="d-flex align-items-center">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-12 order-2 order-md-1 mt-5 mb-0">
				<h1>Sistem Pakar</h1>
				<h2>Diagnosa Penyakit Infeksi Pada Mata Kucing Menggunakan Kombinasi Metode Teorema Bayes dan Certainty Factor</h2>
				<a href="<?= base_url('diagnosa') ?>" class="btn-get-started scrollto mt-0">Mulai Diagnosa</a>
			</div>
		</div>
	</div>
</section>

<main id="main">

	<section id="about" class="about">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
					<img src="<?= base_url('assets') ?>/home/assets/img/kucing2.jpg" class="img-fluid" alt="" data-aos="zoom-in">
				</div>
				<div class="col-lg-6 pt-5 pt-lg-0">
					<h3 data-aos="fade-up">Tentang Kucing</h3>
					<p data-aos="fade-up" data-aos-delay="30" class="text-justify">
						<strong class="ml-3">K</strong>ucing merupakan hewan yang sangat digemari oleh banyak orang, terutama dikalangan masyarakat. Kucing merupakan hewan yang rentan untuk terkena penyakit, ada banyak jenis gangguan yang terjadi mulai dari kulit, telinga dan mata. Penyebab kebutaan pada hewan peliharaan seperti kucing adalah gangguan pada mata salah satunya nyeri pada mata kucing. <br>
						<strong class="ml-3">G</strong>angguan tersebut disebabkan oleh virus, bakteri, debu dan lain sebagainya. Sehingga menyebabkan nyeri terhadap mata kucing. Mata pada kucing juga merupakan elemen vital karena melibatkan indera penglihatan dan juga menyangkut sensitivitas objek eksternal.
					</p>
					<div class="row text-center">
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="50">
							<a href=""></a><i class="bx bx-hive"></i>
							<h4>Jumlah Penyakit</h4>
							<p class="description"><?= $totalPenyakit . ' Data Penyakit' ?></p>
						</div>
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="40">
							<a href=""></a><i class="bx bx-dna"></i>
							<h4>Jumlah Gejala</h4>
							<p class="description"><?= $totalGejala . ' Data Gejala' ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="faq" class="faq section-bg">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<p>Penyakit dan Solusi</p>
			</div>
			<ul class="faq-list">
				<li data-aos="fade-up" data-aos-delay="30">
					<a data-toggle="collapse" class="" href="#faq1">P01 - Konjungtivis<i class="icofont-simple-up"></i></a>
					<div id="faq1" class="collapse show" data-parent=".faq-list">
						<p class="description">
							Jika disebabkan oleh bakteri maka aplikasi antibiotik pada kelopak mata sangat diwajibkan. Sedangkan jika karna alergi maka gunakan anti radang seperti hidrokortison.
						</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="40">
					<a data-toggle="collapse" href="#faq2" class="collapsed">P02 - Cacing Mata<i class="icofont-simple-up"></i></a>
					<div id="faq2" class="collapse" data-parent=".faq-list">
						<p class="description">
							Perlunya melakukan perawatan secara rutin sejak kucing menginjak usia tiga bulan. Sebagai langkah pencegahan pertama perlu memberikan obat cacing.
						</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="50">
					<a data-toggle="collapse" href="#faq3" class="collapsed">P03 - Felin Herpesvirus<i class="icofont-simple-up"></i></a>
					<div id="faq3" class="collapse" data-parent=".faq-list">
						<p class="description">
							Pencegahan penyakit ini dengan melakukan vaksinasi rutin.
						</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="60">
					<a data-toggle="collapse" href="#faq4" class="collapsed">P04 - Infeksi Mata<i class="icofont-simple-up"></i></a>
					<div id="faq4" class="collapse" data-parent=".faq-list">
						<p class="description">
							Infeksi mata pada kucing disebabkan oleh virus biasanya bisa sembuh dengan sendirinya atau menggunakan obat antivirus.
						</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="70">
					<a data-toggle="collapse" href="#faq5" class="collapsed">P05 - Glaukoma<i class="icofont-simple-up"></i></a>
					<div id="faq5" class="collapse" data-parent=".faq-list">
						<p class="description">
							Tidak ada cara untuk memulihkan kerusakan mata yang disebabkan oleh glaukoma. Deteksi dini adalah cara terbaik untuk menjaga penglihatan dan mencegah rasa sakit yang luar biasa.
						</p>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<section id="team" class="team">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<p>Profil Pakar</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-12" data-aos="zoom-in" data-aos-delay="30">
				</div>
				<div class="col-lg-4 col-md-12" data-aos="zoom-in" data-aos-delay="40">
					<div class="member">
						<img src="<?= base_url('assets') ?>/home/assets/img/bg3.jpg" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content text-center">
								<h4>(drh. Dara Keumala chan)</h4>
								<span>Pemilik Pet Shop Risjhona</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12" data-aos="zoom-in" data-aos-delay="50">
				</div>
			</div>
		</div>
	</section>
</main>
