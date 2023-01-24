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
        $token      = $this->session->userdata('us_token_login');

        if ($token != '') {
            //create url
            $url = base_url('admin');
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

        $get_user = Modules::run('database/find', 'app_user', ['username' => $username, 'is_delete' => 0, 'status' => 1])->row();
        $hash_password = hash('sha512', $password . config_item('encryption_key'));

        $status_login = TRUE;
        $html_respon = '';
        $token_id = '';

        if (!empty($get_user)) {
            if ($get_user->password == $hash_password) {
                $this->clear_attempt();

                $token_id = time();
                Modules::run('database/update', 'app_user', ['id' => $get_user->id], ['token' => $token_id]);

                $get_credential = Modules::run('database/find', 'app_credential', ['id' => $get_user->id_credential])->row();

                $session_data = [
                    'us_token_login'  => $token_id,
                    'us_credential'   => $get_user->id_credential,
                    'us_credetial_name' => isset($get_credential->name) ? $get_credential->name : '',
                    'us_credential_admin' => $get_user->is_admin,
                    'us_credential_menu' => isset($get_credential->id) ? $get_credential->id : '',
                    'us_credential_access' => ['create' => $get_user->access_create, 'update' => $get_user->access_update, 'delete' => $get_user->access_delete],
                    'us_id' => $get_user->id,
                    'us_image' => $get_user->image,
                    'us_name' => $get_user->name,
                    'last_check_admin' => time()
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
                $this->check_attempt();
                $status_login = FALSE;
            }
        } else {
            $html_respon = '
                    <div class="alert alert-danger alert-dismissible">
                        Username atau password salah!
                </div>
                ';
            $this->check_attempt();
            $status_login = FALSE;
        }
        echo json_encode(['status' => $status_login, 'token' => urlencode($token_id), 'attempt' => FALSE, 'error_login' => $html_respon, 'error_string' => [], 'inputerror' => []]);
    }

    private function clear_attempt()
    {
        $ip_address = $this->input->ip_address();
        Modules::run('database/delete', 'app_log_login', ['ip_address' => $ip_address]);
    }

    private function check_attempt()
    {
        $limit_attempt = 10;

        $ip_address = $this->input->ip_address();
        $check_attemp = Modules::run('database/find', 'app_log_login', ['ip_address' => $ip_address])->num_rows();
        if ($check_attemp >= $limit_attempt) {
            echo json_encode(['status' => FALSE, 'status_forgot_password' => TRUE]);
            die;
        } else {
            //insert data to attempt
            $array_insert = [
                'ip_address' => $ip_address
            ];
            Modules::run('database/insert', 'app_log_login', $array_insert);
            $this->session->set_flashdata('error_login', 'Username & password salah');
        }
    }

    public function logout()
    {
        Modules::run('security/login_validation');
        // Modules::run('security/token_validation');
        $token  = $this->input->get('token');
        $us_id  = $this->session->userdata('us_id');

        Modules::run('database/update', 'app_user', ['id' => $us_id], ['token' => '']);

        $session_data = [
            'us_token_login' ,
            'us_credential'  ,
            'us_credetial_name',
            'us_credential_admin',
            'us_credential_menu',
            'us_credential_access',
            'us_id',
            'us_image',
            'us_name',
            'last_check_admin'
        ];

        //update data log 
        // Modules::run('database/update', 'log_admin', ['id' => $id_log], $array_update_log);
        $this->session->unset_userdata($session_data);
        redirect(base_url('admin/login'));
    }
}
