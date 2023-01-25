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

    .thumbnails {
        display: flex;
        margin: 1rem auto 0;
        padding: 0;
        justify-content: center;
    }

    .thumbnail {
        width: 70px;
        height: 70px;
        overflow: hidden;
        list-style: none;
        margin: 0 0.2rem;
        cursor: pointer;
    }

    .thumbnail img {
        width: 100%;
        height: auto;
    }
</style>

<section class="carousel">
    <div class="slideshow-container fadeee">

        <!-- Full images with numbers and message Info -->
        <div class="Containers">
            <img src="<?= base_url() ?>assets/images/example/1280x450.png" style="width:100%">
        </div>

        <div class="Containers">
            <img src="<?= base_url() ?>assets/images/example/1280x450.png" style="width:100%">
        </div>

        <div class="Containers">
            <img src="<?= base_url() ?>assets/images/example/1280x450.png" style="width:100%">
        </div>

        <!-- Back and forward buttons -->
        <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
        <a class="forward" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The circles/dots -->
    <div style="text-align:center">
        <span class="dots" onclick="currentSlide(1)"></span>
        <span class="dots" onclick="currentSlide(2)"></span>
        <span class="dots" onclick="currentSlide(3)"></span>
    </div>
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
                            <li class="splide__slide" data-splide-interval="3000">
                                <div class="product_title" style="text-align: center;">
                                    <h3 style="color: black;">Gokoles</h3>
                                    <div class="row mt-4">
                                        <div class="col-md-5">
                                            <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="width: 200px; margin:auto">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="content_product" style="margin: auto;margin-top: 40px; max-width: 80%;">
                                                <h4 style="color: black;">“Minuman teh herbal yang berkhasiat untuk membantu memlihara kesehatan mata.”</h4>
                                                <a href="#" class="btn" style="margin-top: 40px;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide" data-splide-interval="3000">
                                <div class="product_title" style="text-align: center;">
                                    <h3 style="color: black;">Gokoles</h3>
                                    <div class="row mt-4">
                                        <div class="col-md-5">
                                            <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="width: 200px; margin:auto">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="content_product" style="margin: auto;margin-top: 40px; max-width: 80%;">
                                                <h4 style="color: black;">“Minuman teh herbal yang berkhasiat untuk membantu memlihara kesehatan mata.”</h4>
                                                <a href="#" class="btn" style="margin-top: 40px;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide" data-splide-interval="3000">
                                <div class="product_title" style="text-align: center;">
                                    <h3 style="color: black;">Gokoles</h3>
                                    <div class="row mt-4">
                                        <div class="col-md-5">
                                            <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="width: 200px; margin:auto">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="content_product" style="margin: auto;margin-top: 40px; max-width: 80%;">
                                                <h4 style="color: black;">“Minuman teh herbal yang berkhasiat untuk membantu memlihara kesehatan mata.”</h4>
                                                <a href="#" class="btn" style="margin-top: 40px;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide" data-splide-interval="3000">
                                <div class="product_title" style="text-align: center;">
                                    <h3 style="color: black;">Gokoles</h3>
                                    <div class="row mt-4">
                                        <div class="col-md-5">
                                            <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="width: 200px; margin:auto">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="content_product" style="margin: auto;margin-top: 40px; max-width: 80%;">
                                                <h4 style="color: black;">“Minuman teh herbal yang berkhasiat untuk membantu memlihara kesehatan mata.”</h4>
                                                <a href="#" class="btn" style="margin-top: 40px;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <ul id="thumbnails" class="thumbnails">
                    <li class="thumbnail">
                        <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles">
                    </li>
                    <li class="thumbnail">
                        <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles">
                    </li>
                    <li class="thumbnail">
                        <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles">
                    </li>
                    <li class="thumbnail">
                        <img src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles">
                    </li>
                </ul>
            </div>
            <!-- <div class="products_list d-grid">
                <div class="products_list-item">
                    <div class="products_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <a href="product.html" target="_blank" rel="noopener norefferer" style="margin: auto;">
                                <img class="lazy preview" data-src="<?= base_url() ?>assets/images/product/gokoles.png" src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="height: 200px" />
                            </a>
                        </div>
                        <div class="main d-flex flex-column align-items-center justify-content-between">
                            <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer">Gokoles</a>
                            <div class="main_price">
                                <span class="price">Rp. 220.000</span>
                            </div>
                            <a class="btn btn--green" href="#" style="font-size: 16px;">
                                <span>Lihat Selengkapnya</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="products_list-item">
                    <div class="products_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <a href="product.html" target="_blank" rel="noopener norefferer" style="margin: auto;">
                                <img class="lazy preview" data-src="<?= base_url() ?>assets/images/product/gokoles.png" src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="height: 200px" />
                            </a>
                        </div>
                        <div class="main d-flex flex-column align-items-center justify-content-between">
                            <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer">Gokoles</a>
                            <div class="main_price">
                                <span class="price">Rp. 220.000</span>
                            </div>
                            <a class="btn btn--green" href="#" style="font-size: 16px;">
                                <span>Lihat Selengkapnya</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="products_list-item">
                    <div class="products_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <a href="product.html" target="_blank" rel="noopener norefferer" style="margin: auto;">
                                <img class="lazy preview" data-src="<?= base_url() ?>assets/images/product/gokoles.png" src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" style="height: 200px" />
                            </a>
                        </div>
                        <div class="main d-flex flex-column align-items-center justify-content-between">
                            <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer">Gokoles</a>
                            <div class="main_price">
                                <span class="price">Rp. 220.000</span>
                            </div>
                            <a class="btn btn--green" href="#" style="font-size: 16px;">
                                <span>Lihat Selengkapnya</span>
                            </a>
                        </div>
                    </div>
                </div> -->
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
            <div class="slideshow-container-testi fadeee-testi">

                <!-- Full images with numbers and message Info -->
                <div class="Containers-testi">
                    <div class="row">
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/themes/admin/assets/images/users/4.jpg" alt="Testimoni 1" style="border-radius: 50%;" />
                        </div>
                        <div class="col-8" style="color: white; margin-top:8vh;">2 Mingguan lah, saya rutin minum healtik itu, alhamdulillah kok nyeri pada lutut dan tangan berangsur-angsur membaik. Terima kasih Healtik.</div>
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/images/product/glucosyifa.png" alt="glucosyifa" />
                        </div>
                    </div>
                </div>

                <div class="Containers-testi">
                    <div class="row">
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/themes/admin/assets/images/users/2.jpg" alt="Testimoni 2" style="border-radius: 50%;" />

                        </div>
                        <div class="col-8" style="color: white; margin-top:8vh;">2 lah, saya rutin minum healtik itu, alhamdulillah kok nyeri pada lutut dan tangan berangsur-angsur membaik. Terima kasih Healtik.</div>
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/images/product/padharanfit.png" alt="padharanfit" />
                        </div>
                    </div>
                </div>

                <div class="Containers-testi">
                    <div class="row">
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/themes/admin/assets/images/users/3.jpg" alt="Testimoni 3" style="border-radius: 50%;" />

                        </div>
                        <div class="col-8" style="color: white; margin-top:8vh;">2 Mingguan lah, saya rutin minum itu, alhamdulillah kok nyeri pada lutut dan tangan berangsur-angsur membaik. Terima kasih Healtik.</div>
                        <div class="col-2">
                            <img class="lazy preview" src="<?= base_url() ?>assets/images/product/gokoles.png" alt="Gokoles" />
                        </div>
                    </div>
                </div>

                <!-- Back and forward buttons -->
                <a class="Back-testi" onclick="plusSlidesTesti(-1)">&#10094;</a>
                <a class="forward-testi" onclick="plusSlidesTesti(1)">&#10095;</a>
            </div>
            <br>
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
                <li class="news_list-item col-md-4">
                    <div class="news_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <img class="lazy article_image" src="<?= base_url() ?>assets/images/example/diare.png" alt="post" />
                            <p class="category_article">Kategori 1</p>
                        </div>
                        <div class="main d-flex flex-column justify-content-between">
                            <div class="main_metadata">
                                <span class="main_metadata-item">
                                    <i class="icon-calendar_day icon"></i>
                                    September 30, 2021
                                </span>
                            </div>
                            <a class="main_title" href="post.html" target="_blank" rel="noopener norefferer">Edukasi Tentang Diare</a>
                            <p class="main_preview">Sejarah Penamaan Penyakit Diare berasal dari Bahasa Inggris diarrhea yang berarti sebuah penyakit yang membuat</p>
                        </div>
                        <div class="view_more" style="margin-top: 20px;">
                            <a class="btn_view_more" href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </li>
                <li class="news_list-item col-md-4">
                    <div class="news_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <img class="lazy article_image" src="<?= base_url() ?>assets/images/example/diare.png" alt="post" />
                            <p class="category_article" style="background-color: green;">Kategori 2</p>

                        </div>
                        <div class="main d-flex flex-column justify-content-between">
                            <div class="main_metadata">
                                <span class="main_metadata-item">
                                    <i class="icon-calendar_day icon"></i>
                                    September 30, 2021
                                </span>
                            </div>
                            <a class="main_title" href="post.html" target="_blank" rel="noopener norefferer">Edukasi Tentang Diare</a>
                            <p class="main_preview">Sejarah Penamaan Penyakit Diare berasal dari Bahasa Inggris diarrhea yang berarti sebuah penyakit yang membuat</p>
                        </div>
                        <div class="view_more" style="margin-top: 20px;">
                            <a class="btn_view_more" href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </li>
                <li class="news_list-item col-md-4">
                    <div class="news_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <img class="lazy article_image" src="<?= base_url() ?>assets/images/example/diare.png" alt="post" />
                            <p class="category_article" style="background-color: purple;">Kategori 3</p>

                        </div>
                        <div class="main d-flex flex-column justify-content-between">
                            <div class="main_metadata">
                                <span class="main_metadata-item">
                                    <i class="icon-calendar_day icon"></i>
                                    September 30, 2021
                                </span>
                            </div>
                            <a class="main_title" href="post.html" target="_blank" rel="noopener norefferer">Edukasi Tentang Diare</a>
                            <p class="main_preview">Sejarah Penamaan Penyakit Diare berasal dari Bahasa Inggris diarrhea yang berarti sebuah penyakit yang membuat</p>
                        </div>
                        <div class="view_more" style="margin-top: 20px;">
                            <a class="btn_view_more" href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div style="text-align: center;">
        <a class="btn btn--green">Lihat Semua Artikel</a>
    </div>
</section>