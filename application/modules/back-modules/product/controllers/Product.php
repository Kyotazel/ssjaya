<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product extends BackendController
{

    protected $module_name = 'product';
    protected $module_directory = 'product';
    protected $module_js = ['product'];
    protected $app_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->_init();
        Modules::run('security/common_security');
    }

    private function _init()
    {
        $this->app_data['module_js'] = $this->module_js;
        $this->app_data['module_name'] = $this->module_name;
        $this->app_data['module_directory'] = $this->module_directory;
    }

    public function index()
    {
        $this->app_data['list_produk']  = Modules::run('database/get_all', 'blw_produk')->result();
        $this->app_data['page_title']   = 'Produk';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $array_query = [
                "select" => "a.*, b.nama as filename",
                "from" => "blw_produk a",
                "join" => [
                    "blw_upload b, a.id = b.idproduk, left",
                ],
            ];
            $get_all = Modules::run('database/get', $array_query)->result();

            $no = 0;
            $data = [];
            foreach ($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $merk = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama' data-img='" . base_url('assets/images/uploads/') . $value->filename . "'><img src='" . base_url('assets/images/uploads/') . $value->filename . "' style='height: 100px; width: auto' /></a>";
                if($value->merk_photo) {
                    $merk = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama' data-img='" . base_url('assets/images/uploads/') . $value->merk_photo . "'><img src='" . base_url('assets/images/uploads/') . $value->merk_photo . "' style='height: 100px; width: auto' /></a>";
                }

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->nama;
                $row[] = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama' data-img='" . base_url('assets/images/uploads/') . $value->filename . "'><img src='" . base_url('assets/images/uploads/') . $value->filename . "' style='height: 100px; width: auto' /></a>";
                $row[] = $merk;
                $row[] = "Rp. " . number_format($value->harga);
                $row[] = "<a class='btn btn-primary text-light mb-1' href='" . base_url('admin/product/komposisi/index/' . $value->url) . "'>Komposisi</a><br><a class='btn btn-primary text-light' href='" . base_url('admin/product/sertifikasi/index/' . $value->url) . "'>Sertifikasi</a>";
                $row[] = "<div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Action 
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' href='" . base_url('admin/product/detail/' . $value->url) . "'><i class='fa fa-desktop'></i> Detail</a>
                                <a class='dropdown-item' href='" . base_url('admin/product/edit/' . $value->url) . "'><i class='ri-ball-pen-line'></i> Edit</a>
                                <button class='dropdown-item btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>
                            </div>
                        </div>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'blw_testimoni', ['id' => $id])->row();

            $output = array(
                "data" => $data,
                "status" => TRUE
            );
        }

        echo json_encode($output);
    }

    public function add()
    {
        $this->app_data['method']       = 'add';
        $this->app_data['page_title']   = 'Tambah Produk';
        $this->app_data['view_file']    = 'form_add';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function edit($slug)
    {

        $data_detail = Modules::run('database/find', 'blw_produk', ['url' => $slug])->row();
        $data_detail->img = Modules::run('database/find', 'blw_upload', ['idproduk' => $data_detail->id])->row()->nama;
        $this->app_data['method']       = 'update';
        $this->app_data['data_detail']  = $data_detail;
        $this->app_data['id_encrypt']   = $this->encryption->encrypt($data_detail->id);
        $this->app_data['page_title']   = 'Edit produk';
        $this->app_data['view_file']    = 'form_add';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function detail($url)
    {

        $array_query = [
            "select" => "a.*, b.nama as filename",
            "from" => "blw_produk a",
            "join" => [
                "blw_upload b, a.id = b.idproduk, left",
            ],
            "where" => ['a.url' => $url]
        ];

        $this->app_data['detail']       = Modules::run('database/get', $array_query)->row();
        $this->app_data['page_title']   = 'Detail Produk';
        $this->app_data['view_file']    = 'view_detail';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function delete_data()
    {
        $id = $this->encryption->decrypt($this->input->post('id'));

        Modules::run('database/delete', 'blw_produk', ['id' => $id]);

        echo json_encode(['status' => TRUE]);
    }

    public function update_status()
    {
        $id         = $this->encryption->decrypt($this->input->post('id'));
        $status     = $this->input->post('status');

        $array_update = [
            'status' => $status
        ];
        Modules::run('database/update', 'blw_testimoni', ['id' => $id], $array_update);
        echo json_encode(['status' => true]);
    }

    private function validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'nama';
            $data['status'] = FALSE;
        }
        if ($this->input->post('harga') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'harga';
            $data['status'] = FALSE;
        }
        if ($this->input->post('aturan') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'aturan';
            $data['status'] = FALSE;
        }
        if ($this->input->post('deskripsi') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'deskripsi';
            $data['status'] = FALSE;
        }
        if ($this->input->post('manfaat') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'manfaat';
            $data['status'] = FALSE;
        }
        if ($data['status'] == FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function save()
    {
        $this->validate();
        $nama       = $this->input->post('nama');
        $harga      = $this->input->post('harga');
        $aturan     = $this->input->post('aturan');
        $foto       = $this->upload_image();
        $merk_photo = $this->upload_image_merk();
        $url        = str_replace(' ', '-', $nama) . "-" . time();
        $deskripsi  = $_POST['deskripsi'];
        $manfaat    = $_POST['manfaat'];

        $array_insert = [
            'tglbuat' => date('Y-m-d H:i:s'),
            'nama' => $nama,
            'harga' => $harga,
            'url' => $url,
            'deskripsi' => $deskripsi,
            'aturan' => $aturan,
            'manfaat' => $manfaat,
            'merk_photo' => $merk_photo,
        ];

        Modules::run('database/insert', 'blw_produk', $array_insert);

        $get_produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();

        $array_insert_image = [
            'idproduk' => $get_produk->id, 
            'jenis' => 1, 
            'nama' => $foto, 
            'tgl' => date('Y-m-d H:i:s')
        ];

        Modules::run('database/insert', 'blw_upload', $array_insert_image);

        $redirect = base_url('admin/product');
        echo json_encode(['status' => TRUE, 'redirect' => $redirect]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $nama       = $this->input->post('nama');
        $harga      = $this->input->post('harga');
        $aturan     = $this->input->post('aturan');
        $deskripsi  = $_POST['deskripsi'];
        $manfaat    = $_POST['manfaat'];

        $array_update = [
            'tglbuat' => date('Y-m-d H:i:s'),
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'aturan' => $aturan,
            'manfaat' => $manfaat,
        ];

        $merk_photo = $this->upload_image_merk('update');

        if($merk_photo != '') {
            $merk_photo = ["merk_photo" => $merk_photo];
            $array_update = array_merge($array_update, $merk_photo);
        }

        Modules::run('database/update', 'blw_produk', ['id' => $id], $array_update);

        $foto = $this->upload_image('update');

        if ($foto != '') {
            $array_foto = ["nama" => $foto];
            Modules::run('database/update', 'blw_upload', ['idproduk' => $id], $array_foto);
        }

        $redirect = base_url('admin/product');
        echo json_encode(['status' => TRUE, 'redirect' => $redirect]);
    }

    private function upload_image($method = 'save')
    {
        $config['upload_path']          = realpath(APPPATH . '../assets/images/uploads');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if ($method == 'save') {
            if (!$this->upload->do_upload('image')) //upload and validate
            {
                $data['inputerror'][] = 'image';
                $data['error_string'][] = 'Gambar belum di upload'; //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            } else {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                return $image_name;
            }
        } else {
            if (!$this->upload->do_upload('image')) //upload and validate
            {
                return '';
            } else {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                return $image_name;
            }
        }
    }
    private function upload_image_merk($method = 'save')
    {
        $config['upload_path']          = realpath(APPPATH . '../assets/images/uploads');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
            if (!$this->upload->do_upload('merk')) //upload and validate
            {
                return '';
            } else {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                return $image_name;
            }
    }
}
