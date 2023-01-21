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
        $this->app_data['page_title']   = 'List Mitra';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }
}
