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
    public function products_list()
    {
        $this->load->view('stockmanager/products_list');
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
                "account_no"=>$agent_acc_no,"ifsc_code"=>$agent_ifsc_code,"bank_name"=>$agent_bank_name,"gpay_no"=>$agent_gpay_no,
                "bhim_upi"=>$agent_bhim_upi."@upi","phonepe_no"=>$agent_phonepe_no);
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
    public function sold_products_data()
    {
        $date_input = $this->input->post('date');
        $date = date("Y-m-d",strtotime($date_input));
        $product_id = $this->input->post('product_id');
        $company_id = $this->input->post('company_id');
        $agent_id = $this->input->post('agent_id');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $client_id = $this->input->post('client_id');
        $product_data = array("date"=>$date,"product_id"=>$product_id,"company_id"=>$company_id,"quantity"=>$quantity,"price"=>$price,"client_id"=>$client_id,"agent_id"=>$agent_id);
        if($this->stockmanager_model->sold_product($product_data))
        {
            $this->session->set_flashdata('success_msg', 'Product Unstacked successfully');
            $this->stockmanager_model->update_quantity($product_id,$quantity,$type="unstack");
            redirect('stockmanager/sold_products');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Something went wrong');
            redirect('stockmanager/sold_products');
        }
    }
    public function product_list_suggests()
    {
        $search = $this->input->get("q");
        $data = $this->stockmanager_model->product_list_suggests($search);
        echo json_encode($data);
    }
    public function client_list_suggests()
    {
        $search = $this->input->get("q");
        $data = $this->stockmanager_model->client_list_suggests($search);
        echo json_encode($data);
    }
    public function agent_list_suggests_by_company()
    {
        $company_id = $this->input->get('c_id');
        $data = $this->stockmanager_model->agent_list_suggests_by_company($company_id);
        echo json_encode($data);
    }
    public function getCompanyByProductId()
    {
        $product_id = $this->input->get('p_id');
        $data = $this->stockmanager_model->getCompanyByProductId($product_id);
        echo json_encode($data);
    }
    public function stock_list()
    {
        $this->load->view('stockmanager/stock_list');
    }
    public function add_client()
    {
        $this->load->view('stockmanager/add_client');
    }
    public function add_clients_data()
    {
        $client_name = $this->input->post('client_name');
        $client_address = $this->input->post('client_address');
        $client_ph_no = $this->input->post('client_ph_no');
        $client_type = $this->input->post('type');
        $client_acc_no = $this->input->post('cl_acc_no');
        $client_ifsc_code = $this->input->post('cl_ifsc_code');
        $client_bank_name = $this->input->post('cl_bank_name');
        $client_gpay_no = $this->input->post('cl_gpay_no');
        $client_bhim_upi = $this->input->post('cl_bhim_upi');
        $client_phonepe_no = $this->input->post('cl_phonepe_no');
        $preferred_company_id = json_encode($this->input->post('preferred_company_id'));
        
        $client_data = array("name"=>$client_name,"address"=>$client_address,"contact_no"=>$client_ph_no,
                "type"=>$client_type,"preferred_company_id"=>$preferred_company_id,"account_no"=>$client_acc_no,
                "ifsc_code"=>$client_ifsc_code,"bank_name"=>$client_bank_name,"gpay_no"=>$client_gpay_no,
                "bhim_upi"=>$client_bhim_upi."@upi","phonepe_no"=>$client_phonepe_no);
        if($this->stockmanager_model->add_client($client_data))
        {
            $this->session->set_flashdata('success_msg', 'Client Details saved successfully');
            redirect('stockmanager/add_client');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Something went wrong');
            redirect('stockmanager/add_client');
        }
    }
    public function client_type_suggests()
    {
        $search = $this->input->get("q");
        $data = $this->stockmanager_model->client_type_suggests($search);
        echo json_encode($data);
    }
    public function clients_list()
    {
        $this->load->view('stockmanager/clients_list');
    }
}