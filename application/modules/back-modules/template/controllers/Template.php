<?php defined('BASEPATH') or exit('No direct script access allowed');

class Template extends BackendController
{
    public function main_layout($data)
    {
        $data['app_name']   = Modules::run('database/find', 'app_setting', ['key' => 'app_name'])->row();
        $data['app_copyright']   = Modules::run('database/find', 'app_setting', ['key' => 'app_copyright'])->row();
        $data['app_description']   = Modules::run('database/find', 'app_setting', ['key' => 'app_description'])->row();
        $data['html_main_menu'] = $this->side_menu($this->session->userdata('us_credential_menu'));
        $this->load->view("main_layout", $data);
    }

    public function login_layout($data)
    {
        $data['app_name']   = Modules::run('database/find', 'app_setting', ['key' => 'app_name'])->row();
        $data['app_copyright']   = Modules::run('database/find', 'app_setting', ['key' => 'app_copyright'])->row();
        $data['app_description']   = Modules::run('database/find', 'app_setting', ['key' => 'app_description'])->row();
        $this->load->view('login_layout', $data);
    }

    private function side_menu($menu_id) {
        // $menu       = $db->table('app_menu');
        // $category   = $db->table('menu_category');

        $get_category = Modules::run('database/find', 'app_menu_category', ['is_active' => 1])->result();

        $html = '';
        foreach ($get_category  as $parent) {
            if ($parent->id == 0) {
                $html .= '';
            } else{
                $html .= "<li class='menu-title side-item-category'><span>$parent->name</span></li>";
            }
            $get_menu = Modules::run('database/find', 'app_menu', ['id_credential' => $menu_id, 'menu_type' => $parent->id, 'group' => NULL])->result();
            foreach ($get_menu as $value) {

                if ($value->is_group == 0) {
                    $html .= "
                <li class='nav-item'>
                    <a href='". base_url('admin'.$value->link) ."' class='nav-link menu-link' data-url='" . base_url(PREFIX_CREDENTIAL_DIRECTORY . $value->link) . "'>
                        <i class='nav-icon fas $value->icon'></i>
                        <span>$value->name</span>";
                    $html .= "
                    </a>";
                } else {
                    $html .= "
                <li class='nav-item'>
                    <a href='#$value->link' class='nav-link menu-link' data-url='" . base_url(PREFIX_CREDENTIAL_DIRECTORY . $value->link) . "' data-bs-toggle='collapse' role='button' aria-expanded='false' aria-controls='sidebarDashboards'>
                        <i class='nav-icon fas $value->icon'></i>
                        <span>$value->name</span>
                    </a>";
                    $html .= "
                    <div class='collapse menu-dropdown' id='$value->link'>
                    <ul class='nav nav-sm flex-column'>";
                    foreach(Modules::run('database/find', 'app_menu', ['group' => $value->id])->result() as $child)
                    {
                            $html .= "
                        <li class='nav-item'>
                            <a href='". base_url('admin'.$child->link) ."' class='nav-link' data-url='" . $child->link . "'>
                              $child->name
                            </a>
                        </li>
                        ";
                    }
                    $html .= "</ul></div>";
                }

                $html .= "</li>";
            }
        }

        return $html;
    }
}
