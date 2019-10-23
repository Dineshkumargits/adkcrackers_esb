<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function calendar()
    {
        $this->load->view('options/calendar');
    }
    public function notepad_voice()
    {
        $this->load->view('options/notepad_voice');
    }
    public function chat()
    {
        $this->load->view('options/chat');
    }
    public function map()
    {
        $this->load->view('options/map');
    }
    public function settings()
    {
        $this->load->view('options/settings');
    }
}