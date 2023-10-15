<?php

class Admin_login_model extends CI_Model
{
    private string $table = 'admins';
    private int $_admin_id = 0;

    public function __construct()
    {
        $this->load->database();
    }


    private function validate_admin_data($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);

        return $query;
    }

    public function login($email, $password)
    {
        $query = $this->validate_admin_data($email, $password);
        $is_admin = $query->num_rows() == 1 ?? true ?? false;
        if ($is_admin) {
            $this->set_admin_id($query);
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
}
