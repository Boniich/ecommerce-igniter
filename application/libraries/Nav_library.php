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

    public function unauthenticated_nav()
    {
        $this->CI->load->view('navs/unauthenticated_nav/unauthenticated_nav');
    }

    public function load_client_nav()
    {
        if ($this->CI->session->role === "client") {
            $data['client'] = $this->_get_client_data();
            $this->CI->load->view('navs/client_nav/client_nav', $data);
        }
    }

    private function _get_client_data()
    {
        $id = $this->CI->session->id;
        $data = $this->CI->client_data_model->get_client($id);
        return $data;
    }
}
