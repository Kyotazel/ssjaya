<style>
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
    }
</style>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"> -->

<section class="myproducts" style="margin-bottom: 40px;">
    <div class="featured" style="padding-top: 20px">
        <div class="container">
            <div class="featured_header">
                <h2 class="featured_header-title">List Mitra</h2>
            </div>
            <div class="filter" style="margin: auto; width: 90%; text-align: center">
                <input class="myInput" list="listCity" name="city" type="text" placeholder="Masukkan Kota" />
                <datalist id="listCity">
                    <?php foreach ($list_city as $city) : ?>
                        <option value="<?= $city->kota ?>"></option>
                    <?php endforeach ?>
                </datalist>
                <input class="myInput" type="text" placeholder="Cari Kata" />
                <button class="mybutton"><i class="fa fa-search"></i> Cari </button>
            </div>
            <div class="list-mitra" style="margin-top: 40px;">
                <div class="products_list d-grid">
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                    <div class="products_list-item">
                        <div class="products_list-item_wrapper d-flex flex-column">
                            <div class="main d-flex flex-column justify-content-between">
                                <h4 class="main_title">Apotek Kirana</h4>
                                <p style="margin-bottom: 12px; text-align: center">Bandar Lor, Kec Mojoroto Kota Kediri.</p>
                                <p style="text-align: left;"><b>Produk</b> : Gokoles, Healtik, Solubet, Padharanfit, Titan Gel</p>
                                <p style="text-align: left;"><b>Sales</b> : agung0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script> -->