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

        $array_produk = [
            "select" => "a.*, b.nama as filename",
            "from" => "blw_produk a",
            "join" => [
                "blw_upload b, a.id = b.idproduk, left"
            ]
        ];

        $array_article = [
            "select" => "a.*, b.name as category_name, b.color as category_color",
            "from" => "blw_blog a",
            "join" => [
                "blw_blog_category b, a.id_category = b.id"
            ],
            "order_by" => "a.tgl, DESC",
            "limit" => 3
        ];

        $this->app_data['testimoni']    = Modules::run('database/get', $array_testimoni)->result();
        $this->app_data['produk']       = Modules::run('database/get', $array_produk)->result();
        $this->app_data['article']      = Modules::run('database/get', $array_article)->result();
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
