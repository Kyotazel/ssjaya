<?php defined('BASEPATH') or exit('No direct script access allowed');

class Security extends BackendController
{

    protected $module = 'security';
    public function __construct()
    {
        parent::__construct();
        Modules::run('security/banned_url', $this->module);
    }

    public function banned_url($controller, $redirect = false)
    {
        $uri_1 = $this->uri->segment(1);

        if (strtolower($uri_1) == strtolower($controller)) {
            if ($redirect) {
                redirect($redirect);
            } else {
                // $this->is_logged();
            }
        }
    }

    public function common_security()
    {
        // $this->is_logged();
        $this->login_validation();
    }

    public function login_validation()
    {
        $token      = $this->session->userdata('us_token_login');
        $id_user    = $this->session->userdata('us_id');
        $get_data   = Modules::run('database/find', 'app_user', ['id' => $id_user])->row();

        if ($token == '' || !isset($get_data->token) || $get_data->token == '') {
            //create url
            $url = base_url('admin/login');
            redirect($url);
        }
    }
}