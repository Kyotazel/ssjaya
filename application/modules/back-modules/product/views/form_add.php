<div class="card">
    <div class="card-body">
        <form class="form_input">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." value="<?= isset($data_detail->nama) ? $data_detail->nama : '' ?>">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="20000..." value="<?= isset($data_detail->harga) ? $data_detail->harga : '' ?>">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aturan">Aturan Pakai</label>
                        <input type="text" name="aturan" class="form-control" placeholder="3 x sehari..." value="<?= isset($data_detail->aturan) ? $data_detail->aturan : '' ?>">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <?php if(isset($data_detail)) : ?>
                            <img src="<?= base_url('assets/images/uploads/'.$data_detail->img) ?>" class="for_update" alt="" style="display: none; height: 200px">
                            <p class="text-danger for_update" style="display: none;">*) Apabila tidak diubah maka jangan upload foto</p>
                        <?php endif ?>
                        <input type="file" name="image" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" style="height: 400px;"><?= isset($data_detail->deskripsi) ? $data_detail->deskripsi : '' ?></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="manfaat">Khasiat / Manfaat</label>
                        <textarea name="manfaat" id="manfaat" style="height: 400px;"><?= isset($data_detail->manfaat) ? $data_detail->manfaat : '' ?></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn_save" data-id="<?= isset($id_encrypt) ? $id_encrypt : '' ?>" data-method="<?= $method ?>" style="display:block; width: 100%">
                        <span class="spinner-grow spinner-grow-sm d-none" role="status"></span>
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var save_method = '<?= $method ?>'
</script>