<style>
    .article-content {
        text-align: justify;
    }
    .article-content p {
        margin-bottom: 1rem;
        text-indent: 40px;
        margin-top: 0.5rem;
    }
    .article-content ul, .article-content ol {
        margin-bottom: 1rem;
        margin-top: 0.5rem;
        margin-left: 3rem;
    }
    .article-content ul {
        list-style: disc;
    }
    .article-content ol {
        list-style-type: decimal;
    }
</style>

<div class="container" style="margin-top: 160px; margin-bottom: 40px; background-color: white; padding: 40px">
    <h2><?= $detail->judul ?></h2>
    <br>
    <img src="<?= base_url('assets/images/uploads/' . $detail->img) ?>" alt="" style="width: 80%;">
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
            <div class="article-content container">
                <?= $detail->konten ?>
            </div>
        </div>
    </div>
</div>