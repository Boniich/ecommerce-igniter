<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sessions_library
{
    protected CI_Controller $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function get_user_id()
    {
        return $this->CI->session->id;
    }

    public function authenticate_admin($id): void
    {
        $data = array('id' => $id, 'login_in' => true, 'role' => 'admin');
        $this->CI->session->set_userdata($data);
    }

    public function authenticate_client($id): void
    {
        $data = array('id' => $id, 'login_in' => true, 'role' => 'client');
        $this->CI->session->set_userdata($data);
    }

    public function check_login_in(): bool
    {
        if ($this->CI->session->login_in) {
            return true;
        } else {
            return false;
        }
    }

    public function check_admin_role(): bool
    {
        if ($this->CI->session->role === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function check_client_role(): bool
    {
        if ($this->CI->session->role === 'client') {
            return true;
        } else {
            return false;
        }
    }
}
