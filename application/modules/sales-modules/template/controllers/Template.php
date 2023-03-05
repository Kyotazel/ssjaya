<?php defined('BASEPATH') or exit('No direct script access allowed');

class Template extends BackendController
{
    public function main_layout($data)
    {
        $data['app_name']   = Modules::run('database/find', 'app_setting', ['key' => 'app_name'])->row();
        $data['app_copyright']   = Modules::run('database/find', 'app_setting', ['key' => 'app_copyright'])->row();
        $data['app_description']   = Modules::run('database/find', 'app_setting', ['key' => 'app_description'])->row();
        $data['html_main_menu'] = $this->side_menu($this->session->userdata('sales_credential_menu'));
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
                $html .= "<li class='nav-small-cap'><span class='hide-menu'>$parent->name</span></li>";
            }
            $get_menu = Modules::run('database/find', 'app_menu', ['id_credential' => $menu_id, 'menu_type' => $parent->id, 'group' => NULL])->result();
            foreach ($get_menu as $value) {

                if ($value->is_group == 0) {
                    $html .= "
                <li class='sidebar-item'>
                    <a href='". base_url('sales'.$value->link) ."' class='sidebar-link sidebar-link' data-url='" . base_url(PREFIX_CREDENTIAL_DIRECTORY . $value->link) . "' aria-expanded='false'>
                        <i class='$value->icon'></i>
                        <span class='hide-menu'>$value->name</span>";
                    $html .= "
                    </a>";
                } else {
                    $html .= "
                <li class='sidebar-item'>
                    <a href='#$value->link' class='sidebar-link has-arrow' data-url='" . base_url(PREFIX_CREDENTIAL_DIRECTORY . $value->link) . "' aria-expanded='false'>
                        <i class='$value->icon'></i>
                        <span class='hide-menu'>$value->name</span>
                    </a>";
                    $html .= "
                    <ul aria-expanded='false' class='collapse  first-level base-level-line'>";
                    foreach(Modules::run('database/find', 'app_menu', ['group' => $value->id])->result() as $child)
                    {
                            $html .= "
                        <li class='sidebar-item'>
                            <a href='". base_url('sales'.$child->link) ."' class='sidebar-link' data-url='" . $child->link . "'>
                              <span class='hide-menu'>$child->name</span>
                            </a>
                        </li>
                        ";
                    }
                    $html .= "</ul>";
                }

                $html .= "</li>";
            }
        }

        return $html;
    }
}
