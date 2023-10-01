<?php

class Admin_product_panel extends CI_Controller
{

    private string $_path_view_folder = 'admin_panel/products/';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_product_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Products';
        $data['products'] = $this->admin_product_model->get_all_products();
        $this->load->view('head/head', $data);
        $this->load->view('admin_panel/products/admin_products_index');
        $this->load->view('admin_panel/products/show_products_table');
        $this->load->view($this->_path_view_folder . '/modals/create_product_modal');
        $this->load->view('admin_panel/products/modals/delete_product_modal');
    }

    public function delete_product($id)
    {
        $this->admin_product_model->delete_product($id);
        redirect('admin_panel/products');
    }
}
