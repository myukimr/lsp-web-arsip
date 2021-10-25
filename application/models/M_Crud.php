<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Crud extends CI_Model
{
    public function read($table, $where = null)
    {
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get($table);
    }
    public function create($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }
    public function remove($table, $filter)
    {
        $this->db->where($filter);
        $this->db->delete($table);
        return true;
    }
    public function update($table, $filter, $update)
    {
        $this->db->where($filter);
        $this->db->update($table, $update);
        return true;
    }
}

/* End of file Crud_Model.php */
