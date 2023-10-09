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

    public function create_client($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function get_one_client($id)
    {
        $query = $this->db->where('id', $id)->get($this->_table);
        return $query->result_array();
    }

    public function delete_client($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
