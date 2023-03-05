<div class="auth-box row">
    <div class="col-lg-12 col-md-12 bg-white">
        <div class="p-3">
            <div class="text-center">
                <img src="<?= base_url() ?>assets/images/logo/favicon.png" alt="wrapkit" style="height: 40px;">
            </div>
            <h2 class="mt-3 text-center">Sign In</h2>
            <p class="text-center">Masukkan Username dan password untuk masuk.</p>
            <div class="text-message"></div>
            <form class="mt-4" id="form-login">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="username">Username</label>
                            <input class="form-control" name="username" id="username" type="text" placeholder="masukkan username">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="password">Password</label>
                            <input class="form-control" name="password" id="password" type="password" placeholder="masukkan password">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark btn_login">Login</button>
                    </div>
                    <div class="col-lg-12 text-center mt-5">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>