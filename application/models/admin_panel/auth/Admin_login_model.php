<?php

class Admin_login_model extends CI_Model
{
    private string $table = 'admins';
    private int $_admin_id = 0;
    private string $hashed_password = '';

    public function __construct()
    {
        $this->load->database();
    }


    private function validate_admin_data($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);

        return $query;
    }

    public function login($email)
    {
        $query = $this->validate_admin_data($email);
        $is_admin = $query->num_rows() == 1 ?? true ?? false;
        if ($is_admin) {
            $this->set_admin_id($query);
            $this->set_hashed_password($query);
        }
        return $is_admin;
    }

    private function set_admin_id($query)
    {
        $admin = $query->row();
        $this->_admin_id = $admin->id;
    }

    public function get_admin_id()
    {
        return $this->_admin_id;
    }

    private function set_hashed_password($query)
    {
        $admin = $query->row();
        $this->hashed_password = $admin->password;
    }

    public function get_hashed_password()
    {
        return $this->hashed_password;
    }
}
