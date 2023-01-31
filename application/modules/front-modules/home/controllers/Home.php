<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends BackendController
{

    protected $module_name = 'home';
    protected $module_directory = 'home';
    protected $module_js = ['home'];
    protected $app_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->_init();
        // Modules::run('security/common_security');
    }

    private function _init()
    {
        $this->app_data['module_js'] = $this->module_js;
        $this->app_data['module_name'] = $this->module_name;
        $this->app_data['module_directory'] = $this->module_directory;
    }

    public function index()
    {
        $array_testimoni = [
            "select" => "a.*, b.nama as product_name, c.nama as filename",
            "from" => "blw_testimoni a",
            "join" => [
                "blw_produk b, a.id_produk = b.id, left",
                "blw_upload c, b.id = c.idproduk, left"
            ],
            "where" => 'a.status = 1'
        ];

        // $array_artikel = [

        // ]

        $this->app_data['testimoni']    = Modules::run('database/get', $array_testimoni)->result();
        $this->app_data['carousel']     = Modules::run('database/find', 'carousel', ['status' => 1])->result();
        $this->app_data['page_title']   = 'Beranda';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function consultation()
    {
        $this->app_data['module_js'] = [];
        $this->app_data['page_title']   = 'Konsultasi';
        $this->app_data['view_file']    = 'consultation';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function not_found()
    {
        $this->app_data['module_js'] = [];
        $this->app_data['page_title']   = 'Halaman Tidak Ditemukan';
        $this->app_data['view_file']    = 'not_found';
        echo Modules::run('template/main_layout', $this->app_data);
    }
}
