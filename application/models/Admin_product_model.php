<?php

class Admin_product_model extends CI_Model
{

    private string $_table = 'products';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_products()
    {
        $query = $this->db->get($this->_table);
        $result = $query->result_array();

        return $result;
    }

    public function delete_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    public function create_product($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);
    }
}
