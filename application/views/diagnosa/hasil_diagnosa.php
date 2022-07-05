<?php
$hasil = $this->DM->get_per_pasien($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url('assets'); ?>/img/favicon.ico">
	<title><?= $judul; ?> </title>
	<link href="<?= base_url('assets'); ?>/vendors/light/css/simplebar.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/feather.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/select2.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/dropzone.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/uppy.min.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/jquery.steps.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/jquery.timepicker.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/quill.snow.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/daterangepicker.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/app-light.css" rel="stylesheet" id="lightTheme">
	<link href="<?= base_url('assets'); ?>/vendors/light/css/app-dark.css" rel="stylesheet" id="darkTheme" disabled>
</head>

<body>
	<div class="wrapper">
		<main role="main" class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-8">
						<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
							<div class="container-fluid">
								<h1 class="mt-5 text-center">Hasil Diagnosa</h1>
							</div>
						</nav>
						<form action="<?= base_url('diagnosa/proses'); ?>" method="POST">
							<div class="card shadow mb-4">
								<div class="card-body">
									<h5 class="card-title text-center mb-5">ID Diagnosa : <?= str_pad($id, 6, '0', STR_PAD_LEFT) ?></h5>
									<strong class="card-title">Tanggal Diagnosa :</strong>
									<p class="mb-2"><?= $hasil['waktu'] = date('d-m-Y') ?></p>
									<strong class="card-title">Nama Lengkap :</strong>
									<p class="mb-2"><?= $hasil['nama'] ?></p>
									<strong class="card-title">Alamat :</strong>
									<p class="mb-2"><?= $hasil['alamat'] ?></p>
									<h5 class="card-title text-center">Jawaban yang dipilih berdasarkan masing-masing gejala</h5>
									<strong class="card-title ml-2">Gejala</strong>
									<strong class="float-right mr-2">Jawaban Anda</strong>
									<ul class="list-group mt-2 mb-4">
										<?php
										$jGejala = strlen($hasil['nilai_gejala']) / 3;
										$start = 0;
										?>
										<?php for ($i = 1; $i <= $jGejala; $i++) { ?>
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
											<li class="list-group-item">
												<?= ${'g' . $i} ?> - <?= $g['nama_gejala'] ?> <b class="float-right">(<?= $pilihan ?>)</b>
											</li>
											<?php
											$start = $start + 3;
											?>
										<?php } ?>
									</ul>
									<strong class="card-title mt-3">Hasil Diagnosa :</strong>
									<p class="mb-1">
										Berdasarkan pilihan jawaban Anda, maka dapat disimpulkan kemungkinan besar kucing Anda mengalami <strong>Penyakit - <?= $hasil['nama_penyakit'] ?> (<?= $hasil['kode_penyakit'] ?>)</strong>, <br> Dengan persentase nilai keyakinan sebesar <strong><?= ($hasil['nilaicf'] * 100) ?> %</strong>
									</p>
									<strong class="card-title">Solusi : </strong>
									<p class="mb-1">
										<?= str_replace('- ', '</br>', $hasil['solusi']) ?>
									</p>
								</div>
								<div class="card-footer mt-0">
									<div class="row">
										<div class="col">
											<a href="<?= base_url('diagnosa') ?>" class="btn btn-outline-primary mt-2">
												<i class="fe fe-refresh-ccw"></i> Diagnosa Ulang
											</a>
										</div>
										<div class="col-auto">
											<a target="_blank" href="<?= base_url('diagnosa/printhasil?id=' . $this->session->userdata('id_periksa')) ?>" class="btn btn-primary mt-2">
												<i class="fe fe-download"></i> Hasil Diagnosa (.pdf)
											</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>

	<script src="<?= base_url('assets') ?>/vendors/light/js/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/popper.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/moment.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/simplebar.min.js"></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/daterangepicker.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.stickOnScroll.js'></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/tinycolor-min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/config.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/d3.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/topojson.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps.all.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps-zoomto.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/datamaps.custom.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/Chart.min.js"></script>
	<script>
		/* defind global options */
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/gauge.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/jquery.sparkline.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apexcharts.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apexcharts.custom.js"></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.mask.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/select2.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.steps.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.validate.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/jquery.timepicker.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/dropzone.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/uppy.min.js'></script>
	<script src='<?= base_url('assets') ?>/vendors/light/js/quill.min.js'></script>
	<script>
		$('.select2').select2({
			theme: 'bootstrap4',
		});
		$('.select2-multi').select2({
			multiple: true,
			theme: 'bootstrap4',
		});
		$('.drgpicker').daterangepicker({
			singleDatePicker: true,
			timePicker: false,
			showDropdowns: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		$('.time-input').timepicker({
			'scrollDefault': 'now',
			'zindex': '9999' /* fix modal open */
		});
		if ($('.datetimes').length) {
			$('.datetimes').daterangepicker({
				timePicker: true,
				startDate: moment().startOf('hour'),
				endDate: moment().startOf('hour').add(32, 'hour'),
				locale: {
					format: 'M/DD hh:mm A'
				}
			});
		}
		var start = moment().subtract(29, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);
		cb(start, end);
		$('.input-placeholder').mask("00/00/0000", {
			placeholder: "__/__/____"
		});
		$('.input-zip').mask('00000-000', {
			placeholder: "____-___"
		});
		$('.input-money').mask("#.##0,00", {
			reverse: true
		});
		$('.input-phoneus').mask('(000) 000-0000');
		$('.input-mixed').mask('AAA 000-S0S');
		$('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
			translation: {
				'Z': {
					pattern: /[0-9]/,
					optional: true
				}
			},
			placeholder: "___.___.___.___"
		});
		// editor
		var editor = document.getElementById('editor');
		if (editor) {
			var toolbarOptions = [
				[{
					'font': []
				}],
				[{
					'header': [1, 2, 3, 4, 5, 6, false]
				}],
				['bold', 'italic', 'underline', 'strike'],
				['blockquote', 'code-block'],
				[{
						'header': 1
					},
					{
						'header': 2
					}
				],
				[{
						'list': 'ordered'
					},
					{
						'list': 'bullet'
					}
				],
				[{
						'script': 'sub'
					},
					{
						'script': 'super'
					}
				],
				[{
						'indent': '-1'
					},
					{
						'indent': '+1'
					}
				], // outdent/indent
				[{
					'direction': 'rtl'
				}], // text direction
				[{
						'color': []
					},
					{
						'background': []
					}
				], // dropdown with defaults from theme
				[{
					'align': []
				}],
				['clean'] // remove formatting button
			];
			var quill = new Quill(editor, {
				modules: {
					toolbar: toolbarOptions
				},
				theme: 'snow'
			});
		}
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				var forms = document.getElementsByClassName('needs-validation');
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	<script>
		var uptarg = document.getElementById('drag-drop-area');
		if (uptarg) {
			var uppy = Uppy.Core().use(Uppy.Dashboard, {
				inline: true,
				target: uptarg,
				proudlyDisplayPoweredByUppy: false,
				theme: 'dark',
				width: 770,
				height: 210,
				plugins: ['Webcam']
			}).use(Uppy.Tus, {
				endpoint: 'https://master.tus.io/files/'
			});
			uppy.on('complete', (result) => {
				console.log('Upload complete! We’ve uploaded these files:', result.successful)
			});
		}
	</script>
	<script src="<?= base_url('assets') ?>/vendors/light/js/apps.js"></script>

</body>

</html>
