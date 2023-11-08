<?php

class Shopping_car_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_product_in_shopping_car($client_id)
    {
        $query = $this->db->select('p.id,p.name,p.price,s.product_amount')
            ->from('products p')->join('shopping_car s', 's.product_id = p.id')
            ->where('client_id', $client_id)->get();

        $result = $query->result_array();
        return $result;
    }

    public function add_product_to_car($data)
    {
        if ($this->db->insert('shopping_car', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
