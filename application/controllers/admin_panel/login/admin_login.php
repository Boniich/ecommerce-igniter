<?php
class Admin_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_panel/auth/admin_login_model');
        $this->load->library('session');
        $this->load->library('nav_library');
    }

    public function index()
    {
        $this->_check_auth();

        $data['title'] = 'Ingreso de Admin';
        $this->load->view('head/head', $data);
        $this->nav_library->load_unauthenticated_nav();
        $this->load->view('auth/admin_auth/admin_login');
    }

    public function do_login()
    {
        $this->_check_auth();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->admin_login_model->login($email, $password)) {
            $id = $this->admin_login_model->get_admin_id();
            $this->_set_auth_data($id);
            redirect('admin_panel/products');
        } else {
            $data['error_message'] = 'Email o contraseña incorrectas!';
            $data['title'] = 'Ingreso de Admin';
            $this->load->view('head/head', $data);
            $this->nav_library->load_unauthenticated_nav();
            $this->load->view('auth/admin_auth/admin_login', $data);
        }
    }

    private function _set_auth_data($id)
    {
        $auth_data = array('id' => $id, 'login_in' => true, 'role' => 'admin');
        $this->session->set_userdata($auth_data);
    }

    public function logout()
    {
        if ($this->session->login_in && $this->session->role === 'admin') {
            session_destroy();
            redirect('admin_login');
        } else {
            redirect('products');
        }
    }

    private function _check_auth()
    {
        if ($this->session->login_in) {
            redirect('admin_panel/products');
        }
    }
}
