<?php

class Client_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->library('sessions/sessions_library');
        $this->load->library('session');
        $this->load->library('nav_library');
        $this->load->model('clients/client_data_model');

        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Ajustes - Perfil';
        $data['client_data'] = $this->client_data_model->get_client_data_to_settings($this->sessions_library->get_user_id());
        $this->load->view('head/head', $data);
        $this->nav_library->load_client_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('clients/settings/client_settings_profile_view');
    }

    public function index_password()
    {
        $data['title'] = 'Ajustes - Password';
        $this->load->view('head/head', $data);
        $this->nav_library->load_client_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('clients/settings/client_settings_password_view');
    }

    private function _check_auth()
    {
        if (!$this->sessions_library->check_login_in()) {
            redirect('client_login');
        } else if ($this->sessions_library->check_login_in() && !$this->sessions_library->check_client_role()) {
            redirect('products');
        }
    }


    public function update_client_profile()
    {
        $id = $this->sessions_library->get_user_id();
        $full_name = $this->input->post('full_name');
        $dni = $this->input->post('dni');
        $email = $this->input->post('email');

        if ($this->client_data_model->check_email($id, $email)) {
            $this->session->set_flashdata('error_alert', 'El email que has ingresado ya se encuentra en uso!');
            redirect('client_settings/profile');
        }

        if ($this->client_data_model->check_dni($id, $dni)) {
            $this->session->set_flashdata('error_alert', 'El DNI que has ingresado ya se encuentra en uso!');
            redirect('client_settings/profile');
        }

        if (empty($_FILES['image']['name'])) {
            $data = array(
                'full_name' => $full_name,
                'dni' => $dni,
                'email' => $email,
            );
        } else {
            $image = $this->_do_upload();
            $data = array(
                'full_name' => $full_name,
                'dni' => $dni,
                'email' => $email,
                'image' => $image,
            );
        }

        if ($this->client_data_model->update_client_profile($id, $data)) {
            $this->session->set_flashdata('sucessfully_alert', 'Informacion de perfil actualizada');
            redirect('client_settings/profile');
        }
    }


    public function update_client_password()
    {
        $id = $this->sessions_library->get_user_id();
        $old_passwrod = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_new_password = $this->input->post('confirm_new_password');

        $old_hashed_password = $this->client_data_model->get_old_password($this->sessions_library->get_user_id());
        if (password_verify($old_passwrod, $old_hashed_password)) {
            if ($new_password === $confirm_new_password) {
                $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $this->client_data_model->update_password($id, $password_hashed);

                $this->session->set_flashdata('sucessfully_alert', 'La contraseña ha sido actualizada con exito!');
                redirect('client_settings/password');
            } else {
                $this->session->set_flashdata('error_alert', 'La nueva contraseña no coincide con su confirmacion!');
                redirect('client_settings/password');
            }
        } else {
            $this->session->set_flashdata('error_alert', 'La contraseña actual no coincide!');
            redirect('client_settings/password');
        }
    }



    private function _do_upload()
    {
        $folder_name = 'clients/profile_image';
        $id = $this->sessions_library->get_user_id();

        $config['upload_path'] = './uploads/' . $folder_name;
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = 'admin-profile-image-id-' . $id;
        $config['overwrite'] = TRUE;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = $folder_name . '/' . $this->upload->data('file_name');
            return $image;
        } else {
            $this->session->set_flashdata('error_alert', 'Ups! No pudimos cargar la imagen');
            redirect('clients_settings/profile');
        }
    }
}
