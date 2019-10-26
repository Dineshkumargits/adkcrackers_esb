<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('dashboard/index');
    }
    public function calendar()
    {
        $this->load->view('dashboard/calendar');
    }
    public function notepad_voice()
    {
        $this->load->view('dashboard/notepad_voice');
    }
    public function chat()
    {
        $this->load->view('dashboard/chat');
    }
    public function map()
    {
        $this->load->view('dashboard/map');
    }
    public function settings()
    {
        $this->load->view('dashboard/settings');
    }
}