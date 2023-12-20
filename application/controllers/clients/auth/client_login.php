<?php
class Client_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/auth/client_login_model');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
    }

    public function index()
    {
        $this->_check_auth();

        $data['title'] = 'Ingreso de Clientes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/client_auth/client_login');
    }

    public function do_login()
    {

        $this->_check_auth();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->client_login_model->login($email)) {

            $actual_password = $this->client_login_model->get_hashed_password();
            if (password_verify($password, $actual_password)) {
                $id = $this->client_login_model->get_client_id();
                $this->sessions_library->authenticate_client($id);
                redirect('products');
            } else {
                $data['error_message'] = 'La Contraseña es incorrecta';
                $data['title'] = 'Ingreso de Clientes';
                $this->load->view('head/head', $data);
                $this->nav_library->load_unauthenticated_nav();
                $this->load->view('auth/client_auth/client_login', $data);
            }
        } else {
            $data['error_message'] = 'Email es incorrecto';
            $data['title'] = 'Ingreso de Clientes';
            $this->load->view('head/head', $data);
            $this->nav_library->load_unauthenticated_nav();
            $this->load->view('auth/client_auth/client_login', $data);
        }
    }

    public function logout()
    {
        if ($this->sessions_library->check_login_in() && $this->sessions_library->check_client_role()) {
            session_destroy();
            redirect('client_login');
        } else {
            redirect('products');
        }
    }

    private function _check_auth()
    {
        if ($this->sessions_library->check_admin_role()) {
            redirect('admin_panel/products');
        } else if ($this->sessions_library->check_client_role()) {
            redirect('products');
        }
    }
}
