<?php

class Client_product_model extends CI_Model
{
    private string $_table = 'products';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_products($limit, $page)
    {
        $query = $this->db->limit($limit, $page)->get($this->_table);
        $result = $query->result_array();

        return $result;
    }

    public function get_one_product($id)
    {
        $query = $this->db->where('id', $id)->get($this->_table);
        return $query->result_array();
    }

    public function count_products()
    {
        return $this->db->count_all_results($this->_table);
    }
}
