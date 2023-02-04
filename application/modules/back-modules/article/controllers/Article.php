<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article extends BackendController
{

    protected $module_name = 'article';
    protected $module_directory = 'article';
    protected $module_js = ['article'];
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
        $this->app_data['page_title']   = 'Artikel';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $array_query = [
                "select" => "a.*, b.nama as nama_produk, c.nama as filename, d.name as category_name, d.color as category_color",
                "from" => "blw_blog a",
                "join" => [
                    "blw_produk b, a.id_produk = b.id, left",
                    "blw_upload c, b.id = c.idproduk, left",
                    'blw_blog_category d, a.id_category = d.id, left'
                ],
                'order_by' => 'a.tgl, DESC'
            ];
            $get_all = Modules::run('database/get', $array_query)->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $produk = "";
                if($value->nama_produk) {
                    $produk = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama_produk' data-img='" . base_url('assets/images/uploads/') . $value->filename . "' class='btn btn-success'>$value->nama_produk</a>";
                }

                $category = '';
                if($value->category_name) {
                    $category = "<p class='category_article' style='background-color: $value->category_color'>$value->category_name</p>";
                }

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->judul;
                $row[] = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->img' data-img='" . base_url('assets/images/uploads/') . $value->img . "'><img src='" . base_url('assets/images/uploads/') . $value->img . "' style='height: 100px; width: auto' /></a>";
                $row[] = $produk;
                $row[] = $category;
                $row[] = "<div class='dropdown'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Action 
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='" . base_url('admin/article/detail/' . $value->url) . "'><i class='fa fa-desktop'></i> Detail</a>
                                    <a class='dropdown-item' href='" . base_url('admin/article/edit/' . $value->url) . "'><i class='ri-ball-pen-line'></i> Edit</a>
                                    <button class='dropdown-item btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>
                                </div>
                            </div>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'blw_testimoni', ['id' => $id])->row();

            $output = array (
                "data" => $data,
                "status" => TRUE
            );
        }

        echo json_encode($output);
    }

    public function add()
    {
        $this->app_data['method']       = 'add';
        $this->app_data['list_category'] = Modules::run('database/get_all', 'blw_blog_category')->result();
        $this->app_data['list_produk'] = Modules::run('database/get_all', 'blw_produk')->result();
        $this->app_data['page_title']   = 'Tambah Artikel';
        $this->app_data['view_file']    = 'form_add';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function edit($slug)
    {
        $data_detail = Modules::run('database/find', 'blw_blog', ['url' => $slug])->row();
        $this->app_data['method']       = 'update';
        $this->app_data['data_detail']  = $data_detail;
        $this->app_data['id_encrypt']   = $this->encryption->encrypt($data_detail->id);
        $this->app_data['list_category'] = Modules::run('database/get_all', 'blw_blog_category')->result();
        $this->app_data['list_produk'] = Modules::run('database/get_all', 'blw_produk')->result();
        $this->app_data['page_title']   = 'Edit Artikel';
        $this->app_data['view_file']    = 'form_add';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function detail($url)
    {

        $array_query = [
            "select" => "a.*, b.nama as nama_produk, c.nama as filename, d.name as category_name",
                "from" => "blw_blog a",
                "join" => [
                    "blw_produk b, a.id_produk = b.id, left",
                    "blw_upload c, b.id = c.idproduk, left",
                    'blw_blog_category d, a.id_category = d.id, left'
                ],
                "where" => ['a.url' => $url]
        ];

        $this->app_data['detail']       = Modules::run('database/get', $array_query)->row();
        $this->app_data['page_title']   = 'Detail Artikel';
        $this->app_data['view_file']    = 'view_detail';
        echo Modules::run('template/main_layout', $this->app_data);
        
    }

    public function delete_data()
    {
        $id = $this->encryption->decrypt($this->input->post('id'));

        Modules::run('database/delete', 'blw_blog', ['id' => $id]);

        echo json_encode(['status' => TRUE]);
    }

    public function update_status() {
        $id         = $this->encryption->decrypt($this->input->post('id'));
        $status     = $this->input->post('status');

        $array_update = [
            'status' => $status
        ];
        Modules::run('database/update', 'blw_testimoni', ['id' => $id], $array_update);
        echo json_encode(['status' => true]);
    }

    private function validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('judul') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'judul';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_category') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'id_category';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_produk') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'id_produk';
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
        $judul       = $this->input->post('judul');
        $id_category    = $this->input->post('id_category');
        $id_produk  = $this->input->post('id_produk');
        $foto   = $this->upload_image();
        $url = str_replace(' ', '-', $judul);
        $konten = $_POST['konten'];

        $array_insert = [
            'tgl' => date('Y-m-d H:i:s'),
            'judul' => $judul,
            'konten' => $konten,
            'img' => $foto,
            'id_category' => $id_category,
            'id_produk' => $id_produk,
            'views' => 0,
            'url' => $url,
        ];

        Modules::run('database/insert', 'blw_blog', $array_insert);

        $redirect = base_url('admin/article');
        echo json_encode(['status' => TRUE, 'redirect' => $redirect]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $judul       = $this->input->post('judul');
        $id_category    = $this->input->post('id_category');
        $id_produk  = $this->input->post('id_produk');
        $url = str_replace(' ', '-', $judul);
        $konten = $_POST['konten'];

        $array_update = [
            'judul' => $judul,
            'konten' => $konten,
            'id_category' => $id_category,
            'id_produk' => $id_produk,
            'views' => 0,
            'url' => $url,
        ];

        $foto = $this->upload_image('update');

        if($foto != '') {
            $foto = ["img" => $foto];
            $array_update = array_merge($array_update, $foto);
        }

        Modules::run('database/update', 'blw_blog', ['id' => $id], $array_update);

        $redirect = base_url('admin/article');
        echo json_encode(['status' => TRUE, 'redirect' => $redirect]);
    }

    private function upload_image($method = 'save')
    {
        $config['upload_path']          = realpath(APPPATH . '../assets/images/uploads');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if($method == 'save') {
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
}
