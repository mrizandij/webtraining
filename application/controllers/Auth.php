<?php

class Auth extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }

    function login()
    {
        // helper 
        checklog();
        $this->load->view('auth/login');
    }

    function ceklogin()
    {
        // data dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // model untuk cek data ke database
        $login = $this->Model_auth->getLogin($username, $password);
        $ceklogin = $login->num_rows();
        $datalogin = $login->row_array();
        $data = array(
            'id_user'       => $datalogin['id_user'],
            'nama_lengkap'  => $datalogin['nama_lengkap'],
            'username'      => $datalogin['username'],
            'password'      => $datalogin['password'],
            'level'         => $datalogin['level'],
            'kode_cabang'   => $datalogin['kode_cabang']
        );
        $this->session->set_userdata($data);
        echo $this->session->userdata("nama_lengkap");
        if ($ceklogin == 1) {
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Username / Password salah!
          </div>');
            redirect('auth/login');
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}