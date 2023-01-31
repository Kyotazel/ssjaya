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
        <input type="hidden" value="<?= $url ?>" id="url">
        <button class="btn btn-success rounded-pill btn-label" onclick="add()"><i class="ri-add-circle-line label-icon"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-data" class="table table-striped table-bordered no-wrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Komposisi</th>
                        <th>Foto</th>
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
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama....">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <p class="text-danger update_photo" style="display: none">*) Jangan Upload apabila tidak merubah gambar</p>
                        </div>
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

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" id="modalImage" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<script>
  var save_method = '';
</script>