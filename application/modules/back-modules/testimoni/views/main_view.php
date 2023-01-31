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
                        <th>Foto</th>
                        <th>Produk</th>
                        <th>Komentar</th>
                        <th>Status</th>
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
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama...">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Pembeli...">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_produk">Produk</label>
                                <select name="id_produk" id="id_produk" class="form-control">
                                    <option value="">Pilih Produk</option>
                                    <?php foreach($list_produk as $produk) : ?>
                                        <option value="<?= $produk->id ?>"><?= $produk->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="komentar">Komenntar</label>
                                <textarea name="komentar" class="form-control" placeholder="Masukkan komentar..."></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" name="image" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <p class="text-danger update_photo">*) Apabila foto tidak diupdate, tidak perlu upload</p>
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