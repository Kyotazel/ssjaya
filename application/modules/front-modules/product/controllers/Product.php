<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product extends BackendController
{

    protected $module_name = 'product';
    protected $module_directory = 'product';
    protected $module_js = ['product'];
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
        $this->app_data['page_title']   = 'Tentang Kami';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }
}
