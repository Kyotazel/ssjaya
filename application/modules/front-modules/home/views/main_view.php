<style>
    .testimonial .info {
        background: url(<?= base_url("assets/images/example/noise.webp") ?>) center, 0 0/cover #214842;
        background-blend-mode: overlay;
        position: relative;
        overflow: hidden;
    }

    .news_list-item_wrapper .main,
    .news_list-item_wrapper .main_title {
        flex-grow: 0;
    }

    .news_list-item_wrapper {
        -webkit-box-shadow: 0 0 15px rgb(37 143 103 / 10%);
        box-shadow: 0 0 15px rgb(37 143 103 / 10%);
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        -webkit-transition: .3s ease-in-out;
        -o-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
        background: #fff;
        padding: 12px;
    }

    .btn_view_more {
        color: #214842;
        font-weight: bold;
        border-radius: 12px;
    }

    .media {
        position: relative;
    }

    .category_article {
        position: absolute;
        top: 8px;
        left: 16px;
        background-color: blue;
        color: white;
        padding: 8px;
        font-weight: bolder;
        border-radius: 999em 40px 40px 999em;
    }

    #thumbnail-carousel-product .splide__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        margin: auto;
    }

    #thumbnail-carousel-product .splide__arrow--prev,
    #thumbnail-carousel-product .splide__arrow--next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 100%;
        width: 100px;
        overflow: hidden;
    }

    #thumbnail-carousel-product .splide__arrow--prev {
        left: -100px;
        border-radius: 50% 0 0 50%;
    }

    #thumbnail-carousel-product .splide__arrow--next {
        right: -100px;
        border-radius: 0 50% 50% 0;
    }

    #thumbnail-carousel-product .splide__slide {
        filter: brightness(0.9);
        background-color: white;
        border: 1px solid lightgrey;
    }

    #thumbnail-carousel-product .splide__slide.is-active {
        filter: brightness(1);
    }


    @media (max-width: 768px) {
        #thumbnail-carousel-product {
            display: none;
        }

        .testimoni_product {
            display: none;
        }

        .testimoni_person img {
            width: 50%;
            height: auto;
            margin: auto;
        }
    }
</style>

<section class="carousel">
    <section id="my-carousel" class="splide" aria-label="My Carousel Image">
        <div class="splide__track">
            <ul class="splide__list">
                <?php foreach ($carousel as $value) : ?>
                    <li class="splide__slide" data-splide-interval="3000">
                        <img src="<?= base_url() ?>assets/images/uploads/<?= $value->photo ?>" style="width:100%;">
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>
</section>

<section class="myproducts" style="margin-bottom: 40px;">
    <div class="featured" style="padding-top: 60px;">
        <div class="container">
            <div class="featured_header">
                <h2 class="featured_header-title">Produk Kami</h2>
            </div>
            <div class="my_list_product" style="max-width: 90%; margin: auto">
                <section id="main-carousel" class="splide my-4" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($produk as $value) : ?>
                                <?php
                                $preview = '';
                                $jumlah_huruf = strlen($value->deskripsi);
                                if ($jumlah_huruf != 0) {
                                    $preview = substr(strip_tags($value->deskripsi), 0, 100) . "...";
                                }
                                ?>
                                <li class="splide__slide" data-splide-interval="3000">
                                    <div class="product_title" style="text-align: center;">
                                        <h3 style="color: black;"><?= $value->nama ?></h3>
                                        <div class="row mt-4">
                                            <div class="col-md-5">
                                                <img src="<?= base_url() ?>assets/images/uploads/<?= $value->filename ?>" alt="<?= $value->nama ?>" style="width: 200px; margin:auto">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="content_product" style="margin: auto;margin-top: 40px; max-width: 80%;">
                                                    <h5 style="color: black;"><?= $preview ?></h5>
                                                    <a href="<?= base_url('product/detail/' . $value->url) ?>" class="btn" style="margin-top: 40px;">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </section>

                <div style="max-width: 700px; margin: auto">
                    <section id="thumbnail-carousel-product" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach ($produk as $value) : ?>
                                    <?php
                                    $photo = $value->filename;
                                    if ($value->merk_photo) {
                                        $photo = $value->merk_photo;
                                    }
                                    ?>
                                    <li class="splide__slide">
                                        <img src="<?= base_url() ?>assets/images/uploads/<?= $photo ?>" alt="<?= $value->nama ?>" style="width: 100px;">
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial" style="margin-bottom: 40px;">
    <section class="info section" style="padding: 40px;">
        <div class="container" style="text-align: center;">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <h2 style="color: white;">Ulasan Customer Kami</h2>
                </div>
            </div>
            <section id="testimoni-carounsel" class="splide my-4" aria-label="My Awesome Gallery">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($testimoni as $value) : ?>
                            <li class="splide__slide" data-splide-interval="3000">
                                <div class="row">
                                    <div class="col-md-2 testimoni_person">
                                        <img class="lazy preview" src="<?= base_url() ?>assets/images/uploads/<?= $value->foto ?>" alt="<?= $value->nama ?>" style="border-radius: 50%;" />
                                    </div>
                                    <div class="col-md-8 testimoni_comment" style="color: white; margin-top:8vh;"><?= $value->komentar ?></div>
                                    <div class="col-md-2 testimoni_product">
                                        <img class="lazy preview" src="<?= base_url() ?>assets/images/uploads/<?= $value->filename ?>" alt="<?= $value->product_name ?>" />
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </section>
        </div>
    </section>
</section>

<section class="artikel" style="margin-bottom: 40px;">
    <div class="news_title" style="text-align: center; margin-bottom: 30px">
        <h2>Artikel Terbaru</h2>
    </div>
    <div class="container d-lg-flex justify-content-between">
        <div class="">
            <ul class="news_list d-flex flex-wrap">
                <?php foreach ($article as $value) : ?>
                    <?php
                    $preview_article = '';
                    $jumlah_huruf = strlen($value->konten);
                    if ($jumlah_huruf != 0) {
                        $preview_article = (substr(strip_tags($value->konten), 0, 150)) . "...";
                    }
                    ?>
                    <li class="news_list-item col-md-4">
                        <div class="news_list-item_wrapper d-flex flex-column">
                            <div class="media">
                                <img class="lazy article_image" src="<?= base_url() ?>assets/images/uploads/<?= $value->img ?>" style="height: 250px;" alt="<?= $value->judul ?>" />
                                <p class="category_article" style="background-color: <?= $value->category_color ?>;"><?= $value->category_name ?></p>
                            </div>
                            <div class="main d-flex flex-column justify-content-between">
                                <div class="main_metadata">
                                    <span class="main_metadata-item">
                                        <i class="icon-calendar_day icon"></i>
                                        <?= Modules::run('helper/date_indo', date('Y-m-d', strtotime($value->tgl)), '-') ?>
                                    </span>
                                </div>
                                <a class="main_title" href="<?= base_url('article/detail/' . $value->url) ?>" target="_blank" rel="noopener norefferer"><?= $value->judul ?></a>
                                <p class="main_preview"><?= $preview_article ?></p>
                            </div>
                            <div class="view_more" style="margin-top: 20px;">
                                <a class="btn_view_more" href="<?= base_url('article/detail/' . $value->url) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div style="text-align: center;">
        <a class="btn btn--green" href="<?= base_url('article') ?>">Lihat Semua Artikel</a>
    </div>
</section>