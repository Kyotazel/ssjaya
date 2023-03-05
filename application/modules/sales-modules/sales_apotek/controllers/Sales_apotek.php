<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sales_apotek extends BackendController
{

    protected $module_name = 'sales_apotek';
    protected $module_directory = 'sales_apotek';
    protected $module_js = ['sales_apotek'];
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
        $array_city = [
            'select' => 'DISTINCT(kota)',
            'from' => 'sales_apotek',
            'order_by' => 'kota'
        ];
        $this->app_data['list_city'] = Modules::run('database/get', $array_city)->result();
        $this->app_data['list_product'] = Modules::run('database/get_all', 'blw_produk')->result();
        $this->app_data['page_title']   = 'Sales Apotek';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        $id_sales = $this->session->userdata('sales_id');
        $city = $this->input->post('filter_city');
        $product = $this->input->post('filter_product');
        if (!$id) {
            $where = "a.id_sales = '$id_sales'";
            if($city) {
                $where .= " AND kota = '$city'";
            }
            if($product) {
                $where .= " AND produk LIKE '%$product%'";
            }
            $array_get = [
                "select" => "a.*",
                "from" => "sales_apotek a",
                "where" => $where
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

    private function validate($method = 'save') {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama_apotek') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'nama_apotek';
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
        if (($this->input->post('product[]') == '') && ($method == 'save')) {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'product[]';
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
        $id_sales           = $this->session->userdata('sales_id');
        $nama_apotek        = $this->input->post('nama_apotek');
        $kota               = $this->input->post('kota');
        $alamat             = $this->input->post('alamat');

        $count =  count($this->input->post('product'));
        $products = '';
        foreach($this->input->post('product') as $key => $product) {
            if($count - 1 != $key) {
                $products .= $product . ", ";
            } else {
                $products .= $product;
            }
        }

        $array_insert = [
            'nama_apotek' => $nama_apotek,
            'id_sales'  => $id_sales,
            'kota' => $kota,
            'alamat' => $alamat,
            'produk' => $products,
        ];

        Modules::run('database/insert', 'sales_apotek', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $nama_apotek        = $this->input->post('nama_apotek');
        $kota               = $this->input->post('kota');
        $alamat             = $this->input->post('alamat');

        $count =  count($this->input->post('product'));
        $products = '';
        foreach($this->input->post('product') as $key => $product) {
            if($count - 1 != $key) {
                $products .= $product . ", ";
            } else {
                $products .= $product;
            }
        }

        $array_update = [
            'nama_apotek' => $nama_apotek,
            'kota' => $kota,
            'alamat' => $alamat,
            'produk' => $products,
        ];

        Modules::run('database/update', 'sales_apotek', ['id_apotek' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }
}
