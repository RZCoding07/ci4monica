<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>MONICA</title>
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
    <link class="main-css" href="<?= base_url() ?>css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
</head>

<body>
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
                                <form hx-post="/login">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label class="mb-1 form-label">Monica Type</label>
                                        <select name="monica_type" class="form-control" aria-label="Default select example">
                                            <option value="offfarm">Off Farm</option>
                                            <option value="onfarm">On Farm</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1 form-label">Username</label>
                                        <input name="username" type="text" class="form-control" value="" placeholder="Username">
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
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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

</body>

</html>