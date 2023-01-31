<style>
    .category_article {
        display: inline-block;
        color: white;
        padding: 8px;
        font-weight: bolder;
        border-radius: 999em 40px 40px 999em;
    }
</style>

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
        <div class="table-responsive">
            <table id="table-data" class="table table-striped table-bordered no-wrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode Warna</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal zoomIn" id="modal_form" tabindex="-1" aria-modal="true" role="dialog" data-keyboard="false" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form_input">
                <div class="modal-header">
                    <h5 class="modal-title" id="label_modal">Grid Modals</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row text-dark">
                        <!--end col-->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama...">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Kode Warna</label>
                                <input type="text" name="color" class="form-control" placeholder="#0000..">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn_save">
                        <span class="spinner-grow spinner-grow-sm d-none" role="status"></span>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
