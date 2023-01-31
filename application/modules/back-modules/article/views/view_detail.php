<div class="card">
    <div class="card-body text-dark">
        <h2><?= $detail->judul ?></h2>
        <br>
        <img src="<?= base_url('assets/images/uploads/' . $detail->img) ?>" alt="" style="width: 100%;">
        <div class="row mt-3">
            <div class="col-md-12 text-secondary">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fa fa-clock text-success"></i> <?= Modules::run('helper/date_indo', date('Y-m-d', strtotime($detail->tgl)), '-') ?>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-bookmark text-success"></i> <?= $detail->category_name ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <?= $detail->konten ?>
            </div>
        </div>
    </div>
</div>