<?php

class Admin_panel_client extends CI_Controller
{
    private string $_path_view_folder = 'admin_panel/clients';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->model('admin_client_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Admin Panel - Clients';
        $data['clients'] = $this->admin_client_model->get_all_clients();
        $this->load->view('head/head', $data);
        $this->load->view('admin_panel/clients/admin_clients_index');
        $this->load->view('feedback/successfully_alert');
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

    public function get_client_data($id)
    {
        $client = $this->admin_client_model->get_one_client($id);
        echo json_encode($client);
    }

    public function delete_client($id)
    {
        $this->admin_client_model->delete_client($id);
        $this->session->set_flashdata('sucessfully_alert', 'Cliente eliminado exitosamente.');
        redirect('admin_panel/clients');
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
}
