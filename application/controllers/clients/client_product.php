<?php

class Client_product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/client_product_model');
        $this->load->library('nav_library');
    }

    public function index()
    {
        $data['title'] = 'Productos';
        $data['products'] = $this->client_product_model->get_all_products();
        $this->load->view('head/head', $data);
        $this->nav_library->load_common_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('clients/show_products_index');
        $this->load->view('clients/show_product_list');
    }

    public function get_product_details($id)
    {
        $data['product'] = $this->client_product_model->get_one_product($id);
        $data['title'] = $data['product'][0]['name'];
        $this->load->view('head/head', $data);
        $this->nav_library->load_common_nav();
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('clients/show_product_details');
    }
}
