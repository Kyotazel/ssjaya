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
                    <th style="width: 20%;">Nama Menu</th>
                    <th style="width: 15%;">Link</th>
                    <th style="width: 10%;">Icon</th>
                    <th style="width: 10%;">Grup</th>
                    <th style="width: 15%;">Tipe Menu</th>
                    <th style="width: 20%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="menu_type">Tipe Menu</label>
                                    <select class="form-control" name="menu_type" style="width: 100%;">
                                        <?php foreach ($category as $value) : ?>
                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 pl-3">
                                    <div class="form-group">
                                        <label for="is_group">Apakah Group?</label>
                                        <div class="row">
                                            <div class="icheck-primary d-block col-md-6">
                                                <input type="radio" name="is_group" value="1">
                                                <label for="is_group">
                                                    Iya
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-block col-md-6">
                                                <input type="radio" name="is_group" value="0" checked>
                                                <label for="is_group">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Menu...">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="Masukkan Link...">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="icon">Icon yang digunakan</label>
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="fa fa-...">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="group">Group</label>
                            <select class="form-control" name="group" id="group">
                                <option value="">-- Tanpa Group --</option>
                                <?php foreach ($group as $value) : ?>
                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback"></div>
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