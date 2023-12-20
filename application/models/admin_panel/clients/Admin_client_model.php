<?php

class Admin_client_model extends CI_Model
{

    private string $_table = 'clients';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_clients($limit, $page)
    {
        $query = $this->db->limit($limit, $page)->get($this->_table);
        $result = $query->result_array();

        return $result;
    }

    public function count_clients()
    {
        return $this->db->count_all_results($this->_table);
    }

    public function create_client($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function update_client($id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($this->_table, $data);

        return $result;
    }

    public function get_one_client($id)
    {
        $query = $this->db->where('id', $id)->get($this->_table);
        return $query->result_array();
    }

    public function delete_client($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    public function get_actual_client_image($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table);

        $row = $query->row();

        $image = $row->image;

        return $image;
    }

    public function check_dni($dni)
    {
        $query = $this->db->where('dni', $dni)->get($this->_table);
        $is_dni_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_dni_register) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email($email)
    {
        $query = $this->db->where('email', $email)->get($this->_table);
        $is_email_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_email_register) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_at_update($id, $email)
    {
        $query = $this->db->where('id !=', $id)->where('email', $email)->get($this->_table);
        $is_email_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_email_register) {
            return true;
        } else {
            return false;
        }
    }

    public function check_dni_at_update($id, $dni)
    {
        $query = $this->db->where('id !=', $id)->where('dni', $dni)->get($this->_table);
        $is_dni_register = $query->num_rows() > 0 ?? true ?? false;
        if ($is_dni_register) {
            return true;
        } else {
            return false;
        }
    }
}
