<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>MONICA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="indiancoder">
    <meta name="robots" content="index, follow">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>images/favicon.png">
    <link href="<?= base_url() ?>vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="<?= base_url() ?>css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>


    <script>
			function showLoading(b) {
				if (b) {
					$('#loading-keren').show();
				} else {
					$('#loading-keren').hide();
				}
			}
    </script>

<body>
<?= view('components/loading') ?>

    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center d-none d-sm-flex flex-column flex-row-auto">

            <div class="aside-image" style="background-image:url(images/pic1.svg);"></div>
        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">

                                <center>
                                    <img src="/ptpn4.png" alt="" width="120">
                                </center>
                                <br>
                                <br>
                                <h3 class="text-center">Monitoring Pekerjaan Lapangan <br>
                                    Capital Expenditure PKS PTPN IV
                                </h3>
                                <h4 class="text-center mb-4">Sign in your account</h4>
                                <form 
                                hx-post="/login"
                                hx-swap="none"
                                hx-on--before-request="showLoading(true)"
                                hx-on::after-request="showLoading(false)"
                                >
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label class="mb-1 form-label">Monica Type</label>
                                        <select name="req" class="form-control" aria-label="Default select example">
                                            <option value="offfarm">Off Farm</option>
                                            <option value="onfarm">On Farm</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1 form-label">Username</label>
                                        <input name="login" type="text" class="form-control" value="" placeholder="Username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1 form-label">Password</label>
                                        <div class="position-relative">
                                            <input name="password" type="password" id="ic-password" class="form-control" placeholder="Password">
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="mb-3">
                                            <div class="form-check custom-checkbox ms-1">
                                                <label class="form-check-label" for="basic_checkbox_1"></label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-primary text-white btn-block">Sign me in</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url() ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>js/custom.min.js"></script>
    <script src="<?= base_url() ?>js/ic-sidenav-init.js"></script>
    <script src="<?= base_url() ?>js/demo.js"></script>
    <script src="<?= base_url() ?>js/styleSwitcher.js"></script>
    <?= view('components/notify') ?>
</body>

</html>