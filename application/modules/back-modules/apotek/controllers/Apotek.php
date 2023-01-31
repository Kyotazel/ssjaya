<?php defined('BASEPATH') or exit('No direct script access allowed');

class Apotek extends BackendController
{

    protected $module_name = 'apotek';
    protected $module_directory = 'apotek';
    protected $module_js = ['apotek'];
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
        $this->app_data['list_sales']   = Modules::run('database/get_all', 'sales_user')->result();
        $this->app_data['page_title']   = 'Apotek';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $array_get = [
                "select" => "a.*, b.nama as nama_sales",
                "from" => "sales_apotek a",
                "join" => [
                    "sales_user b, a.id_sales = b.id_sales, left"
                ],
            ];
            $get_all = Modules::run('database/get', $array_get)->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id_apotek);

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->nama_apotek;
                $row[] = $value->alamat;
                $row[] = $value->kota;
                $row[] = $value->nama_sales;
                $row[] = $value->produk;
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'sales_apotek', ['id_apotek' => $id])->row();

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

        Modules::run('database/delete', 'sales_apotek', ['id_apotek' => $id]);

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

        if ($this->input->post('nama_apotek') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'nama_apotek';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_sales') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'id_sales';
            $data['status'] = FALSE;
        }
        if ($this->input->post('kota') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'kota';
            $data['status'] = FALSE;
        }
        if ($this->input->post('alamat') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'alamat';
            $data['status'] = FALSE;
        }
        if ($this->input->post('produk') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'produk';
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
        $nama_apotek        = $this->input->post('nama_apotek');
        $id_sales           = $this->input->post('id_sales');
        $kota               = $this->input->post('kota');
        $alamat             = $this->input->post('alamat');
        $produk             = $this->input->post('produk');

        $array_insert = [
            'nama_apotek' => $nama_apotek,
            'id_sales'  => $id_sales,
            'kota' => $kota,
            'alamat' => $alamat,
            'produk' => $produk,
        ];

        Modules::run('database/insert', 'sales_apotek', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $nama_apotek        = $this->input->post('nama_apotek');
        $id_sales           = $this->input->post('id_sales');
        $kota               = $this->input->post('kota');
        $alamat             = $this->input->post('alamat');
        $produk             = $this->input->post('produk');

        $array_update = [
            'nama_apotek' => $nama_apotek,
            'id_sales'  => $id_sales,
            'kota' => $kota,
            'alamat' => $alamat,
            'produk' => $produk,
        ];

        Modules::run('database/update', 'sales_apotek', ['id_apotek' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }
}
