<?php

class Home_product_model extends CI_Model
{
    private string $_table = 'products';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_products_home()
    {
        $query = $this->db->limit(5)->get($this->_table);
        $result = $query->result_array();

        return $result;
    }
}
