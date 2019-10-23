<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expensemanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_money()
    {
        $this->load->view('expensemanager/add_money');
    }
    public function transactions()
    {
        $this->load->view('expensemanager/transactions');
    }
}