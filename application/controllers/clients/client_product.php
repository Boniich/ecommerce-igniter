<?php

class Client_product extends CI_Controller
{
    private string $base_url;
    private int $per_page;
    private int $page;
    private int $count_products = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('clients/client_product_model');
        $this->load->library('nav_library');
        $this->load->library('pagination/pagination_library');

        $this->base_url = 'http://localhost/ecommerceIgniter/clients/client_product/index/';
        $this->pagination_library->set_base_url($this->base_url);
    }

    public function index()
    {
        $this->_initiate_pagination();

        $data['title'] = 'Productos';
        $data['products'] = $this->client_product_model->get_products($this->per_page, $this->page);
        $data['links'] = $this->pagination_library->get_links();
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


    private function _initiate_pagination()
    {
        $this->pagination_library->set_uri_segment(4);
        $this->count_products = $this->client_product_model->count_products();
        $this->pagination_library->set_pagination_config($this->count_products);
        $this->per_page = $this->pagination_library->get_per_page();
        $this->page = $this->pagination_library->get_uri_segment();
    }
}
