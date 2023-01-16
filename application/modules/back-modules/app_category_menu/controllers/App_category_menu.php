<?php defined('BASEPATH') or exit('No direct script access allowed');

class App_category_menu extends BackendController
{

    protected $module_name = 'app_category_menu';
    protected $module_directory = 'app_category_menu';
    protected $module_js = ['app_category_menu'];
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
        $this->app_data['page_title']   = 'Kategori Menu';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $get_all = Modules::run('database/get_all', 'app_menu_category')->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);
                $active = $value->is_active ? 'checked' : '';

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->name;
                $row[] ='<div data-status="status" data-id="' . $id_encrypt . '" class="form-check form-switch form-switch-md mb-3 change_status text-center" dir="ltr">
                            <input type="checkbox" class="form-check-input" '. $active .'>
                        </div>';
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'app_menu_category', ['id' => $id])->row();

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

        Modules::run('database/delete', 'app_menu_category', ['id' => $id]);

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
        if ($data['status'] == FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function save()
    {
        $this->validate();
        $name = $this->input->post('name');

        $array_insert = [
            "name"  => $name,
            "created_date"  => date('Y-m-d H:i:s'),
            "created_by"    => $this->session->userdata('us_id')
        ];

        Modules::run('database/insert', 'app_menu_category', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $name = $this->input->post('name');

        $array_update = [
            "name"  => $name,
            "updated_date"  => date('Y-m-d H:i:s'),
            "updated_by"    => $this->session->userdata('us_id')
        ];

        Modules::run('database/update', 'app_menu_category', ['id' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }
}
