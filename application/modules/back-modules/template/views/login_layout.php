<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:38 GMT -->

<head>

    <meta charset="utf-8" />
    <title><?= $page_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/themes/velzon/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/themes/velzon/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/themes/velzon/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/themes/velzon/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>assets/themes/velzon/css/custom.min.css" rel="stylesheet" type="text/css" />

    <script>
        //configuration
        var _controller = '<?= $this->router->fetch_class(); ?>';
        var _base_url = '<?= substr(base_url(), 0, strlen(base_url()) - 1); ?>';
    </script>
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->


        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <h1><?= $app_name->value ?></h1>
                                </a>
                            </div>
                            <p class="text-dark"><?= $app_description->value ?></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <?php $this->load->view("$module_directory/$view_file"); ?>

                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> <?= $app_name->value ?>. <?= $app_copyright->value ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/themes/velzon/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/js/plugins.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/jquery-3.6.0.min.js"></script>

    <!-- password-addon init -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/pages/password-addon.init.js"></script>
    <?php
    echo '
        <script src="' . base_url('application/modules/back-modules/template/js/js-module-configuration.js') . '"></script>
    ';
    foreach ($module_js as $item_js) {
        echo '
                <script src="' . base_url('application/modules/back-modules/' . $module_directory . '/js/' . $item_js . '.js') . '"></script>
            ';
    }
    ?>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:38 GMT -->

</html>