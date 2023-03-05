<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BackendController
{

    protected $module_name = 'login';
    protected $module_directory = 'login';
    protected $module_js = ['login'];
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
        $token      = $this->session->userdata('sales_token_login');

        if ($token != '') {
            //create url
            $url = base_url('sales');
            redirect($url);
        }

        $this->app_data['page_title']   = 'Login';
        $this->app_data['app_name']   = Modules::run('database/find', 'app_setting', ['key' => 'app_name'])->row();
        $this->app_data['app_description']   = Modules::run('database/find', 'app_setting', ['key' => 'app_description'])->row();
        $this->app_data['app_copyright']   = Modules::run('database/find', 'app_setting', ['key' => 'app_copyright'])->row();
        $this->app_data['app_description']   = Modules::run('database/find', 'app_setting', ['key' => 'app_description'])->row();
        $this->app_data['view_file']    = 'login_view';
        echo Modules::run('template/login_layout', $this->app_data);
    }

    private function validate_login()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('username') == '') {
            $data['error_string'][] = 'harus diisi';
            $data['inputerror'][] = 'username';
            $data['status'] = FALSE;
        }
        if ($this->input->post('password') == '') {
            $data['error_string'][] = 'harus diisi';
            $data['inputerror'][] = 'password';
            $data['status'] = FALSE;
        }

        if ($data['status'] == FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function do_login()
    {
        $this->validate_login();
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $get_user = Modules::run('database/find', 'sales_user', ['id_sales' => $username])->row();
        $hash_password = md5(strtolower($password));

        $status_login = TRUE;
        $html_respon = '';
        $token_id = '';

        if (!empty($get_user)) {
            if ($get_user->password == $hash_password) {

                $token_id = time();

                $session_data = [
                    'sales_token_login'  => $token_id,
                    'sales_credetial_name' => 'sales',
                    'sales_credential_menu' => 2,
                    'sales_id' => $get_user->id_sales,
                    'sales_name' => $get_user->nama,
                ];

                $this->session->set_userdata($session_data);
                $status_login = TRUE;
                $token_id = $this->encryption->encrypt($token_id);
            } else {
                //check temp
                $html_respon = '
                    <div class="alert alert-danger alert-dismissible">
                        Login Gagal, Username atau password salah!
                    </div>
                ';
                $status_login = FALSE;
            }
        } else {
            $html_respon = '
                    <div class="alert alert-danger alert-dismissible">
                        Username atau password salah!
                </div>
                ';
            $status_login = FALSE;
        }
        echo json_encode(['status' => $status_login, 'token' => urlencode($token_id), 'attempt' => FALSE, 'error_login' => $html_respon, 'error_string' => [], 'inputerror' => []]);
    }

    public function logout()
    {
        Modules::run('security/login_validation');
        // Modules::run('security/token_validation');
        $token  = $this->input->get('token');
        $us_id  = $this->session->userdata('sales_id');

        $session_data = [
            'sales_token_login',
            'sales_credetial_name',
            'sales_credential_menu',
            'sales_id',
            'sales_name',
        ];

        //update data log 
        // Modules::run('database/update', 'log_admin', ['id' => $id_log], $array_update_log);
        $this->session->unset_userdata($session_data);
        redirect(base_url('sales/login'));
    }
}
