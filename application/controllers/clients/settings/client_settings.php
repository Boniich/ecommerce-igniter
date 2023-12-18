<?php

class Client_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->library('sessions/sessions_library');
        $this->load->library('session');
        $this->load->library('nav_library');
        $this->load->model('admin_panel/client_data_model');

        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Ajustes - Perfil';
        $data['client_data'] = $this->client_data_model->get_client_data_to_settings($this->sessions_library->get_user_id());
        $this->load->view('head/head', $data);
        $this->nav_library->load_client_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('clients/settings/client_settings_profile_view');
    }

    private function _check_auth()
    {
        if (!$this->sessions_library->check_login_in()) {
            redirect('client_login');
        } else if ($this->sessions_library->check_login_in() && !$this->sessions_library->check_client_role()) {
            redirect('products');
        }
    }
}
