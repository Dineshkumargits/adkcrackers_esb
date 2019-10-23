<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockmanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_product()
    {
        $this->load->view('stockmanager/add_product');
    }
    public function add_company()
    {
        $this->load->view('stockmanager/add_company');
    }
    public function company_list()
    {
        $this->load->view('stockmanager/company_list');
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