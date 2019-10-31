<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockmanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stockmanager_model');
    }
    public function add_product()
    {
        $this->load->view('stockmanager/add_product');
    }
    public function add_product_data()
    {
        $product_name = $this->input->post('product_name');
        $company_id = $this->input->post('company_id');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $product_data = array("name"=>$product_name,"company_id"=>$company_id,"price"=>$price,"quantity"=>$quantity);
        if($this->stockmanager_model->add_product($product_data))
        {
            $this->session->set_flashdata('success_msg', 'Product added successfully');
            redirect('stockmanager/add_product');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Something went wrong');
            redirect('stockmanager/add_product');
        }
    }
    public function add_company()
    {
        $this->load->view('stockmanager/add_company');
    }
    public function add_company_data()
    {
        $company_name = $this->input->post('company_name');
        $company_address = $this->input->post('company_address');
        $company_ph_no = $this->input->post('company_ph_no');
        $company_acc_no = $this->input->post('co_acc_no');
        $company_ifsc_code = $this->input->post('co_ifsc_code');
        $company_bank_name = $this->input->post('co_bank_name');
        $company_gpay_no = $this->input->post('co_gpay_no');
        $company_bhim_upi = $this->input->post('co_bhim_upi');
        $company_phonepe_no = $this->input->post('co_phonepe_no');

        $company_data = array("name"=>$company_name,"contact"=>$company_ph_no,"address"=>$company_address,
                        "account_no"=>$company_acc_no,"ifsc_code"=>$company_ifsc_code,"bank_name"=>$company_bank_name,
                        "gpay_no"=>$company_gpay_no,"bhim_upi"=>$company_bhim_upi."@upi","phonepe_no"=>$company_phonepe_no,
                        "agent_id"=>$agent_id);

        if($this->stockmanager_model->add_company($company_data))
        {
            $this->session->set_flashdata('success_msg', 'Company Details saved successfully');
            redirect('stockmanager/add_company');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Something went wrong');
            redirect('stockmanager/add_company');
        }

        
    }
    public function company_list()
    {
        $this->load->view('stockmanager/company_list');
    }
    public function add_agents()
    {
        $this->load->view('stockmanager/add_agents');
    }
    public function add_agents_data()
    {
        $agent_name = $this->input->post('agent_name');
        $agent_address = $this->input->post('agent_address');
        $agent_ph_no = $this->input->post('agent_ph_no');
        $agent_acc_no = $this->input->post('ag_acc_no');
        $agent_ifsc_code = $this->input->post('ag_ifsc_code');
        $agent_bank_name = $this->input->post('ag_bank_name');
        $agent_gpay_no = $this->input->post('ag_gpay_no');
        $agent_bhim_upi = $this->input->post('ag_bhim_upi');
        $agent_phonepe_no = $this->input->post('ag_phonepe_no');
        $company_id = $this->input->post('company');
        
        $agent_data = array("name"=>$agent_name,"company_id"=>$company_id,"address"=>$agent_address,"contact_no"=>$agent_ph_no,
                "ifsc_code"=>$agent_ifsc_code,"bank_name"=>$agent_bank_name,"gpay_no"=>$agent_gpay_no,"bhim_upi"=>$agent_bhim_upi."@upi",
                "phonepe_no"=>$agent_phonepe_no);
        $agent_id = $this->stockmanager_model->add_agents($agent_data);
        if($agent_id)
        {
            $this->session->set_flashdata('success_msg', 'Agent Details saved successfully');
            $this->stockmanager_model->updateCompanyByAgentId($company_id,$agent_id);
            redirect('stockmanager/add_agents');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Something went wrong');
            redirect('stockmanager/add_agents');
        }
    }
    public function company_list_suggests()
    {
        $search = $this->input->get("q");
        $data = $this->stockmanager_model->company_list_suggests($search);
        echo json_encode($data);
    }
    public function agents_list()
    {
        $this->load->view('stockmanager/agents_list');
    }
    public function sold_list()
    {
        $this->load->view('stockmanager/sold_list');
    }
    public function sold_products()
    {
        $this->load->view('stockmanager/sold_products');
    }
    public function stock_list()
    {
        $this->load->view('stockmanager/stock_list');
    }
    public function products_list()
    {
        $this->load->view('stockmanager/products_list');
    }
}