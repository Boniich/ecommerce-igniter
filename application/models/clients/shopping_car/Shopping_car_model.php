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

    public function check_duplicate_product_in_car($client_id, $product_id)
    {
        $query = $this->db->where('client_id', $client_id)->where('product_id', $product_id)->get('shopping_car');
        if ($query->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function increce_amount_of_duplicate_product_in_car($data)
    {
        $client_id = $data['client_id'];
        $product_id = $data['product_id'];

        $new_amount = $this->get_new_product_amount($data);
        $newData = array('client_id' => $client_id, 'product_id' => $product_id, 'product_amount' => $new_amount);

        $is_updated = $this->db->where('client_id', $client_id)->where('product_id', $product_id)->update('shopping_car', $newData);
        if ($is_updated) {
            return true;
        } else {
            return false;
        }
    }

    private function get_new_product_amount($data)
    {
        $client_id = $data['client_id'];
        $product_id = $data['product_id'];
        $amount = $data['product_amount'];

        $query = $this->db->where('client_id', $client_id)->where('product_id', $product_id)->select('product_amount')->get('shopping_car');
        $row = $query->row();
        $new_amount = $row->product_amount + $amount;

        return $new_amount;
    }

    public function is_product_stock_exceeded($data)
    {
        $product_id = $data['product_id'];

        $query = $this->db->select('stock')->from('products')->where('id', $product_id)->get();
        $row = $query->row();
        $new_amount = $this->get_new_product_amount($data);

        if ($new_amount > $row->stock) {
            return true;
        } else {
            return false;
        }
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
