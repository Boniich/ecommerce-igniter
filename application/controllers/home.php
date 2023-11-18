<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('home/home_product_model');
        $this->load->library('session');
        $this->load->library('nav_library');
    }

    public function index()
    {
        $data['title'] = 'Home - Ecommerce Igniter';
        $data['products'] = $this->home_product_model->get_products_home();
        $this->load->view('head/head', $data);
        $this->nav_library->load_common_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('home/home');
    }
}
