<?php

class Admin_product_panel extends CI_Controller
{

    private string $_path_view_folder = 'admin_panel/products/';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_product_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Products';
        $data['products'] = $this->admin_product_model->get_all_products();
        $this->load->view('head/head', $data);
        $this->load->view('admin_panel/products/admin_products_index');
        $this->load->view($this->_path_view_folder . 'feedback/product_create_successfully');
        $this->load->view('admin_panel/products/show_products_table');
        $this->load->view($this->_path_view_folder . '/modals/create_product_modal');
        $this->load->view('admin_panel/products/modals/delete_product_modal');
    }

    public function delete_product($id)
    {
        $this->admin_product_model->delete_product($id);
        redirect('admin_panel/products');
    }

    public function create_product()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $stock = $this->input->post('stock');
        $price = $this->input->post('price');
        $image = $this->_do_upload();

        $product = array(
            'name' => $name,
            'description' => $description,
            'stock' => $stock,
            'price' => $price,
            'image' => $image,
        );

        $this->admin_product_model->create_product($product);
        $this->session->set_flashdata('product_created', 'Producto creado exitosamente.');
        redirect('admin_panel/products');
    }

    private function _do_upload()
    {
        $config['upload_path'] = './uploads/products';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 200;
        $config['max_width'] = 500;
        $config['max_height'] = 400;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = 'products/' . $this->upload->data('file_name');
            return $image;
        }
    }
}
