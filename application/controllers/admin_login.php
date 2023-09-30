<?php
class Admin_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_login_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Login';
        $this->load->view('head/head', $data);
        $this->load->view('auth/admin_auth/admin_login');
    }

    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->admin_login_model->login($email, $password)) {
            redirect('admin_panel/products');
        } else {
            $data['error_message'] = 'Invalid username or password';
            $this->load->view('head/head');
            $this->load->view('auth/admin_auth/admin_login', $data);
        }
    }
}
