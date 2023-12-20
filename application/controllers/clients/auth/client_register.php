<?php

class Client_register extends CI_Controller
{
    private array $userData;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/auth/client_register_model');
        $this->load->model('clients/auth/client_login_model');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/client_auth/client_register');
    }

    public function do_client_register()
    {
        $is_data_valid = $this->_take_register_data();

        if ($is_data_valid) {
            if ($this->client_register_model->register($this->userData)) {
                if ($this->client_login_model->login($this->userData['email'])) {
                    $id = $this->client_login_model->get_client_id();
                    $this->sessions_library->authenticate_client($id);
                    redirect('products');
                }
            }
        }
    }

    private function _take_register_data()
    {
        $full_name = $this->input->post('full_name');
        $dni = $this->input->post('dni');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($full_name === '' || $dni === '' || $email === '' || $password === '') {
            $this->_get_fields_empty_error();
        } else if ($this->client_register_model->check_email($email)) {
            $this->_get_email_already_taked_error();
        } else if ($this->client_register_model->check_dni($dni)) {
            $this->_get_dni_already_taked_error();
        } else {
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $this->userData = array('full_name' => $full_name, 'dni' => $dni, 'email' => $email, 'password' => $password_hashed);
            return true;
        }
    }

    private function _get_fields_empty_error()
    {
        $data['error_message'] = 'Uno o mas campos requeridos estan vacios!';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
    }

    private function _get_email_already_taked_error()
    {
        $data['error_message'] = 'Este email ya esta registrado! Intenta con otro!';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
    }

    private function _get_dni_already_taked_error()
    {
        $data['error_message'] = 'Este DNI ya esta registrado';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
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
