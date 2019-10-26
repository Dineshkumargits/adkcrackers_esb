<?php
class Stockmanager_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function add_company($data)
    {
        $this->db->insert('ae_companies', $data);
        return true;
    }
    public function add_agents($data)
    {
        $this->db->insert('ae_agents',$data);
        return true;
    }
    public function company_list_suggests($searchData)
    {
        $response = array();
        if(isset($data['search'])){
            $this->db->select('*');
            $this->db->where("name like '%".$searchData['search']."%' ");

            $records = $this->db->get('ae_companies')->result();
     
            foreach($records as $row ){
               $response[] = array("value"=>$row->id,"label"=>$row->name);
            }
     
        }
        return $response;
    }
    public function add_product($data)
    {
        $this->db->insert('ae_products',$data);
        return true;
    }
}