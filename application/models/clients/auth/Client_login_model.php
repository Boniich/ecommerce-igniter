<?php

class Client_login_model extends CI_Model
{
    private string $table = 'clients';
    private int $_client_id = 0;
    private string $hashed_password = '';

    public function __construct()
    {
        $this->load->database();
    }


    private function _validate_client_data($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);

        return $query;
    }

    public function login($email)
    {
        $query = $this->_validate_client_data($email);
        $is_client = $query->num_rows() == 1 ?? true ?? false;
        if ($is_client) {
            $this->_set_client_id($query);
            $this->set_hashed_password($query);
        }
        return $is_client;
    }

    private function _set_client_id($query)
    {
        $client = $query->row();
        $this->_client_id = $client->id;
    }

    public function get_client_id()
    {
        return $this->_client_id;
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
