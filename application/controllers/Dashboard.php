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
        $this->load->view('dashboard');
    }
    public function calendar()
    {
        $this->load->view('calendar');
    }
    public function notepad_voie()
    {
        $this->load->view('notepad_voice');
    }
    public function chat()
    {
        $this->load->view('chat');
    }
    public function map()
    {
        $this->load->view('map');
    }
    public function settings()
    {
        $this->load->view('settings');
    }
}