<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="<?= base_url('assets') ?>/assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title><?= $judul_halaman ?></title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/assets/img/favicon/favicon.ico" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/vendor/fonts/boxicons.css" />
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/vendor/css/core.css"
		class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/vendor/css/theme-default.css"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/demo.css" />
	<link rel="stylesheet"
		href="<?= base_url('assets') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/vendor/libs/apex-charts/apex-charts.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<script src="<?= base_url('assets') ?>/assets/vendor/js/helpers.js"></script>
	<script src="<?= base_url('assets') ?>/assets/js/config.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<div class="app-brand demo">
					<span
						class="app-brand-text demo menu-text fw-bolder ms-2"><?= $this->session->userdata('nama_usaha')?></span>
					<a href="javascript:void(0);"
						class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
						<i class="bx bx-chevron-left bx-sm align-middle"></i>
					</a>
				</div>
				<div class="menu-inner-shadow"></div>
				<?php $menu = $this->uri->segment(1); ?>
				<ul class="menu-inner py-1">
					<!-- Dashboard -->
					<li class="menu-item <?php if($menu=='home'){echo "active"; } ?>">
						<a href="<?= base_url('home') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-home-circle"></i>
							<div data-i18n="Analytics">Dashboard</div>
						</a>
					</li>

					<!-- Pembelian -->
					<li class="menu-item <?php if($menu=='pembelian'){echo "active"; } ?>">
						<a href="<?= base_url('pembelian') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-log-in"></i>
							<div data-i18n="Analytics">Pembelian</div>
						</a>
					</li>

					<!-- Penjualan -->
					<li class="menu-item <?php if($menu=='penjualan'){echo "active"; } ?>">
						<a href="<?= base_url('penjualan') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-log-out"></i>
							<div data-i18n="Analytics">Penjualan</div>
						</a>
					</li>

					<!-- Supplier -->
					<li class="menu-item <?php if($menu=='supplier'){echo "active"; } ?>">
						<a href="<?= base_url('supplier') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-user"></i>
							<div data-i18n="Analytics">Supplier</div>
						</a>
					</li>

					<!-- Barang -->
					<li class="menu-item <?php if($menu=='barang'){echo "active"; } ?>">
						<a href="<?= base_url('barang') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-package"></i>
							<div data-i18n="Analytics">Barang</div>
						</a>
					</li>

					<!-- Konfigurasi -->
					<li class="menu-item <?php if($menu=='konfigurasi'){echo "active"; } ?>">
						<a href="<?= base_url('konfigurasi/hal_edit') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-wrench"></i>
							<div data-i18n="Analytics">Konfigurasi</div>
						</a>
					</li>

				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->

				<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="bx bx-menu bx-sm"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<!-- Search -->
						<div class="navbar-nav align-items-center">
							<div class="nav-item d-flex align-items-center">
								Aplikasi Kasir
							</div>
						</div>
						<!-- /Search -->
						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<!-- Place this tag where you want the button to render. -->
							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown">
								<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
									data-bs-toggle="dropdown">
									<div class="avatar avatar-online">
										<img src="https://i.pinimg.com/564x/2e/60/80/2e60808c2b288e393128ebed7ee988b6.jpg"
											alt class="w-px-40 h-auto rounded-circle" />
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="#">
											<div class="d-flex">
												<div class="flex-shrink-0 me-3">
													<div class="avatar avatar-online">
														<img src="<?= base_url('assets') ?>/assets/img/avatars/1.png"
															alt class="w-px-40 h-auto rounded-circle" />
													</div>
												</div>
												<div class="flex-grow-1">
													<span
														class="fw-semibold d-block"><?= $this->session->userdata('nama_usaha') ?></span>
													<small
														class="text-muted"><?= $this->session->userdata('username') ?></small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									</li>
									<li>
										<a class="dropdown-item" href="<?= base_url('konfigurasi/logout') ?>">
											<i class="bx bx-power-off me-2"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
								</ul>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>
				<!-- / Navbar -->
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<div class="container-fluid flex-grow-1 container-p-y">
						<?php echo $contents ;?>
					</div>
					<footer class="content-footer footer bg-footer-theme">
						<div
							class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
							<div class="mb-2 mb-md-0">
								, made with ❤️
							</div>
						</div>
					</footer>
					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>
		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->
	<script src="<?= base_url('assets') ?>/assets/vendor/libs/jquery/jquery.js"></script>
	<script src="<?= base_url('assets') ?>/assets/vendor/libs/popper/popper.js"></script>
	<script src="<?= base_url('assets') ?>/assets/vendor/js/bootstrap.js"></script>
	<script src="<?= base_url('assets') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?= base_url('assets') ?>/assets/vendor/js/menu.js"></script>
	<script src="<?= base_url('assets') ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>
	<script src="<?= base_url('assets') ?>/assets/js/main.js"></script>
	<script src="<?= base_url('assets') ?>/assets/js/dashboards-analytics.js"></script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script>
		// Fungsi untuk menyembunyikan alert setelah beberapa detik
		function hideAlert() {
			var alertElement = document.getElementById('myAlert');
			alertElement.style.display = 'none';
		}

		// Menunjukkan alert
		var alertElement = document.getElementById('myAlert');
		alertElement.style.display = 'block';
		// Menyembunyikan alert setelah 3 detik
		setTimeout(hideAlert, 3000); // 3000 milidetik = 3 detik
	</script>
	<script>
		new DataTable('#example');
	</script>
</body>

</html>