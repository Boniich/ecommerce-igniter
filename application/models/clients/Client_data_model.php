<?php

class Client_data_model extends CI_Model
{
    private string $_table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_client($id)
    {
        $this->db->select('full_name, image')->where('id', $id);
        $query = $this->db->get($this->_table);

        $result = $query->result_array();
        return $result;
    }

    public function get_client_data_to_settings($id)
    {
        $this->db->select('full_name, image, email, dni')->where('id', $id);
        $query = $this->db->get($this->_table);

        $result = $query->result_array();
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

    public function check_dni($id, $dni)
    {
        $query = $this->db->where('id !=', $id)->where('dni', $dni)->get($this->_table);
        $is_dni_taked = $query->num_rows() > 0 ?? true ?? false;
        if ($is_dni_taked) {
            return true;
        } else {
            return false;
        }
    }

    public function update_client_profile($id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($this->_table, $data);
        return $result;
    }
}
