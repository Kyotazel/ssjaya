<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:41 GMT -->

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

    <!--datatable css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/themes/velzon/libs/DataTables/datatables.min.css" type="text/css" />

    <!-- Sweet Alert css-->
    <link href="<?= base_url() ?>assets/themes/velzon/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <script>
        //configuration
        var _controller = '<?= $this->router->fetch_class(); ?>';
        var _base_url = '<?= substr(base_url(), 0, strlen(base_url()) - 1); ?>';
        var _token_user = '<?= urlencode($this->encryption->encrypt($this->session->userdata('us_token_login'))) ?>'
    </script>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <!-- item-->
                                    
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/themes/velzon/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $this->session->userdata('us_name') ?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?= $this->session->userdata('us_credetial_name') ?></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?= $this->session->userdata('us_name') ?></h6>
                                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profil</span></a>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-soft-success text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="<?= Modules::run('helper/create_url', 'login/logout') ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22"> 
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/themes/velzon/images/logo-sm.png" alt="" height="22"> <span class="text-light text-uppercase" style="font-size: 18px; margin-left: 12px; font-weight: bold"> <?= $app_name->value ?></span>
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <?= $html_main_menu ?>
                    </ul>
                </div>
                </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"><?= $page_title ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active"><?= $page_title ?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                    <?php $this->load->view("$module_directory/$view_file"); ?>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © <?= $app_name->value ?>.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            <?= $app_copyright->value ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/themes/velzon/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>assets/themes/velzon/js/plugins.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/jquery-3.6.0.min.js"></script>

    <!--datatable js-->
    <script src="<?= base_url() ?>assets/themes/velzon/libs/DataTables/datatables.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?= base_url() ?>assets/themes/velzon/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?= base_url() ?>assets/themes/velzon/js/pages/sweetalerts.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/app.js"></script>
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


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:41 GMT -->

</html>