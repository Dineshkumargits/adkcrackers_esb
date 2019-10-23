<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billgenerator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function bill_generator()
    {
        $this->load->view('billgenerator/bill_generator');
    }
    public function generated_bills()
    {
        $this->load->view('billgenerator/generated_bills');
    }
}