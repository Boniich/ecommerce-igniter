<?php

class Admin_panel_client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_client_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Clients';
        $data['clients'] = $this->admin_client_model->get_all_clients();
        $this->load->view('head/head', $data);
        $this->load->view('admin_panel/clients/admin_clients_index');
        $this->load->view('admin_panel/clients/show_clients_table');
    }
}
