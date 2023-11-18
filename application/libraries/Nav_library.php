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
    }

    public function unauthenticated_nav()
    {
        $this->CI->load->view('navs/unauthenticated_nav/unauthenticated_nav');
    }
}
