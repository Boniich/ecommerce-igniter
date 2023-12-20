<?php

class Admin_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->library('sessions/sessions_library');
        $this->load->library('session');
        $this->load->library('nav_library');
        $this->load->model('admin_panel/admin_data_model');

        $this->_check_auth();
    }

    public function index()
    {
        $data['title'] = 'Ajustes';
        $data['admin_data'] = $this->admin_data_model->get_admin($this->sessions_library->get_user_id());
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('admin_panel/settings/admin/admin_settings_profile_view');
    }

    public function index_password()
    {
        $data['title'] = 'Ajustes - Password';
        $this->load->view('head/head', $data);
        $this->nav_library->load_admin_nav();
        $this->load->view('navs/modals/exit_modal');
        $this->load->view('feedback/successfully_alert');
        $this->load->view('feedback/error_alert');
        $this->load->view('admin_panel/settings/admin/admin_settings_password_view');
    }

    public function update_admin_profile()
    {
        $id = $this->sessions_library->get_user_id();
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');

        if ($this->admin_data_model->check_email($id, $email)) {
            $this->session->set_flashdata('error_alert', 'El email que has ingresado ya se encuentra en uso!');
            redirect('admin_settings/profile');
        }

        if (empty($_FILES['image']['name'])) {
            $data = array(
                'full_name' => $full_name,
                'email' => $email,
            );
        } else {
            $image = $this->_do_upload();
            $data = array(
                'full_name' => $full_name,
                'email' => $email,
                'image' => $image,
            );
        }

        if ($this->admin_data_model->update_admin_profile($id, $data)) {
            $this->session->set_flashdata('sucessfully_alert', 'Informacion de perfil actualizada');
            redirect('admin_settings/profile');
        }
    }

    public function update_admin_password()
    {
        $id = $this->sessions_library->get_user_id();
        $old_passwrod = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_new_password = $this->input->post('confirm_new_password');

        $old_hashed_password = $this->admin_data_model->get_old_password($this->sessions_library->get_user_id());
        if (password_verify($old_passwrod, $old_hashed_password)) {
            if ($new_password === $confirm_new_password) {
                $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $this->admin_data_model->update_password($id, $password_hashed);

                $this->session->set_flashdata('sucessfully_alert', 'La contraseña ha sido actualizada con exito!');
                redirect('admin_settings/password');
            } else {
                $this->session->set_flashdata('error_alert', 'La nueva contraseña no coincide con su confirmacion!');
                redirect('admin_settings/password');
            }
        } else {
            $this->session->set_flashdata('error_alert', 'La contraseña actual no coincide!');
            redirect('admin_settings/password');
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

    private function _do_upload()
    {
        $folder_name = 'admin/profile_image';
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
            redirect('admin_settings/profile');
        }
    }
}
