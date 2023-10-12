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
        $this->load->view('auth/client_auth/client_register');
    }

    public function do_client_register()
    {
        $is_data_valid = $this->_take_register_data();

        if ($is_data_valid) {
            if ($this->client_register_model->register($this->userData)) {
                redirect('products');
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
            $this->userData = array('full_name' => $full_name, 'dni' => $dni, 'email' => $email, 'password' => $password);
            return true;
        }
    }

    private function _get_fields_empty_error()
    {
        $data['error_message'] = 'One or more Required field are empty!';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->load->view('navs/auth_nav/auth_nav');
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
    }

    private function _get_email_already_taked_error()
    {
        $data['error_message'] = 'Este email ya esta registrado! Intenta con otro!';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->load->view('navs/auth_nav/auth_nav');
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
    }

    private function _get_dni_already_taked_error()
    {
        $data['error_message'] = 'Este DNI ya esta registrado';
        $data['title'] = 'Registro de clientes';
        $this->load->view('head/head', $data);
        $this->load->view('navs/auth_nav/auth_nav');
        $this->load->view('auth/client_auth/client_register', $data);
        return false;
    }
}
