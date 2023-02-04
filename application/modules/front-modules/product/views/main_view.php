<section class="myproducts" style="margin-bottom: 40px;">
    <div class="featured" style="padding-top: 20px">
        <div class="container">
            <div class="featured_header">
                <h2 class="featured_header-title">Produk Kami</h2>
            </div>
            <div class="products_list d-grid">
                <?php foreach($product as $value) : ?>
                <div class="products_list-item">
                    <div class="products_list-item_wrapper d-flex flex-column">
                        <div class="media">
                            <a href="<?= base_url('product/detail/' . $value->url) ?>" target="_blank" rel="noopener norefferer" style="margin: auto;">
                                <img class="lazy preview" data-src="<?= base_url() ?>assets/images/uploads/<?= $value->filename ?>" src="<?= base_url() ?>assets/images/uploads/<?= $value->filename ?>" alt="Gokoles" style="height: 200px" />
                            </a>
                        </div>
                        <div class="main d-flex flex-column align-items-center justify-content-between">
                            <a class="main_title" href="<?= base_url('product/detail/' . $value->url) ?>" target="_blank" rel="noopener norefferer"><?= $value->nama ?></a>
                            <div class="main_price">
                                <span class="price">Rp. <?= str_replace(',', '.', number_format($value->harga)) ?></span>
                            </div>
                            <a class="btn btn--green" href="<?= base_url('product/detail/' . $value->url) ?>" style="font-size: 16px;">
                                <span>Lihat Selengkapnya</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>