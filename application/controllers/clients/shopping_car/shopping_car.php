<?php

class Shopping_car extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('clients/shopping_car/shopping_car_model');
        $this->load->library('session');
        $this->load->library('nav_library');

        if (!$this->session->login_in) {
            redirect('client_login');
        } else if ($this->session->role != 'client') {
            redirect('products');
        }
    }


    public function index()
    {
        $data['title'] = 'Carrito de compras';
        $is_there_products = $this->shopping_car_model->is_there_products_in_shopping_car($this->session->id);
        $this->load->view('head/head', $data);
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('clients/shopping_car/modals/delete_product_from_shopping_car_model');
        $this->load->view('clients/shopping_car/modals/edit_product_from_shopping_car_modal');
        $this->nav_library->load_client_nav();
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->show_shopping_car_view($is_there_products);
    }

    private function show_shopping_car_view($is_there_products)
    {
        $this->load->view('clients/shopping_car/shopping_car_index');
        if ($is_there_products) {
            $data['products_in_car'] = $this->shopping_car_model->get_product_in_shopping_car($this->session->id);
            $data['total'] = $this->shopping_car_model->get_total_to_pay_by_shopping_car($this->session->id);
            $this->load->view('clients/shopping_car/shopping_car_list', $data);
        } else {
            $this->load->view('clients/shopping_car/feedback/show_msg_not_products_in_car');
        }
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
        $product_id = $data['product_id'];
        if ($this->shopping_car_model->is_product_stock_exceeded($data)) {
            $this->session->set_flashdata('error_alert', 'Se ha exido la cantidad disponible! No hemos podido agregar tu producto');
            redirect('product/' . $product_id);
        } else {
            $result = $this->shopping_car_model->increce_amount_of_duplicate_product_in_car($data);
            $this->dispach_alert($result, $product_id);
        }
    }

    private function add_new_product_to_car($data)
    {
        $product_id = $data['product_id'];
        $result = $this->shopping_car_model->add_product_to_car($data);
        $this->dispach_alert($result, $product_id);
    }

    private function check_duplicate_product_in_car($client_id, $product_id)
    {
        if ($this->shopping_car_model->check_duplicate_product_in_car($client_id, $product_id)) {
            return true;
        } else {
            return false;
        }
    }

    private function dispach_alert($result, $product_id)
    {
        if ($result) {
            $this->show_successfully_alert($product_id);
        } else {
            $this->show_error_alert($product_id);
        }
    }

    private function show_successfully_alert($product_id)
    {
        $this->session->set_flashdata('sucessfully_alert', 'Producto agregado al carrito con exito');
        redirect('product/' . $product_id);
    }

    private function show_error_alert($product_id)
    {
        $this->session->set_flashdata('error_alert', 'Ups! Algo salio mal! No pudimos agregar tu producto');
        redirect('product/' . $product_id);
    }

    public function update_product_from_shopping_car($product_id, $product_amount)
    {
        $data = array(
            'client_id' => $this->session->id,
            'product_id' => $product_id,
            'product_amount' => $product_amount
        );

        if ($this->shopping_car_model->update_product_from_shopping_car($data)) {
            $this->session->set_flashdata('sucessfully_alert', 'Producto actualizado con exito');
            redirect('shopping_car');
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! Algo salio mal! No pudimos actualizar el producto de tu carrito');
            redirect('shopping_car');
        }
    }

    public function delete_product_from_shopping_car($client_id, $product_id)
    {
        if ($this->shopping_car_model->delete_product_from_shopping_car($client_id, $product_id)) {
            $this->session->set_flashdata('sucessfully_alert', 'Producto eliminado de tu carrito con exito');
            redirect('shopping_car');
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! Algo salio mal! No pudimos eliminar el producto de tu carrito');
            redirect('shopping_car');
        }
    }
}
