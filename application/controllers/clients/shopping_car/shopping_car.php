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

    public function add_product_to_car($product_id)
    {
        $client_id = $this->session->id;
        $amount = $this->input->post('amount');
        $data = array('client_id' => $client_id, 'product_id' => $product_id, 'product_amount' => $amount);

        if ($this->check_duplicate_product_in_car($client_id, $product_id)) {
            $this->increce_amount_of_duplicate_product_in_car($data);
        } else {
            $this->add_new_product_to_car($data);
        }
    }

    private function increce_amount_of_duplicate_product_in_car($data)
    {
        if ($this->shopping_car_model->increce_amount_of_duplicate_product_in_car($data)) {
            $this->session->set_flashdata('sucessfully_alert', 'El Producto esta duplicado');
            redirect('product/' . $data['product_id']);
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! Algo salio mal! No pudimos agregar tu producto');
            redirect('product/' . $data['product_id']);
        }
    }

    private function add_new_product_to_car($data)
    {
        if ($this->shopping_car_model->add_product_to_car($data)) {
            $this->session->set_flashdata('sucessfully_alert', 'Producto agregado al carrito con exito');
            redirect('product/' . $data['product_id']);
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! Algo salio mal! No pudimos agregar tu producto');
            redirect('product/' . $data['product_id']);
        }
    }

    private function check_duplicate_product_in_car($client_id, $product_id)
    {
        if ($this->shopping_car_model->check_duplicate_product_in_car($client_id, $product_id)) {
            return true;
        } else {
            return false;
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
