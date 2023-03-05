<div class="card">
    <div class="card-header">
        <h4>Filter</h4>
    </div>
    <div class="card-body">
        <form id="filter_form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="filter_city">Kota : </label>
                        <select name="filter_city" id="filter_city" class="form-control">
                            <option value="">Pilih Kota</option>
                            <?php foreach ($list_city as $city) : ?>
                                <option value="<?= $city->kota ?>"><?= $city->kota ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="filter_sales">Sales : </label>
                        <select name="filter_sales" id="filter_sales" class="form-control">
                            <option value="">Pilih Sales</option>
                            <?php foreach ($list_sales as $sales) : ?>
                                <option value="<?= $sales->id_sales ?>"><?= $sales->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="filter_product">Produk : </label>
                        <select name="filter_product" id="filter_product" class="form-control">
                            <option value="">Pilih Produk</option>
                            <?php foreach ($list_product as $product) : ?>
                                <option value="<?= ucwords(strtolower($product->nama)) ?>"><?= $product->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" id="filter_submit" class="btn btn-success" style="float: right;"><i class="fa fa-search"></i> Filter Data</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
            <table id="table-data" class="table table-striped table-bordered no-wrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Sales</th>
                        <th>Produk</th>
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
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="nama_apotek">Nama Apotek</label>
                                <input type="text" name="nama_apotek" class="form-control" placeholder="Apotek ...">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="id_sales">Nama Sales</label>
                                <select name="id_sales" id="id_sales" class="form-control">
                                    <option value="">Pilih Sales</option>
                                    <?php foreach ($list_sales as $sales) : ?>
                                        <option value="<?= $sales->id_sales ?>"><?= $sales->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="Masukkan Kota">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Jl. .....">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="produk">Produk</label>
                                <select name="product[]" id="product" class="select2" multiple>
                                    <?php foreach ($list_product as $product) : ?>
                                        <option value="<?= ucwords(strtolower($product->nama)) ?>"><?= $product->nama ?></option>
                                    <?php endforeach ?>
                                </select>
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