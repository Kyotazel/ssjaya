<?php defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends BackendController
{

    protected $module_name = 'carousel';
    protected $module_directory = 'carousel';
    protected $module_js = ['carousel'];
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
        $this->app_data['page_title']   = 'Carousel';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $get_all = Modules::run('database/get_all', 'carousel')->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $status = "<button class='btn btn-sm btn-danger change_to_active' data-id='" . $id_encrypt . "'>Tidak Aktif</button>";
                if($value->status) {
                    $status = "<button class='btn btn-sm btn-success change_to_not_active' data-id='" . $id_encrypt . "'>Aktif</button>";
                }

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->photo' data-img='" . base_url('assets/images/uploads/') . $value->photo . "'><img src='" . base_url('assets/images/uploads/') . $value->photo . "' style='height: 100px; width: auto' /></a>";
                $row[] = $status;
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'carousel', ['id' => $id])->row();

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

        Modules::run('database/delete', 'carousel', ['id' => $id]);

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

        if ($data['status'] == FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function save()
    {
        $this->validate();

        $foto = $this->upload_image();

        $array_insert = [
            'photo' => $foto,
            'status' => 1,
        ];

        Modules::run('database/insert', 'carousel', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        
        $foto = $this->upload_image();
        $array_update = [
            'photo' => $foto,
        ];

        Modules::run('database/update', 'carousel', ['id' => $id], $array_update);

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
