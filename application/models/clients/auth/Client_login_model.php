<?php

class Client_login_model extends CI_Model
{
    private string $table = 'clients';
    private int $_client_id = 0;

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
        $is_client = $query->num_rows() == 1 ?? true ?? false;
        if ($is_client) {
            $this->set_client_id($query);
        }
        return $is_client;
    }

    private function set_client_id($query)
    {
        $client = $query->row();
        $this->_client_id = $client->id;
    }

    public function get_client_id()
    {
        return $this->_client_id;
    }
}
