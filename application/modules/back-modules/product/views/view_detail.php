<div class="card">
    <div class="card-body text-dark">
        <h2><?= $detail->nama ?></h2>
        <br>
        <img src="<?= base_url('assets/images/uploads/' . $detail->filename) ?>" alt="" style="width: 20%; margin-right: 20px">
        <img src="<?= base_url('assets/images/uploads/' . $detail->merk_photo) ?>" alt="Merk Produk" style="width: 20%;">
        <div class="row mt-3">
            <div class="col-md-12">
                <h4>Harga : Rp. <?= str_replace(',', '.', number_format($detail->harga)) ?></h4>
            </div>
            <div class="col-md-12 mt-5">
                <h2>Deskripsi</h2>
                <hr>
                <?= $detail->deskripsi ?>
            </div>
            <div class="col-md-12 mt-5">
                <h2>Aturan pakai</h2>
                <hr>
                <?= $detail->aturan ?>
            </div>
            <div class="col-md-12 mt-5">
                <h2>Khasiat / Manfaat</h2>
                <hr>
                <?= $detail->manfaat ?>
            </div>
            <div class="col-md-12 mt-5">
                <h2>Komposisi</h2>
                <hr>
                <div class="row">
                    <?php foreach (Modules::run('database/find', 'blw_produk_has_komposisi', ['id_produk' => $detail->id])->result() as $value) : ?>
                        <div class="col-md-1" style="text-align: center;"><img src="<?= base_url('assets/images/uploads/' . $value->image) ?>" alt="<?= $value->nama ?>" style="width: 50%;"></div>
                        <div class="col-md-11"><?= $value->nama ?></div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <h2>Sertifikasi</h2>
                <hr>
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