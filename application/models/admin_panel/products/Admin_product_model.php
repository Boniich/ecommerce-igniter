<?php

class Admin_product_model extends CI_Model
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
        $result = $this->db->update($this->_table, $data);

        return $result;
    }

    public function get_actual_product_image($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);

        $row = $query->row();

        $image = $row->image;

        return $image;
    }
}
