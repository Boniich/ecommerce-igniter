<?php

class Admin_panel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Products';
        $data['products'] = $this->product_model->get_all_products();
        $this->load->view('head/head', $data);
        $this->load->view('admin_panel/products/admin_products_index');
        $this->load->view('admin_panel/products/show_products_table');
    }
}
