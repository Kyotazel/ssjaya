<style>

    @font-face {
        font-family: "gotham-black";
        src: url(<?= base_url('assets/images/font/Gotham-Black-Regular.ttf') ?>);
    }

    @font-face {
        font-family: "lato";
        src: url(<?= base_url('assets/images/font/Lato-Regular.ttf') ?>);
    }
    .mybutton {
        background-color: #efc368;
        display: block;
        width: 200px;
        padding: 8px;
        border-radius: 20px;
        color: #214842;
        margin: auto;
        margin-top: 16px;
    }

    .myInput {
        border: 1px solid grey;
        padding: 4px;
        border-radius: 10px;
        margin-top: 16px;
        background-color: white;
    }
    .mitra_list {
        background-color: white;
        text-align: center;
        padding: 20px;
        
    }

    .mitra_list h4 {
        font-family: "gotham-black";
        font-size: 20px;
        color: black;
    }

    .mitra_list p {
        font-family: "lato";
    }

    @media (max-width: 768px) {
   .splide__slide {
      width: 100%;
   }
}
</style>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"> -->

<section class="myproducts" style="margin-bottom: 40px;">
    <div class="featured" style="padding-top: 20px">
        <div class="container">
            <div class="featured_header">
                <h2 class="featured_header-title">Daftar Mitra Apotek</h2>
            </div>
            <div class="filter" style="margin: auto; width: 90%; text-align: center">
                <input class="myInput" list="listCity" name="city" type="text" id="city" placeholder="Cari Area" />
                <datalist id="listCity">
                    <?php foreach ($list_city as $city) : ?>
                        <option value="<?= $city->kota ?>"></option>
                    <?php endforeach ?>
                </datalist>
                <input class="myInput" type="text" placeholder="Cari Apotek" id="apotek" />
                <button class="mybutton" type="button"><i class="fa fa-search"></i> Cari </button>
            </div>
            <section>
                <div id="not_found" class="my-4"></div>
            </section>
            <section id="list-carousel" class="splide my-4" aria-label="My Awesome Gallery">
                <div class="splide__track" id="list_mitra">
                    <ul class="splide__list">
                        
                    </ul>
                </div>
            </section>
        </div>
</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script> -->