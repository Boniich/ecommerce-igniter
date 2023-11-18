<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nav_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('clients/client_data_model');
        $this->CI->load->model('admin_panel/admin_data_model');
        $this->CI->load->library('session');
    }

    public function load_unauthenticated_nav()
    {
        if (!$this->CI->session->login_in) {
            $this->CI->load->view('navs/unauthenticated_nav/unauthenticated_nav');
        }
    }

    public function load_client_nav()
    {
        if ($this->CI->session->role === "client") {
            $data['client'] = $this->_get_client_data();
            $this->CI->load->view('navs/client_nav/client_nav', $data);
        }
    }

    public function load_admin_nav()
    {
        if ($this->CI->session->role === "admin") {
            $data['admin'] = $this->_get_admin_data();
            $this->CI->load->view('navs/admin_nav/admin_nav', $data);
        }
    }

    public function load_common_nav()
    {
        $this->load_unauthenticated_nav();
        $this->load_client_nav();
        $this->load_admin_nav();
    }

    private function _get_client_data()
    {
        $id = $this->CI->session->id;
        $data = $this->CI->client_data_model->get_client($id);
        return $data;
    }

    private function _get_admin_data()
    {
        $id = $this->CI->session->id;
        $data = $this->CI->admin_data_model->get_admin($id);
        return $data;
    }
}
