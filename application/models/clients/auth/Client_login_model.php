<?php

class Client_login_model extends CI_Model
{
    private string $table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }


    private function validate_client_data($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);

        return $query;
    }

    public function login($email, $password)
    {
        $query = $this->validate_client_data($email, $password);
        $is_admin = $query->num_rows() == 1 ?? true ?? false;
        return $is_admin;
    }
}
