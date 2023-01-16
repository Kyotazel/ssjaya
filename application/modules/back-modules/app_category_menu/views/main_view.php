<div class="card">
    <div class="card-header d-flex align-items-center">
        <div class="card-title mb-0 flex-grow-1">
            <div class="btn btn-primary">
                <h6 class="mb-0 text-light">Daftar <?= $page_title ?></h6>
            </div>
        </div>
        <button class="btn btn-success rounded-pill btn-label" onclick="add()"><i class="ri-add-circle-line label-icon"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <table id="table-data" class="table table-bordered nowrap table-striped align-middle dataTable no-footer dtr-inline" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th style="width: 50%;">Nama Menu Kategori</th>
                    <th style="width: 20%;" class="text-center">Status</th>
                    <th style="width: 20%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal zoomIn" id="modal_form" tabindex="-1" aria-modal="true" role="dialog" data-bs-keyboard="false" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label_modal">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form_input">
                    <div class="row text-dark">
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori Menu</label>
                                <input type="text" class="form-control" placeholder="Nama Kategori Menu..." name="name" id="name" minlength="3" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary btn_save">
                                    <span class="spinner-grow spinner-grow-sm d-none" role="status"></span>
                                    Submit
                                </button>  
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>