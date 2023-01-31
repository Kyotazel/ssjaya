<div class="card">
    <div class="card-body">
        <form class="form_input">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul..." value="<?= isset($data_detail->judul) ? $data_detail->judul : '' ?>">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_category">Kategori</label>
                        <select name="id_category" id="id_category" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php
                                foreach ($list_category as $category) {
                                    if (isset($data_detail->id_category)) {
                                        $selected = ($category->id == $data_detail->id_category) ? 'selected' : '';
                                        echo '<option value="' . $category->id . '" ' . $selected . '>' . $category->name . '</option>';
                                    } else {
                                        echo "<option value='$category->id'>$category->name</option>";
                                    }
                                }
                                ?>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_produk">Produk</label>
                        <select name="id_produk" id="id_produk" class="form-control">
                            <option value="">Pilih Produk</option>
                            <?php
                                foreach ($list_produk as $produk) {
                                    if (isset($data_detail->id_produk)) {
                                        $selected = ($produk->id == $data_detail->id_produk) ? 'selected' : '';
                                        echo '<option value="' . $produk->id . '" ' . $selected . '>' . $produk->nama . '</option>';
                                    } else {
                                        echo "<option value='$produk->id'>$produk->nama</option>";
                                    }
                                }
                                ?>
                        </select>
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
                        <label for="konten">Konten</label>
                        <textarea name="konten" id="konten" style="height: 400px;"><?= isset($data_detail->konten) ? $data_detail->konten : '' ?></textarea>
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