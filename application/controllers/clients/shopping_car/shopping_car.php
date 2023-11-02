<?php

class Shopping_car extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('clients/client_data_model');
        $this->load->library('session');

        if (!$this->session->login_in) {
            redirect('client_login');
        } else if ($this->session->role != 'client') {
            redirect('products');
        }
    }


    public function index()
    {
        $data['title'] = 'Carrito de compras';
        $this->load->view('head/head', $data);
        $this->load->view('navs/modals/exit_modal');
        $this->get_nav();
        $this->load->view('clients/shopping_car/shopping_car_index');
    }

    private function _get_client_data()
    {
        $id = $this->session->id;
        $data = $this->client_data_model->get_client($id);
        return $data;
    }

    function get_nav()
    {
        if ($this->session->role === "client") {
            $data['client'] = $this->_get_client_data();
            $this->load->view('navs/client_nav/client_nav', $data);
        }
    }
}
