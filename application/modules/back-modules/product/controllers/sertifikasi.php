<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends BackendController
{

    protected $module_name = 'product';
    protected $module_directory = 'product';
    protected $module_js = ['sertifikasi'];
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

    public function index($url)
    {
        $produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();
        $this->app_data['url']          = $url;
        $this->app_data['page_title']   = 'Sertifikasi ' . $produk->nama;
        $this->app_data['view_file']    = 'sertifikasi_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data($url)
    {
        $produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();
        $id = $this->input->post('id');
        if (!$id) {
            $get_all = Modules::run('database/find', 'blw_produk_has_sertifikasi', ['id_produk' => $produk->id])->result();

            $no = 0;
            $data = [];
            foreach ($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->image' data-img='" . base_url('assets/images/uploads/') . $value->image . "'><img src='" . base_url('assets/images/uploads/') . $value->image . "' style='height: 100px; width: auto' /></a>";
                $row[] = "<div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Action 
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <button class='dropdown-item btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                                <button class='dropdown-item btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>
                            </div>
                        </div>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'blw_produk_has_sertifikasi', ['id' => $id, 'id_produk' => $produk->id])->row();

            $output = array(
                "data" => $data,
                "status" => TRUE
            );
        }

        echo json_encode($output);
    }

    public function delete_data($url)
    {
        $produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();
        $id = $this->encryption->decrypt($this->input->post('id'));

        Modules::run('database/delete', 'blw_produk_has_sertifikasi', ['id' => $id, 'id_produk' => $produk->id]);

        echo json_encode(['status' => TRUE]);
    }

    private function validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($data['status'] == FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function save($url)
    {
        $this->validate();
        $produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();
        $image       = $this->upload_image();

        $array_insert = [
            'id_produk' => $produk->id,
            'image' => $image,
        ];

        Modules::run('database/insert', 'blw_produk_has_sertifikasi', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update($url)
    {
        $this->validate();
        $produk = Modules::run('database/find', 'blw_produk', ['url' => $url])->row();
        $id = $this->encryption->decrypt($this->input->post('id'));

        $array_update = [
            'id_produk' => $produk->id,
        ];

        
        $image = $this->upload_image('update');
        if ($image !== '') {
            $image = ["image" => $image];
            $array_update = array_merge($array_update, $image);
        }
        Modules::run('database/update', 'blw_produk_has_sertifikasi', ['id' => $id, 'id_produk' => $produk->id], $array_update);

        echo json_encode(['status' => TRUE]);
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
}
