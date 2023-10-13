<?php
class Client_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/auth/client_login_model');
        $this->load->library('session');

        if ($this->session->login_in && $this->session->role === 'admin') {
            redirect('admin_panel/products');
        } else if ($this->session->login_in && $this->session->role === 'client') {
            redirect('products');
        }
    }

    public function index()
    {
        $data['title'] = 'Client Login';
        $this->load->view('head/head', $data);
        $this->load->view('navs/auth_nav/auth_nav');
        $this->load->view('auth/client_auth/client_login');
    }

    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->client_login_model->login($email, $password)) {
            $this->_set_auth_data();
            redirect('products');
        } else {
            $data['error_message'] = 'Invalid username or password';
            $data['title'] = 'Client Login';
            $this->load->view('head/head', $data);
            $this->load->view('navs/auth_nav/auth_nav');
            $this->load->view('auth/client_auth/client_login');
        }
    }

    private function _set_auth_data()
    {
        $id = $this->client_login_model->get_client_id();
        $auth_data = array('id' => $id, 'login_in' => true, 'role' => 'client');
        $this->session->set_userdata($auth_data);
    }
}
