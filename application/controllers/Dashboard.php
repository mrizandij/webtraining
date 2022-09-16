<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
    }

    function index()
    {
        // echo "Selamat datang " . $this->session->userdata("nama_lengkap") . " " . "sebagai" . " " . $this->session->userdata("level");
        $this->template->load('template/template', 'dashboard/dashboard');
    }
}