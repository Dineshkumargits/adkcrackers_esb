<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function login($data)
    {
        $condition = "username ="."'".$data['username']."' AND "."password ="."'".$data['password']."'";
        $this->db->select('*');
        $this->db->from('ae_admins');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}