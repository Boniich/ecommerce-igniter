<?php

class Client_product_model extends CI_Model
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
}
