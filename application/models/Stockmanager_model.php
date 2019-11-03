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
    public function client_list_suggests($searchData)
    {
        $response = array();
        if(!empty($searchData)){
			$this->db->like('name', $searchData);
			$query = $this->db->select('id,name as text')
						->limit(10)
						->get("ae_clients");
			$response = $query->result();
        }
        else{
            $query = $this->db->select('id,name as text')
                            ->limit(10)
                            ->get('ae_clients');
            $response = $query->result();
        }
        return $response;
    }
    public function product_list_suggests($searchData)
    {
        $response = array();
        if(!empty($searchData)){
			$this->db->like('name', $searchData);
			$query = $this->db->select('id,name as text')
						->limit(10)
						->get("ae_products");
			$response = $query->result();
        }
        else{
            $query = $this->db->select('id,name as text')
                            ->limit(10)
                            ->get('ae_products');
            $response = $query->result();
        }
        return $response;
    }
    public function agent_list_suggests_by_company($data)
    {
        $response = array();
        $this->db->where('company_id', $data);
        $query = $this->db->select('id,name as text')
                    ->limit(10)
                    ->get("ae_agents");
        $response = $query->result();
        return $response;
    }
    public function getCompanyByProductId($data)
    {
        $companies = array();
        $this->db->where('id', $data);
        $query = $this->db->select('company_id as id,name as text')
                    ->limit(10)
                    ->get("ae_products");
        $response = $query->result();
        $company_id = $response[0]->id;
        $query1 = $this->db->select('id,name as text')->where('id',$company_id)->get("ae_companies");
        $companies = $query1->result();
        return $companies;
    }
    public function sold_product($data)
    {
        $this->db->insert('ae_unstocked',$data);
        return $this->db->insert_id();
    }
    public function update_quantity($prod_id,$quantity,$type)
    {
        if($type == "unstack")
        {
            $this->db->where('id', $prod_id);
            $data = "";
            $this->db->set('quantity', '`quantity`- '."$quantity", FALSE);
            $this->db->update('ae_products');
        }
    }
}