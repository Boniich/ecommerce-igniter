<?php

class Admin_client_model extends CI_Model
{

    private string $_table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_clients()
    {
        $query = $this->db->get($this->_table);
        $result = $query->result_array();

        return $result;
    }
}
