<?php

class Admin_product_panel extends CI_Controller
{

    private string $_path_view_folder = 'admin_panel/products/';
    private string $base_url;
    private int $per_page;
    private int $page;
    private int $count_products = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_panel/products/admin_product_model');
        $this->load->library('session');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
        $this->load->library('pagination/pagination_library');

        $this->base_url = 'http://localhost/ecommerceIgniter/admin_panel/admin_product_panel/index/';
        $this->pagination_library->set_base_url($this->base_url);
        $this->_check_auth();
    }

    public function index()
    {
        $this->_initiate_pagination();

        $data['title'] = 'Admin Panel - Productos';
        $data['products'] = $this->admin_product_model->get_products($this->per_page, $this->page);
        $data['links'] = $this->pagination_library->get_links();
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('admin_panel/products/admin_products_index');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('admin_panel/products/show_products_table');
        $this->load->view($this->_path_view_folder . '/modals/create_product_modal');
        $this->load->view($this->_path_view_folder . '/modals/update_product_modal');
        $this->load->view('admin_panel/products/modals/delete_product_modal');
    }

    public function delete_product($id)
    {
        $this->admin_product_model->delete_product($id);
        $this->session->set_flashdata('sucessfully_alert', 'Producto eliminado exitosamente.');
        redirect('admin_panel/products');
    }

    public function show_product_data($id)
    {
        $product = $this->admin_product_model->get_one_product($id);
        echo json_encode($product);
    }

    public function get_product_details($id)
    {
        $data['product'] = $this->admin_product_model->get_one_product($id);
        $data['title'] = $data['product'][0]['name'];
        $data['id'] = $id;
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('admin_panel/products/product_details/show_product_index');
        $this->load->view('admin_panel/products/product_details/show_product_details');
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
        $this->session->set_flashdata('sucessfully_alert', 'Producto creado exitosamente.');
        redirect('admin_panel/products');
    }

    public function update_product()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');

        if (empty($_FILES['image']['name'])) {
            $productData = array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'stock' => $stock,
            );
        } else {
            $this->_delete_actual_image($id);
            $image = $this->_do_upload();
            $productData = array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'stock' => $stock,
                'image' => $image,
            );
        }


        if ($this->admin_product_model->update_product($id, $productData)) {
            $this->session->set_flashdata('sucessfully_alert', 'Producto actualizado exitosamente.');
            redirect('admin_panel/products');
        }
    }

    private function _delete_actual_image($id)
    {
        $image = $this->admin_product_model->get_actual_product_image($id);
        $image = './uploads/' . $image;

        if (file_exists($image)) {
            unlink($image);
        }
    }

    private function _do_upload()
    {
        $config['upload_path'] = './uploads/products';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 200;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = 'products/' . $this->upload->data('file_name');
            return $image;
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! No pudimos cargar la imagen');
            redirect('admin_panel/products');
        }
    }

    private function _check_auth()
    {
        if (!$this->sessions_library->check_login_in()) {
            redirect('admin_login');
        } else if ($this->sessions_library->check_login_in() && !$this->sessions_library->check_admin_role()) {
            redirect('products');
        }
    }

    private function _initiate_pagination()
    {
        $this->pagination_library->set_uri_segment(4);
        $this->count_products = $this->admin_product_model->count_products();
        $this->pagination_library->set_pagination_config($this->count_products);
        $this->per_page = $this->pagination_library->get_per_page();
        $this->page = $this->pagination_library->get_uri_segment();
    }
}
