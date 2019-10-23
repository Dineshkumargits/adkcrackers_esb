<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('admin/login');
    }
    public function login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        if(isset($this->session->userdata['logged_in']))
        {
            header("location:".base_url());
        }
        else{
            $data = array('username'=>$user,'password'=>$pass);
            $result = $this->admin_model->login($data);
            if($result == TRUE)
            {
                $session_data = array('username'=>$user);
                $this->session->set_userdata('logged_in',$session_data);
                header("location:". base_url());
            }
            else
            {
                $data = array('error_message' => 'Invalid Username or Password');
                $this->load->view('admin/login',$data);
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
