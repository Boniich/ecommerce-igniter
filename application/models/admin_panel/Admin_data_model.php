<?php

class Admin_data_model extends CI_Model
{
    private string $_table = 'admins';

    public function get_admin($id)
    {
        $this->db->select('full_name, image, email')->where('id', $id);
        $query = $this->db->get($this->_table);

        $result = $query->result_array();
        return $result;
    }

    public function update_admin_profile($id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($this->_table, $data);
        return $result;
    }

    public function check_email($id, $email)
    {
        $query = $this->db->where('id !=', $id)->where('email', $email)->get($this->_table);
        $is_email_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_email_register) {
            return true;
        } else {
            return false;
        }
    }
}
