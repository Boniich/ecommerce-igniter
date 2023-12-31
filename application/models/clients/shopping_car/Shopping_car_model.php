<?php

class Shopping_car_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_product_in_shopping_car($client_id, $limit, $page)
    {
        $select_query_data = 'p.id,p.name,p.price,p.stock,s.product_amount';
        $get_total_x_product = 'SUM(p.price*s.product_amount) as total_x_product';

        $query = $this->db->select($select_query_data . ',' . $get_total_x_product)
            ->from('products p')->join('shopping_car s', 's.product_id = p.id')
            ->where('client_id', $client_id)->group_by('s.product_id')->limit($limit, $page)->get();

        $result = $query->result_array();
        return $result;
    }

    public function get_total_to_pay_by_shopping_car($client_id)
    {
        $query = $this->db->select('SUM(p.price*s.product_amount) as total')->from('products p')->join('shopping_car s', 's.product_id = p.id')
            ->where('client_id', $client_id)->get();
        $total  = $query->row()->total;

        return $total;
    }

    public function is_there_products_in_shopping_car($client_id)
    {
        $query = $this->db->where('client_id', $client_id)->get('shopping_car');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
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

    public function update_product_from_shopping_car($data)
    {
        $client_id = $data['client_id'];
        $product_id = $data['product_id'];
        $produc_amount = $data['product_amount'];

        $newData = array('client_id' => $client_id, 'product_id' => $product_id, 'product_amount' => $produc_amount);
        $is_updated = $this->db->where('client_id', $client_id)->where('product_id', $product_id)->update('shopping_car', $newData);
        if ($is_updated) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_product_from_shopping_car($client_id, $product_id)
    {
        $this->db->where('client_id', $client_id)->where('product_id', $product_id);
        $is_deleted = $this->db->delete('shopping_car');
        if ($is_deleted) {
            return true;
        } else {
            return false;
        }
    }

    public function count_products_by_client($client_id)
    {
        return $this->db->where('client_id', $client_id)->count_all_results('shopping_car');
    }
}
