<style>
    .article-content {
        text-align: justify;
    }

    .product-content p {
        margin-bottom: 1rem;
        margin-top: 0.5rem;
    }

    .product-content ul,
    .product-content ol {
        margin-bottom: 1rem;
        margin-top: 0.5rem;
        margin-left: 3rem;
    }

    .product-content ul {
        list-style: disc;
    }

    .product-content ol {
        list-style-type: decimal;
    }
</style>

<div class="container" style="margin-top: 160px; margin-bottom: 40px; background-color: white; padding: 40px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align:center"><?= $detail->nama ?></h2>
            <br>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6" style="text-align: center;">
                            <img src="<?= base_url('assets/images/uploads/' . $detail->filename) ?>" alt="<?= $detail->nama ?>" style="width: 60%; margin:auto">
                        </div>
                        <div class="col-md-6" style="text-align:center; margin:auto">
                            <h3>Harga : Rp. <?= str_replace(',', '.', number_format($detail->harga)) ?></h3>
                            <a href="#" class="btn" style="margin-top: 40px;"><i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="col-auto">
                            <h3>Deskripsi</h3>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                    <div class="product-content">
                        <?= $detail->deskripsi ?>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="col-auto">
                            <h3>Aturan pakai</h3>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="product-content">
                        <?= $detail->aturan ?>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="col-auto">
                            <h3>Khasiat / Manfaat</h3>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="product-content">
                        <?= $detail->manfaat ?>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="col-auto">
                            <h3>Komposisi</h3>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach (Modules::run('database/find', 'blw_produk_has_komposisi', ['id_produk' => $detail->id])->result() as $value) : ?>
                            <div class="col-md-1" style="text-align: center;"><img src="<?= base_url('assets/images/uploads/' . $value->image) ?>" alt="<?= $value->nama ?>" style="width: 50%;"></div>
                            <div class="col-md-11"><?= $value->nama ?></div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row justify-content-center align-items-center mt-1">
                        <div class="col-auto">
                            <h3>Sertifikasi</h3>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach (Modules::run('database/find', 'blw_produk_has_sertifikasi', ['id_produk' => $detail->id])->result() as $value) : ?>
                            <div class="col-md-3" style="text-align: center;">
                                <img src="<?= base_url('assets/images/uploads/' . $value->image) ?>" alt="<?= $value->image ?>" style="width: 100%;">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>