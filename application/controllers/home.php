<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('home/home_product_model');
        $this->load->model('clients/client_data_model');
        $this->load->model('admin_panel/admin_data_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Products';
        $data['products'] = $this->home_product_model->get_products_home();
        $this->load->view('head/head', $data);
        $this->_get_nav();
        $this->load->view('home/home');
    }

    private function _get_client_data()
    {
        $id = $this->session->id;
        $data = $this->client_data_model->get_client($id);
        return $data;
    }

    private function _get_admin_data()
    {
        $id = $this->session->id;
        $data = $this->admin_data_model->get_admin($id);
        return $data;
    }

    private function _get_nav()
    {

        if (!$this->session->login_in) {
            $this->load->view('navs/unauthenticated_nav/unauthenticated_nav');
        }

        if ($this->session->role === "client") {
            $data['client'] = $this->_get_client_data();
            $this->load->view('navs/client_nav/client_nav', $data);
        }

        if ($this->session->role === "admin") {
            $data['admin'] = $this->_get_admin_data();
            $this->load->view('navs/admin_nav/admin_nav', $data);
        }
    }
}