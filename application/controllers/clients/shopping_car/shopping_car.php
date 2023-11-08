<?php

class Shopping_car extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('clients/client_data_model');
        $this->load->model('clients/shopping_car/shopping_car_model');
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
        $data['products_in_car'] = $this->shopping_car_model->get_product_in_shopping_car($this->session->id);
        $this->load->view('head/head', $data);
        $this->load->view('navs/modals/exit_modal');
        $this->get_nav();
        $this->load->view('clients/shopping_car/shopping_car_index');
        $this->load->view('clients/shopping_car/shopping_car_list');
    }

    public function add_product_to_car($product_id, $amount = 1)
    {
        $client_id = $this->session->id;
        $data = array('client_id' => $client_id, 'product_id' => $product_id, 'product_amount' => $amount);
        if ($this->shopping_car_model->add_product_to_car($data)) {
            $this->session->set_flashdata('sucessfully_alert', 'Producto agregado al carrito con exito');
            redirect('product/' . $product_id);
        }
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
