<?php

class Shopping_car extends CI_Controller
{
    private string $base_url;
    private int $per_page;
    private int $page;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('clients/shopping_car/shopping_car_model');
        $this->load->library('session');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
        $this->load->library('pagination/pagination_library');

        $this->base_url = 'http://localhost/ecommerceIgniter/clients/shopping_car/shopping_car/index/';
        $this->pagination_library->set_base_url($this->base_url);
        $this->_check_auth();
    }


    public function index()
    {
        $data['title'] = 'Carrito de compras';
        $is_there_products = $this->shopping_car_model->is_there_products_in_shopping_car($this->sessions_library->get_user_id());

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
            $this->_initiate_pagination();
            $data['products_in_car'] = $this->shopping_car_model->get_product_in_shopping_car($this->sessions_library->get_user_id(), $this->per_page, $this->page);
            $data['total'] = $this->shopping_car_model->get_total_to_pay_by_shopping_car($this->sessions_library->get_user_id());
            $data['links'] = $this->pagination_library->get_links();
            $this->load->view('clients/shopping_car/shopping_car_list', $data);
        } else {
            $this->load->view('clients/shopping_car/feedback/show_msg_not_products_in_car');
        }
    }

    public function add_product_to_car($product_id)
    {
        $client_id = $this->sessions_library->get_user_id();
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
            'client_id' => $this->sessions_library->get_user_id(),
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

    private function _check_auth()
    {
        if (!$this->sessions_library->check_login_in()) {
            redirect('client_login');
        } else if (!$this->sessions_library->check_client_role()) {
            redirect('products');
        }
    }

    private function _initiate_pagination()
    {
        $this->pagination_library->set_uri_segment(5);
        $count_products = $this->shopping_car_model->count_products_by_client($this->sessions_library->get_user_id());
        $this->pagination_library->set_pagination_config($count_products);
        $this->per_page = $this->pagination_library->get_per_page();
        $this->page = $this->pagination_library->get_uri_segment();
    }
}
