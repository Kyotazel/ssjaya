<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:41 GMT -->

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SSJAYA - <?= $page_title ?></title>

    <link rel="stylesheet preload" as="style" href="<?= base_url() ?>assets/themes/landing/css/preload.min.css" />
    <link rel="stylesheet preload" as="style" href="<?= base_url() ?>assets/themes/landing/css/libs.min.css" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url() ?>assets/themes/landing/css/index.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/themes/landing/css/news2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/themes/admin/dist/css/icons/font-awesome/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/themes/landing/css/custom.css" />
    <script>
        //configuration
        var _controller = '<?= $this->router->fetch_class(); ?>';
        var _base_url = '<?= substr(base_url(), 0, strlen(base_url()) - 1); ?>';
        var _token_user = '<?= urlencode($this->encryption->encrypt($this->session->userdata('us_token_login'))) ?>'
    </script>
    <style>
    </style>
</head>

<body>
    <header class="header d-flex flex-wrap align-items-center" data-page="home" data-overlay="true" style="height: 100px;">
        <div class="container d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">
            <a class="brand header_logo d-flex align-items-center" href="index.html">
                <span class="logo">
                    <img src="<?= base_url() ?>assets/images/logo/favicon.png" alt="logo" style="width: max-content;">
                </span>
                <span class="accent">SS</span>
                <span>JAYA</span>
            </a>
            <nav class="header_nav">
                <ul class="header_nav-list">
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url() ?>">
                            Home
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url("about-us") ?>">
                            Tentang Kami
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url("list-mitra") ?>">
                            List Mitra Apotek
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url("product") ?>">
                            Produk
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url("consultation") ?>">
                            Konsultasi
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="<?= base_url("article") ?>">
                            Artikel
                        </a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-link d-inline-flex align-items-center" href="https://seller.ssjaya.com">
                            Mitra Seller
                        </a>
                    </li>
                </ul>
            </nav>
            <span class="header_trigger d-inline-flex d-xl-none flex-column justify-content-between">
                <span class="line line--short"></span>
                <span class="line line"></span>
                <span class="line line--short"></span>
                <span class="line line"></span>
            </span>
            <!-- <div class="header_user d-flex justify-content-end align-items-center">
                <a class="header_user-action d-inline-flex align-items-center justify-content-center" href="#">
                    <i class="icon-basket"></i>
                </a>
            </div> -->
        </div>
    </header>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content" style="min-height: 600px; margin-top: 100px">
        <?php $this->load->view("$module_directory/$view_file"); ?>
    </div>

    <footer class="footer">
        <div class="footer_main section" style="padding-bottom: 40px; padding-top: 40px;">
            <div class="container d-flex flex-column flex-md-row flex-wrap flex-xl-nowrap justify-content-xl-between">
                <div class="footer_main-about footer_main-block col-md-6 col-xl-auto">
                    <a class="brand footer_main-about_brand d-flex align-items-center" href="index.html">
                        <span class="logo">
                            <img src="<?= base_url() ?>assets/images/logo/favicon.png" alt="logo" style="width: max-content;">
                        </span>
                        <span class="accent">SS</span>
                        <span>JAYA</span>
                    </a>
                    <div class="footer_main-about_wrapper">
                        <b>Warehouse</b>
                        <p class="text">
                            Jalan. Sersan Suharmaji Gang 2, Kel. Manisrenggo Kec. Kota, Kota Kediri, Jawa Timur.
                        </p>
                        <b>Kantor Marketing</b>
                        <p class="text">
                            Perum Mutiara Jayabaya Blok C 17, Kec. Mojoroto, Kota Kediri, Jawa Timur.
                        </p>
                        <ul class="socials d-flex align-items-center accent">
                            <li class="list-item">
                                <a class="link" href="https://www.facebook.com/ssjayaherbal" target="_blank" rel="noopener norefferer">
                                    <i class="icon-facebook icon"></i>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="link" href="https://instagram.com/ssjayaherbal" target="_blank" rel="noopener norefferer">
                                    <i class="icon-instagram icon"></i>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="link" href="mailto:admin@ssjaya.com" target="_blank" rel="noopener norefferer">
                                    <i class="icon-mail icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer_main-nav footer_main-block col-md-6 col-xl-auto">
                    <h4 class="footer_main-nav_header footer_main-header">Selalu Terhubung</h4>
                    <ul class="footer_main-nav_list d-flex flex-wrap flex-md-column">
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282327271919">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 1 (Dea)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282327270808">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 2 (Cindy)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282379790404">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 3 (Dina)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282189894949">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 4 (Ayik)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282189896363">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 5 (Yuli)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6285298988080">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 6 (Anis)
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="link d-inline-flex align-items-center" href="https://wa.me/+6282189894848">
                                <i class="icon-whatsapp accent icon"></i>
                                CS 7 (Mirda)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer_main-contacts footer_main-block col-md-6 col-xl-auto">
                    <h4 class="footer_main-contacts_header footer_main-header">Hubungi Kami</h4>
                    <ul class="footer_main-contacts_list">
                        <li class="list-item d-flex align-items-center">
                            <span class="icon d-flex justify-content-center align-items-center">
                                <i class="icon-clock"></i>
                            </span>
                            <div class="wrapper d-flex flex-column">
                                <span>09.00 – 17.00 WIB</span>
                                <span>Senin - Jumat</span>
                            </div>
                        </li>
                        <li class="list-item d-flex align-items-center">
                            <span class="icon d-flex justify-content-center align-items-center">
                                <i class="icon-call"></i>
                            </span>
                            <div class="wrapper d-flex flex-column">
                                <a class="link" href="tel:+6282371719393"> +6282371719393</a>
                            </div>
                        </li>
                        <li class="list-item d-flex align-items-center">
                            <span class="icon d-flex justify-content-center align-items-center">
                                <i class="icon-mail"></i>
                            </span>
                            <div class="wrapper d-flex flex-column">
                                <a class="link" href="mailto:admin@ssjaya.com">admin@ssjaya.com</a>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="footer_main-instagram footer_main-block col-md-6 col-xl-auto">
                    <h4 class="footer_main-instagram_header footer_main-header">Sertifikasi</h4>
                    <ul class="footer_main-instagram_list d-grid" style="grid-template-rows: repeat(3,0fr);">
                        <li class="list-item">
                            <picture>
                                <img class="lazy" data-src="<?= base_url() ?>assets/images/logo/bpom.png" src="<?= base_url() ?>assets/images/logo/bpom.png" alt="Logo BPOM" style="background-color: white; padding:4px;" />
                            </picture>
                        </li>
                        <li class="list-item">
                            <picture>
                                <img class="lazy" data-src="<?= base_url() ?>assets/images/logo/haki.png" src="<?= base_url() ?>assets/images/logo/haki.png" alt="Logo HAKI" style="background-color: white; padding:4px;" />
                            </picture>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
    </div>
    <!-- end main content-->

    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/themes/velzon/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/landing/js/common.min.js"></script>
    <script src="<?= base_url() ?>assets/themes/landing/js/index.min.js"></script>

    <?php
    echo '
        <script src="' . base_url('application/modules/front-modules/template/js/js-module-configuration.js') . '"></script>
    ';
    foreach ($module_js as $item_js) {
        echo '
                <script src="' . base_url('application/modules/front-modules/' . $module_directory . '/js/' . $item_js . '.js') . '"></script>
            ';
    }
    ?>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 01:44:41 GMT -->

</html>