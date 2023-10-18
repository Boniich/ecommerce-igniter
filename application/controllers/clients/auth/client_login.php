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
    }

    public function index()
    {
        $this->_check_auth();

        $data['title'] = 'Ingreso de Clientes';
        $this->load->view('head/head', $data);
        $this->load->view('navs/unauthenticated_nav/unauthenticated_nav');
        $this->load->view('auth/client_auth/client_login');
    }

    public function do_login()
    {

        $this->_check_auth();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->client_login_model->login($email, $password)) {
            $this->_set_auth_data();
            redirect('products');
        } else {
            $data['error_message'] = 'Email o contraseña incorrectas!';
            $data['title'] = 'Ingreso de Clientes';
            $this->load->view('head/head', $data);
            $this->load->view('navs/unauthenticated_nav/unauthenticated_nav');
            $this->load->view('auth/client_auth/client_login');
        }
    }

    public function logout()
    {
        if ($this->session->login_in && $this->session->role === 'client') {
            session_destroy();
            redirect('client_login');
        } else {
            redirect('products');
        }
    }

    private function _set_auth_data()
    {
        $id = $this->client_login_model->_get_client_id();
        $auth_data = array('id' => $id, 'login_in' => true, 'role' => 'client');
        $this->session->set_userdata($auth_data);
    }

    private function _check_auth()
    {
        $login_in = $this->session->login_in;
        $role = $this->session->role;

        if ($login_in && $role  === 'admin') {
            redirect('admin_panel/products');
        } else if ($login_in && $role == 'client') {
            redirect('products');
        }
    }
}
