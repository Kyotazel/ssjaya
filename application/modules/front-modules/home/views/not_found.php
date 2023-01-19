<main class="error">
    <div class="container">
        <div class="error_media">
                <img class="lazy error_media-img" data-src="<?= base_url("assets/images/example/404.webp") ?>" src="<?= base_url("assets/images/example/404.webp") ?>" alt="404" style="width: 20%; margin: auto; padding-top: 40px; padding-bottom: 40px" />
        </div>
        <div class="error_main d-flex flex-column align-items-center">
            <h3 class="error_main-title">Halaman Tidak ditemukan</h3>
            <p class="error_main-text d-md-flex flex-column align-items-center">
                <span class="linebreak">Halaman yang kamu cari tidak ada.</span>
                <span class="linebreak">Sepertinya kamu salah halaman.</span>
            </p>
            <a class="btn" href="<?= base_url() ?>">Kembali ke homepage</a>
        </div>
    </div>
</main>