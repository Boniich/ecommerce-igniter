<?php

class Client_product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/client_product_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Products';
        $data['products'] = $this->client_product_model->get_all_products();
        $this->load->view('head/head', $data);
        $this->load->view('clients/show_products_index');
        $this->load->view('clients/show_product_list');
    }

    public function get_product_details($id)
    {
        $data['product'] = $this->client_product_model->get_one_product($id);
        $data['title'] = $data['product'][0]['name'];
        $this->load->view('head/head', $data);
        $this->load->view('clients/show_product_details');
    }
}
