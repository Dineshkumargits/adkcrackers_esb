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
    public function updateCompanyByAgentId($c_id,$a_id)
    {
        $data = array('agent_id'=>$a_id);
        $this->db->where('id',$c_id);
        $this->db->update('ae_companies',$data);
    }
    public function add_agents($data)
    {
        $this->db->insert('ae_agents',$data);
        return $this->db->insert_id();
    }
    public function company_list_suggests($searchData)
    {
        $response = array();
        if(!empty($searchData)){
			$this->db->like('name', $searchData);
			$query = $this->db->select('id,name as text')
						->limit(10)
						->get("ae_companies");
			$response = $query->result();
        }
        else{
            $query = $this->db->select('id,name as text')
                            ->limit(10)
                            ->get('ae_companies');
            $response = $query->result();
        }
        return $response;
    }
    public function add_product($data)
    {
        $this->db->insert('ae_products',$data);
        return true;
    }
    public function add_client($data)
    {
        $this->db->insert('ae_clients',$data);
        return true;
    }
    public function client_type_suggests($searchData)
    {
        $response = array();
        if(!empty($searchData)){
			$this->db->like('type', $searchData);
			$query = $this->db->select('id,type as text')
						->limit(10)
						->get("ae_client_types");
			$response = $query->result();
        }
        else{
            $query = $this->db->select('id,type as text')
                            ->limit(10)
                            ->get('ae_client_types');
            $response = $query->result();
        }
        return $response;
    }
}