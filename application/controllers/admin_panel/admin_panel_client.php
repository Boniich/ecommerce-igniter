<?php

class Admin_panel_client extends CI_Controller
{
    private string $_path_view_folder = 'admin_panel/clients';
    private string $base_url;
    private int $per_page;
    private int $page;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_panel/clients/admin_client_model');
        $this->load->library('session');
        $this->load->library('sessions/sessions_library');
        $this->load->library('nav_library');
        $this->load->library('pagination/pagination_library');

        $this->base_url = 'http://localhost/ecommerceIgniter/admin_panel/admin_panel_client/index/';
        $this->pagination_library->set_base_url($this->base_url);
        $this->_check_auth();
    }

    public function index()
    {
        $this->_initiate_pagination();

        $data['title'] = 'Admin Panel - Clientes';
        $data['clients'] = $this->admin_client_model->get_clients($this->per_page, $this->page);
        $data['links'] = $this->pagination_library->get_links();
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('admin_panel/clients/admin_clients_index');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('admin_panel/clients/show_clients_table');
        $this->load->view('admin_panel/clients/modals/delete_client_modal');
        $this->load->view($this->_path_view_folder . '/modals/create_client_modal');
        $this->load->view($this->_path_view_folder . '/modals/update_client_modal');
    }

    public function create_client()
    {
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $dni = $this->input->post('dni');
        $profile_image = $this->_do_upload();

        if ($this->admin_client_model->check_email($email)) {
            $this->_show_email_already_taken_alert();
        }

        if ($this->admin_client_model->check_dni($dni)) {
            $this->_show_dni_already_taken_alert();
        }

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $client = array(
            'full_name' => $full_name,
            'email' => $email,
            'password' => $password_hashed,
            'dni' => $dni,
            'image' => $profile_image,
        );

        $this->admin_client_model->create_client($client);
        $this->session->set_flashdata('sucessfully_alert', 'Cliente creado exitosamente.');
        redirect('admin_panel/clients');
    }

    public function update_client()
    {
        $id = $this->input->post('id');
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $dni = $this->input->post('dni');
        $password = $this->input->post('password');

        if ($this->admin_client_model->check_email_at_update($id, $email)) {
            $this->_show_email_already_taken_alert();
        }

        if ($this->admin_client_model->check_dni_at_update($id, $dni)) {
            $this->_show_dni_already_taken_alert();
        }

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        if (empty($_FILES['profile_image']['name'])) {
            $productData = array(
                'full_name' => $full_name,
                'email' => $email,
                'dni' => $dni,
                'password' => $password_hashed,
            );
        } else {
            $this->_delete_actual_image($id);
            $image = $this->_do_upload();
            $productData = array(
                'full_name' => $full_name,
                'email' => $email,
                'dni' => $dni,
                'password' => $password_hashed,
                'image' => $image,
            );
        }


        if ($this->admin_client_model->update_client($id, $productData)) {
            $this->session->set_flashdata('sucessfully_alert', 'Cliente actualizado exitosamente.');
            redirect('admin_panel/clients');
        }
    }

    public function get_client_data($id)
    {
        $client = $this->admin_client_model->get_one_client($id);
        echo json_encode($client);
    }

    public function get_client_details($id)
    {
        $data['client'] = $this->admin_client_model->get_one_client($id);
        $data['title'] = 'Cliente: ' . $data['client'][0]['full_name'];
        $data['id'] = $id;
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('admin_panel/clients/client_details/show_client_index');
        $this->load->view('admin_panel/clients/client_details/show_client_details');
    }

    public function delete_client($id)
    {
        $this->admin_client_model->delete_client($id);
        $this->session->set_flashdata('sucessfully_alert', 'Cliente eliminado exitosamente.');
        redirect('admin_panel/clients');
    }

    private function _delete_actual_image($id)
    {
        $image = $this->admin_client_model->get_actual_client_image($id);
        $image = './uploads/' . $image;

        if (file_exists($image)) {
            unlink($image);
        }
    }

    private function _do_upload()
    {
        $config['upload_path'] = './uploads/clients';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 200;
        $config['max_width'] = 250;
        $config['max_height'] = 250;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_image')) {
            $image = 'clients/' . $this->upload->data('file_name');
            return $image;
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! No pudimos cargar la imagen');
            redirect('admin_panel/clients');
        }
    }

    private function _show_email_already_taken_alert()
    {
        $this->session->set_flashdata('error_alert', 'El email ya esta registrado. Intenta con otro');
        redirect('admin_panel/clients');
    }

    private function _show_dni_already_taken_alert()
    {
        $this->session->set_flashdata('error_alert', 'El DNI ya esta registrado. Intenta con otro');
        redirect('admin_panel/clients');
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
        $count_clients = $this->admin_client_model->count_clients();
        $this->pagination_library->set_pagination_config($count_clients);
        $this->per_page = $this->pagination_library->get_per_page();
        $this->page = $this->pagination_library->get_uri_segment();
    }
}
