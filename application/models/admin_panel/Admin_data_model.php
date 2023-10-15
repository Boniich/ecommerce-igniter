<?php

class Admin_data_model extends CI_Model
{
    private string $_table = 'admins';

    public function get_admin($id)
    {
        $this->db->select('full_name, image')->where('id', $id);
        $query = $this->db->get($this->_table);

        $result = $query->result_array();
        return $result;
    }
}
