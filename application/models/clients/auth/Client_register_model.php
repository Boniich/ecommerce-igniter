<?php

class Client_register_model extends CI_Model
{
    private string $_table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }

    public function register($data)
    {
        $this->db->insert($this->_table, $data);
        return true;
    }

    public function check_dni($dni)
    {
        $query = $this->db->where('dni', $dni)->get($this->_table);
        $is_dni_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_dni_register) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email($email)
    {
        $query = $this->db->where('email', $email)->get($this->_table);
        $is_email_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_email_register) {
            return true;
        } else {
            return false;
        }
    }
}
