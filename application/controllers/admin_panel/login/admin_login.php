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

        if ($this->session->login_in) {
            redirect('admin_panel/products');
        }
    }

    public function index()
    {
        $data['title'] = 'Admin Login';
        $this->load->view('head/head', $data);
        $this->load->view('navs/auth_nav/auth_nav');
        $this->load->view('auth/admin_auth/admin_login');
    }

    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->admin_login_model->login($email, $password)) {
            $id = $this->admin_login_model->get_admin_id();
            $this->_set_auth_data($id);
            redirect('admin_panel/products');
        } else {
            $data['error_message'] = 'Invalid username or password';
            $data['title'] = 'Admin Login';
            $this->load->view('head/head', $data);
            $this->load->view('navs/auth_nav/auth_nav');
            $this->load->view('auth/admin_auth/admin_login', $data);
        }
    }

    private function _set_auth_data($id)
    {
        $auth_data = array('id' => $id, 'login_in' => true, 'role' => 'admin');
        $this->session->set_userdata($auth_data);
    }
}
