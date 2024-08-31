<!DOCTYPE html>
<html lang="en">

<head>
	<!-- PAGE TITLE HERE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="indiancoder">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="	admin, admin dashboard, admin template, analytics, bootstrap, bootstrap5, bootstrap 5 admin template, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, Codebyte SaaS, User Interface (UI), User Experience (UX), Dashboard Design, SaaS Application, Web Application, Data Visualization, Analytics, Customization, Responsive Design, Bootstrap Framework, Charts and Graphs, Data Management, Reporting, Dark Mode, Mobile-Friendly, Dashboard Components, Integrations, Analytics Dashboard, API Integration, User Authentication">
	<meta name="description" content="Elevate your administrative efficiency and enhance productivity with the Codebyte SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">

	<meta property="og:title" content="Codebyte : Codebyte Saas Admin Bootstrap 5 Template | Indiancoder">
	<meta property="og:description" content="Elevate your administrative efficiency and enhance productivity with the Codebyte SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
	<meta property="og:image" content="https://codebyte.indiancoder.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="Codebyte : Codebyte Saas Admin Bootstrap 5 Template | Indiancoder">
	<meta name="twitter:description" content="Elevate your administrative efficiency and enhance productivity with the Codebyte SaaS Admin Dashboard Template. Designed to streamline your tasks, this powerful tool provides a user-friendly interface, robust features, and customizable options, making it the ideal choice for managing your data and operations with ease.">
	<meta name="twitter:image" content="https://codebyte.indiancoder.com/xhtml/social-image.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>images/favicon.png">
	<link href="<?= base_url() ?>vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

	<!-- Datatable -->
	<link href="<?= base_url() ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>vendor/datatables/responsive/responsive.css" rel="stylesheet">
	<link href="<?= base_url() ?>vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
	<!-- Custom Stylesheet -->
	<link href="<?= base_url() ?>vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
	<!-- Style css -->
	<link href="<?= base_url() ?>css/style.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://unpkg.com/htmx.org@2.0.2"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.min.js"></script>
	<style>
		body.offcanvas-open {
			overflow-y: hidden !important;
		}

		/*Offcanvas Full-Screen*/
		.offcanvas-full-screen {
			position: fixed;
			z-index: 10;
			transition: -webkit-transform 0.3s ease-in-out;
			transition: transform 0.3s ease-in-out;
			transition: transform 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			background: transparent;
			backdrop-filter: blur(10px);
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			-webkit-transform: translateX(100%);
			-ms-transform: translateX(100%);
			transform: translateX(100%);
			overflow-y: auto;
		}

		.offcanvas-full-screen:has(span.offcanvas-bg-white) {
			background-color: #fff !important;
		}

		[data-whatinput="mouse"] .offcanvas-full-screen {
			outline: 0;
		}

		.offcanvas-full-screen.is-transition-overlap {
			z-index: 10;
		}

		.offcanvas-full-screen.is-transition-overlap.is-open {
			box-shadow: 0 0 10px rgba(10, 10, 10, 0.7);
		}

		.offcanvas-full-screen.is-open {
			-webkit-transform: translate(0, 0);
			-ms-transform: translate(0, 0);
			transform: translate(0, 0);
		}

		.offcanvas-full-screen.is-open~.off-canvas-content {
			-webkit-transform: translateX(-100%);
			-ms-transform: translateX(-100%);
			transform: translateX(-100%);
		}

		.offcanvas-full-screen.is-transition-push::after {
			position: absolute;
			top: 0;
			right: 0;
			height: 100%;
			width: 1px;
			box-shadow: 0 0 10px rgba(10, 10, 10, 0.7);
			content: " ";
		}

		.offcanvas-full-screen.is-transition-overlap.is-open~.off-canvas-content {
			-webkit-transform: none;
			-ms-transform: none;
			transform: none;
		}

		.offcanvas-full-screen-inner {
			padding: 1rem;
			text-align: center;
		}

		.offcanvas-full-screen-menu {
			margin: 0;
			list-style-type: none;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-flex-wrap: nowrap;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap;
			-webkit-align-items: center;
			-ms-flex-align: center;
			align-items: center;
			width: 100%;
			-webkit-flex-wrap: wrap;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
		}
	</style>
</head>

<!-- <body oncontextmenu="return false;" oncopy="return false;"> -->

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="loading-area" class="loading-page-3">
		<div class="loading-inner">
			<div class="load-text">
				<span data-text="M" class="text-load text-primary">M</span>
				<span data-text="O" class="text-load text-primary">O</span>
				<span data-text="N" class="text-load">N</span>
				<span data-text="I" class="text-load">I</span>
				<span data-text="C" class="text-load">C</span>
				<span data-text="A" class="text-load">A</span>


			</div>
		</div>
	</div>

	<!-- Offcanvas Full-Screen -->
	<div id="offcanvas_full_screen" class="offcanvas-full-screen" data-transition="overlap">
		<div class="offcanvas-full-screen-inner">
			<div id="offcanvas_header" class="offcanvas-header">
				<div class="d-flex w-100 justify-content-between">
					<div id="offcanvas_title" class="offcanvas-title">
						<h3 class="h4">Offcanvas Title</h3>
					</div>
					<div id="offcanvas_close">
						<button class="btn btn-close fs-4 m-2" onclick="offCanvasClose()" type="button">
						</button>
					</div>
				</div>
			</div>
			<div id="offcanvas_body" class="offcanvas-body">
				Offcanvas Body
			</div>
		</div>
	</div>

	<div id="main-wrapper">
		<div class="nav-header">
			<a href="index.html" class="brand-logo">
				<div>
					<div>
						<img class="brand-title" src="images/logo-full.png" alt="" width="90%">
					</div>
				</div>
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>

		<div class="header border-bottom">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar text-uppercase">

								Monitoring Pekerjaan Lapangan Capital Expenditure PKS PTPN IV
							</div>
						</div>
						<ul class="navbar-nav header-right">

							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-search-interface-symbol"></i></a></span>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link bell ic-theme-mode p-0" href="javascript:void(0);">
									<i id="icon-light" class="fas fa-sun"></i>
									<i id="icon-dark" class="fas fa-moon"></i>
								</a>
							</li>



							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="images/user.jpg" width="20" alt="">
									<div class="header-info ms-3">
										<span class="fs-18 font-w500 mb-0">Franklin Jr.</span>
										<small class="fs-12 font-w400">demo@mail.com</small>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="app-profile.html" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="email-inbox.html" class="dropdown-item ai-icon">
										<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span class="ms-2">Inbox </span>
									</a>
									<a href="page-login.html" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<div class="ic-sidenav">
			<div class="ic-sidenav-scroll">
				<ul class="metismenu" id="menu">
					<li class="menu-title border-top-0 pt-2">Main Menu</li>
					<li><a href="#" class="ai-icon" aria-expanded="false" hx-get="<?= session()->get('monica_type') ?>/dashboard" hx-target="#konten" hx-replace-url="<?= session()->get('monica_type') ?>/dashboard">
							<i class="flaticon-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>

					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/users" hx-target="#konten" hx-replace-url="/users">
							<i class="flaticon-user"></i>
							<span class="nav-text">Users</span>
						</a>
					</li>
					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/pks" hx-target="#konten" hx-replace-url="/pks">
							<i class="flaticon-user"></i>
							<span class="nav-text">PKS</span>
						</a>
					</li>
					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/kebun" hx-target="#konten" hx-replace-url="/kebun">
							<i class="flaticon-user"></i>
							<span class="nav-text">Kebun</span>
						</a>
					</li>

					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/regional" hx-target="#konten" hx-replace-url="/regional">
							<i class="flaticon-user"></i>
							<span class="nav-text">Regional</span>
						</a>
					</li>

					<li>
						<a href="#" class="ai-icon" aria-expanded="false" hx-post="/stokbibit" hx-target="#konten" hx-replace-url="/stokbibit">
							<i class="flaticon-user"></i>
							<span class="nav-text">Stok Bibit</span>
						</a>
					</li>
					<li>
						<a href="#" class="ai-icon" aria-expanded="false" hx-post="/stokbibit/dashboard_data" hx-target="#konten" hx-replace-url="/stokbibit/">
							<i class="flaticon-user"></i>
							<span class="nav-text">Dashboard Stok Bibit</span>
						</a>
					</li>

					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/awal" hx-target="#konten" hx-replace-url="/awal">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Investasi Awal
							</span>
						</a>
					</li>
					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/sumberips" hx-target="#konten" hx-replace-url="/sumberips">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Sumber Ips
							</span>
						</a>
					</li>

					<li><a href="#" class="ai-icon" aria-expanded="false" hx-post="/progresslapangan" hx-target="#konten" hx-replace-url="/progresslapangan">
							<i class="flaticon-blog"></i>
							<span class="nav-text">


								Progress Lap. Investasi

							</span>
						</a>
					</li>


					<li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Pengawasan Pekerjaan Lapangan
							</span>
						</a>
					</li>


					<li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Input Uraian Pekerjaan
							</span>
						</a>
					</li>


					<li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Update Progress
							</span>
						</a>
					</li>


					<li><a href="<?= base_url('a') ?>" class="ai-icon" aria-expanded="false">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Upload Dokumen
							</span>
						</a>
					</li>

					<li><a href="#" class="ai-icon" aria-expanded="false" hx-get="/dashboard" hx-target="#konten">
							<i class="flaticon-blog"></i>
							<span class="nav-text">
								Reset Password
							</span>
						</a>
					</li>

			</div>
		</div>

		<script src="<?= base_url() ?>vendor/global/global.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/buttons.html5.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/jszip.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/pdfmake.min.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/js/vfs_fonts.js"></script>
		<script src="<?= base_url() ?>vendor/datatables/responsive/responsive.js"></script>
		<script src="<?= base_url() ?>js/plugins-init/datatables.init.js"></script>
		<script src="<?= base_url() ?>vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="<?= base_url() ?>js/custom.min.js"></script>
		<script src="<?= base_url() ?>js/ic-sidenav-init.js"></script>
		<script src="<?= base_url() ?>js/demo.js"></script>
		<script src="<?= base_url() ?>js/styleSwitcher.js"></script>
		<script>
			$(document).ready(function() {
				//change dark mode
				if (getCookie('version') == 'dark') {
					var logo2 = 'images/logo-full-white.png';
					jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
				}
				if (getCookie('version') == 'light') {
					var logo2 = 'images/logo-full.png';
					jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
				}
				$('#icon-light').click(function() {
					$('#icon-light').hide();
					$('#icon-dark').show();
					$('body').addClass('dark');
					$('body').removeClass('light');
					setCookie('version', 'dark', 30);
					var logo2 = 'images/logo-full.png';
					jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
				});

				$('#icon-dark').click(function() {
					$('#icon-dark').hide();
					$('#icon-light').show();
					$('body').addClass('light');
					$('body').removeClass('dark');
					setCookie('version', 'light', 30);
					var logo2 = 'images/logo-full-white.png';
					jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
				});
			});

			function offCanvasOpen() {
				$('body').addClass('offcanvas-open');
				$('#offcanvas_full_screen').addClass('is-open');
			};

			function offCanvasClose() {
				$('#offcanvas_full_screen').removeClass('is-open');
				$('body').removeClass('offcanvas-open');
				setTimeout(function() {
					$('#offcanvas_full_screen').find('.offcanvas-body').html('');
				}, 500)
			}

			function offCanvas(title, body, callbackFn = false) {
				if (typeof title == 'function') {
					title = title($('#offcanvas_full_screen .offcanvas-header'));
				} else {
					$('#offcanvas_full_screen .offcanvas-header .offcanvas-title').html(title);
				}
				$('#offcanvas_full_screen .offcanvas-body').html(body);
				if (callbackFn) {
					callbackFn($('#offcanvas_full_screen .offcanvas-header .offcanvas-title'), $('#offcanvas_full_screen .offcanvas-body'));
				}
				offCanvasOpen();
				return $("#offcanvas_full_screen")
			};
		</script>

		<div class="content-body">
			<!-- row -->
			<div class="container-fluid" id="konten">
				<?= $content ?? null ?>
			</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Project title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row">
								<div class="col-xl-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Project Id</label>
										<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="#P-000441425">
									</div>
								</div>
								<div class="col-xl-12">
									<div class="mb-3">
										<label for="exampleFormControlInput2" class="form-label">Client Name</label>
										<input type="text" class="form-control" id="exampleFormControlInput2" placeholder="James Jr.">
									</div>
								</div>
							</div>
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Made by <a href="#" target="_blank">RZCoding</a> <span class="current-year">2024</span></p>
			</div>
		</div>

	</div>

</body>

</html>