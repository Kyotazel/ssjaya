<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article_category extends BackendController
{

    protected $module_name = 'article_category';
    protected $module_directory = 'article_category';
    protected $module_js = ['article_category'];
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
        $this->app_data['page_title']   = 'Kategori Artikel';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $get_all = Modules::run('database/get_all', 'blw_blog_category')->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->name;
                $row[] = "<p class='category_article' style='background-color: $value->color'>$value->color</p>";
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'blw_blog_category', ['id' => $id])->row();

            $output = array (
                "data" => $data,
                "status" => TRUE
            );
        }

        echo json_encode($output);
    }

    public function delete_data()
    {
        $id = $this->encryption->decrypt($this->input->post('id'));

        Modules::run('database/delete', 'blw_blog_category', ['id' => $id]);

        echo json_encode(['status' => TRUE]);
    }

    public function update_status() {
        $id         = $this->encryption->decrypt($this->input->post('id'));
        $status     = $this->input->post('status');

        $array_update = [
            'status' => $status
        ];
        Modules::run('database/update', 'carousel', ['id' => $id], $array_update);
        echo json_encode(['status' => true]);
    }

    private function validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('name') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'name';
            $data['status'] = FALSE;
        }
        if ($this->input->post('color') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'color';
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

        $name = $this->input->post('name');
        $color = $this->input->post('color');

        $array_insert = [
            'name' => $name,
            'color' => $color,
        ];

        Modules::run('database/insert', 'blw_blog_category', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        
        $name = $this->input->post('name');
        $color = $this->input->post('color');

        $array_update = [
            'name' => $name,
            'color' => $color,
        ];

        Modules::run('database/update', 'blw_blog_category', ['id' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }

    private function upload_image()
    {
        $config['upload_path']          = realpath(APPPATH . '../assets/images/uploads');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
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
    }
}
