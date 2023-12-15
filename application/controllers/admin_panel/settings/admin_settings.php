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

        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Ajustes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('admin_panel/settings/admin_settings_view');
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
