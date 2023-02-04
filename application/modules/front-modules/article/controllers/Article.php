<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article extends BackendController
{

    protected $module_name = 'article';
    protected $module_directory = 'article';
    protected $module_js = ['article'];
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
        $array_article = [
            "select" => "a.*, b.name as category_name, b.color as category_color",
            "from" => "blw_blog a",
            "join" => [
                "blw_blog_category b, a.id_category = b.id"
            ],
            "order_by" => "a.tgl, DESC",
        ];
        $this->app_data['article']      = Modules::run('database/get', $array_article)->result();
        $this->app_data['page_title']   = 'Artikel';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function detail($slug)
    {
        $array_article = [
            "select" => "a.*, b.name as category_name, b.color as category_color",
            "from" => "blw_blog a",
            "join" => [
                "blw_blog_category b, a.id_category = b.id"
            ],
            "where" => ['url' => $slug]
        ];
        $data_detail = Modules::run('database/get', $array_article)->row();
        if($data_detail == NULL) {
            echo Modules::run('home/not_found');
            return;
        }
        $this->app_data['detail']       = $data_detail;
        $this->app_data['page_title']   = 'Detail Artikel';
        $this->app_data['view_file']    = 'detail_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function iframe($slug)
    {
        $array_article = [
            "select" => "a.*, b.name as category_name, b.color as category_color",
            "from" => "blw_blog a",
            "join" => [
                "blw_blog_category b, a.id_category = b.id"
            ],
            "where" => ['url' => $slug]
        ];
        $data_detail = Modules::run('database/get', $array_article)->row();
        echo $data_detail->konten;
    }

}
