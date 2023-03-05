<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Selamat Datang !</h5>
                    <p class="text-muted">Masuk Untuk Melanjutkan.</p>
                </div>
                <div class="text-message"></div>
                <div class="p-2 mt-4">
                    <form id="form-login">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username"> 
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" name="password" class="form-control pe-5" placeholder="Masukkan password" id="password">
                                <div class="invalid-feedback"></div>
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100 btn_login" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="mt-4 text-center">
            <p class="mb-0">Belum Mempunyai Akun? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Daftar Disini </a> </p>
        </div>

    </div>
</div>