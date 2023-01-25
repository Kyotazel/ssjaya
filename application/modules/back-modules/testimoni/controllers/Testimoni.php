<?php defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends BackendController
{

    protected $module_name = 'testimoni';
    protected $module_directory = 'testimoni';
    protected $module_js = ['testimoni'];
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
        $this->app_data['category']     = Modules::run('database/get_all', 'app_menu_category')->result();
        $this->app_data['group']        = Modules::run('database/find', 'app_menu', ['is_group' => 1])->result();
        $this->app_data['page_title']   = 'Testimoni';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $get_all = Modules::run('database/get_all', 'app_menu')->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);
                $get_type = Modules::run('database/find', 'app_menu_category', ['id' => $value->menu_type])->row();

                $get_menu = Modules::run('database/find', 'app_menu', ['id' => $value->group])->row();

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->name;
                $row[] = $value->link;
                $row[] = "<i class='$value->icon' style='font-size: 20px'></i>";
                $row[] = ($get_menu) ? $get_menu->name : '';
                $row[] = "<h5><span class='badge bg-secondary'>$get_type->name</span></h5>";
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'app_menu', ['id' => $id])->row();

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

        Modules::run('database/delete', 'app_menu', ['id' => $id]);

        echo json_encode(['status' => TRUE]);
    }

    public function update_status() {
        $id       = $this->encryption->decrypt($this->input->post('id'));
        $status   = $this->input->post('status');
        $field    = $this->input->post('field');

        if ($field == 'status') {
            $array_update = ['is_active' => $status];
        }
        Modules::run('database/update', 'app_menu_category', ['id' => $id], $array_update);
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
        if ($this->input->post('menu_type') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'menu_type';
            $data['status'] = FALSE;
        }
        if ($this->input->post('is_group') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'is_group';
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
        $name       = $this->input->post('name');
        $link       = $this->input->post('link');
        $icon       = $this->input->post('icon');
        $menu_type  = $this->input->post('menu_type');
        $is_group   = $this->input->post('is_group');

        if(empty($this->input->post('group'))) {
            $group = null;
        } else {
            $group = $this->input->post('group');
        }

        $array_insert = [
            'name' => $name,
            'link' => $link,
            'icon' => $icon,
            'group' => $group,
            'menu_type' => $menu_type,
            'is_group' => $is_group,
            'created_by' => $this->session->userdata('us_id'),
            'id_credential' => 1
        ];

        Modules::run('database/insert', 'app_menu', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $name       = $this->input->post('name');
        $link       = $this->input->post('link');
        $icon       = $this->input->post('icon');
        $menu_type  = $this->input->post('menu_type');
        $is_group   = $this->input->post('is_group');

        if(empty($this->input->post('group'))) {
            $group = null;
        } else {
            $group = $this->input->post('group');
        }

        $array_update = [
            'name' => $name,
            'link' => $link,
            'icon' => $icon,
            'group' => $group,
            'menu_type' => $menu_type,
            'is_group' => $is_group,
            'id_credential' => 1,
            "updated_date"  => date('Y-m-d H:i:s'),
            "updated_by"    => $this->session->userdata('us_id')
        ];

        Modules::run('database/update', 'app_menu', ['id' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }
}
