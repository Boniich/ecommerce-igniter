<?php

class Admin_panel_client extends CI_Controller
{
    private string $_path_view_folder = 'admin_panel/clients';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_panel/clients/admin_client_model');
        $this->load->model('admin_panel/admin_data_model');
        $this->load->library('session');

        if (!$this->session->login_in) {
            redirect('admin_login');
        } else if ($this->session->login_in && $this->session->role != 'admin') {
            redirect('products');
        }
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Clients';
        $data['clients'] = $this->admin_client_model->get_all_clients();
        $data['admin'] = $this->_get_admin_data();
        $this->load->view('head/head', $data);
        $this->load->view('navs/admin_nav/admin_nav');
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
            $this->session->set_flashdata('error_alert', 'El email ya esta registrado. Intenta con otro');
            redirect('admin_panel/clients');
        }

        $client = array(
            'full_name' => $full_name,
            'email' => $email,
            'password' => $password,
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

        if (empty($_FILES['profile_image']['name'])) {
            $productData = array(
                'full_name' => $full_name,
                'email' => $email,
                'dni' => $dni,
                'password' => $password,
            );
        } else {
            $this->_delete_actual_image($id);
            $image = $this->_do_upload();
            $productData = array(
                'full_name' => $full_name,
                'email' => $email,
                'dni' => $dni,
                'password' => $password,
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
        $data['title'] = 'Client: ' . $data['client'][0]['full_name'];
        $data['admin'] = $this->_get_admin_data();
        $data['id'] = $id;
        $this->load->view('head/head', $data);
        $this->load->view('navs/admin_nav/admin_nav');
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
        }
    }

    private function _get_admin_data()
    {
        $id = $this->session->id;
        $data = $this->admin_data_model->get_admin($id);
        return $data;
    }
}
