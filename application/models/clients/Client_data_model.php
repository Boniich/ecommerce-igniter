<?php

class Client_data_model extends CI_Model
{
    private string $_table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_client($id)
    {
        $this->db->select('full_name, image')->where('id', $id);
        $query = $this->db->get($this->_table);

        $result = $query->result_array();
        return $result;
    }
}
