<?php

class Admin_login_model extends CI_Model
{
    private string $table = 'admins';

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
        return $is_admin;
    }
}
