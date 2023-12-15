<?php

class Admin_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
        $this->load->model('admin_panel/admin_data_model');

        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Ajustes';
        $data['admin_data'] = $this->admin_data_model->get_admin($this->sessions_library->get_user_id());
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('admin_panel/settings/admin/admin_settings_view');
    }

    public function index_password()
    {
        $data['title'] = 'Ajustes - Password';
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('admin_panel/settings/admin/admin_settings_password_view');
    }

    private function _check_auth()
    {
        if (!$this->sessions_library->check_login_in()) {
            redirect('admin_login');
        } else if ($this->sessions_library->check_login_in() && !$this->sessions_library->check_admin_role()) {
            redirect('products');
        }
    }
}
