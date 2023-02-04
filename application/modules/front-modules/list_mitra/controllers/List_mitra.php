<?php defined('BASEPATH') or exit('No direct script access allowed');

class List_mitra extends BackendController
{

    protected $module_name = 'list_mitra';
    protected $module_directory = 'list_mitra';
    protected $module_js = ['list_mitra'];
    protected $app_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->_init();
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
        $this->app_data['page_title']   = 'List Mitra';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function mitra()
    {
        $city = $this->input->post('city');
        $apotek = $this->input->post('apotek');

        $array_data = [
            'select' => "a.*, b.nama as nama_sales",
            "from" => "sales_apotek a",
            'join' => [
                'sales_user b, a.id_sales = b.id_sales, left'
            ],
            "where" => "kota = '$city' AND nama_apotek LIKE '%$apotek%'"
        ];

        $get_data = Modules::run('database/get', $array_data)->result();

        $html = "";
        if($get_data) {
            $html .= '<ul class="splide__list">';
            foreach($get_data as $value) {
                $html .= "<li class='splide__slide'>
                <div class='mitra_list d-flex flex-column'>
                    <div class='main d-flex flex-column justify-content-between'>
                        <h4 class='main_title'>" . strtoupper($value->nama_apotek) . "</h4>
                        <p style='text-align: center; font-style: italic; font-size: 18px'>$value->alamat.</p><br>
                        <p style='text-align: left; font-size: 16px; font-style: italic; color: black'><b>Produk</b> : </p>
                        <p style='text-align: left; font-size: 15px: font-style: italic'>$value->produk</p>
                    </div>
                </div>
            </li>";
            }
            $html .= "</ul>";
            echo json_encode(['status' => true, 'html_mitra' => $html]);
        } else {
            $html = "<h2 style='text-align: center'>Data Tidak Ditemukan</h2>";
            echo json_encode(['html_mitra' => $html]);
        }

    }
}
