<?php

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_products()
    {
        $query = $this->db->get('products');
        $result = $query->result_array();

        return $result;
    }
}
