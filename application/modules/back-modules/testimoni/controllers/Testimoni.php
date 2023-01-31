<?php defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends BackendController
{

    protected $module_name = 'testimoni';
    protected $module_directory = 'testimoni';
    protected $module_js = ['testimoni'];
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
        $this->app_data['list_produk']  = Modules::run('database/get_all', 'blw_produk')->result();
        $this->app_data['page_title']   = 'Testimoni';
        $this->app_data['view_file']    = 'main_view';
        echo Modules::run('template/main_layout', $this->app_data);
    }

    public function list_data()
    {
        $id = $this->input->post('id');
        if (!$id) {
            $array_query = [
                "select" => "a.*, b.nama as nama_produk, c.nama as filename",
                "from" => "blw_testimoni a",
                "join" => [
                    "blw_produk b, a.id_produk = b.id, left",
                    "blw_upload c, b.id = c.idproduk, left"
                ]
            ];
            $get_all = Modules::run('database/get', $array_query)->result();

            $no = 0;
            $data = [];
            foreach($get_all as $value) {
                $id_encrypt = $this->encryption->encrypt($value->id);

                $produk = "";
                if($value->nama_produk) {
                    $produk = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama_produk' data-img='" . base_url('assets/images/uploads/') . $value->filename . "' class='btn btn-success'>$value->nama_produk</a>";
                }

                $status = "<button class='btn btn-sm btn-danger change_to_active' data-id='" . $id_encrypt . "'>Tidak Aktif</button>";
                if($value->status) {
                    $status = "<button class='btn btn-sm btn-success change_to_not_active' data-id='" . $id_encrypt . "'>Aktif</button>";
                }

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $value->nama;
                $row[] = "<a href='#' data-toggle='modal' data-target='#imageModal' data-title='$value->nama' data-img='" . base_url('assets/images/uploads/') . $value->foto . "'><img src='" . base_url('assets/images/uploads/') . $value->foto . "' style='height: 100px; width: auto' /></a>";
                $row[] = $produk;
                $row[] = $value->komentar;
                $row[] = $status;
                $row[] = " <button class='btn btn-warning btn-sm btn_edit' data-id='$id_encrypt'><i class='ri-ball-pen-line'></i> Edit</button>
                <button class='btn btn-danger btn-sm btn_delete' data-id='$id_encrypt'><i class='ri-delete-bin-line'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = ["data" => $data];
        } else {
            $id = $this->encryption->decrypt($id);
            $data = Modules::run('database/find', 'blw_testimoni', ['id' => $id])->row();

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

        Modules::run('database/delete', 'blw_testimoni', ['id' => $id]);

        echo json_encode(['status' => TRUE]);
    }

    public function update_status() {
        $id         = $this->encryption->decrypt($this->input->post('id'));
        $status     = $this->input->post('status');

        $array_update = [
            'status' => $status
        ];
        Modules::run('database/update', 'blw_testimoni', ['id' => $id], $array_update);
        echo json_encode(['status' => true]);
    }

    private function validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'nama';
            $data['status'] = FALSE;
        }
        if ($this->input->post('jabatan') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'jabatan';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_produk') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'id_produk';
            $data['status'] = FALSE;
        }
        if ($this->input->post('komentar') == '') {
            $data['error_string'][] = 'Harus Diisi';
            $data['inputerror'][] = 'komentar';
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
        $nama       = $this->input->post('nama');
        $jabatan    = $this->input->post('jabatan');
        $id_produk  = $this->input->post('id_produk');
        $komentar   = $this->input->post('komentar');

        $foto = $this->upload_image();

        $array_insert = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'id_produk' => $id_produk,
            'komentar' => $komentar,
            'foto' => $foto,
            'status' => 1,
            'tgl' => date('Y-m-d h:i:s')
        ];

        Modules::run('database/insert', 'blw_testimoni', $array_insert);

        echo json_encode(['status' => TRUE]);
    }

    public function update()
    {
        $this->validate();
        $id = $this->encryption->decrypt($this->input->post('id'));
        $nama       = $this->input->post('nama');
        $jabatan    = $this->input->post('jabatan');
        $id_produk  = $this->input->post('id_produk');
        $komentar   = $this->input->post('komentar');

        $array_update = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'id_produk' => $id_produk,
            'komentar' => $komentar,
        ];

        $foto = $this->upload_image();
        if ($foto !== '') {
            $foto = ["foto" => $foto];
            $array_update = array_merge($array_update, $foto);
        }

        Modules::run('database/update', 'blw_testimoni', ['id' => $id], $array_update);

        echo json_encode(['status' => TRUE]);
    }

    private function upload_image()
    {
        $config['upload_path']          = realpath(APPPATH . '../assets/images/uploads');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) //upload and validate
        {
            return '';
        } else {
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];
            return $image_name;
        }
    }
}
