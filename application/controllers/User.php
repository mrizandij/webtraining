<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
        checklogin();
    }
    function index()
    {
        $data['user'] = $this->Model_user->getDataUser()->result();
        $this->template->load('template/template', 'user/view_user', $data);
    }

    function inputuser()
    {
        $this->load->view('user/input_user');
    }

    function simpanuser()
    {
        $iduser = $this->input->post('iduser');
        $namalengkap = $this->input->post('namalengkap');
        $telepon = $this->input->post('telepon');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $kodecabang = $this->input->post('kodecabang');

        $data = array(
            'id_user' => $iduser,
            'nama_lengkap' => $namalengkap,
            'no_hp' => $telepon,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'kode_cabang' => $kodecabang,

        );
        // panggil model training
        $simpan = $this->Model_user->insertUser($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil disimpan
          </div>');
            redirect("user");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal disimpan
          </div>');
            redirect("user");
        }
    }

    function edituser()
    {
        $kodeuser = $this->uri->segment(3);
        $data['user'] = $this->Model_user->getUser($kodeuser)->row_array();
        $this->load->view('user/edit_user', $data);
    }

    function updateUser()
    {
        $iduser = $this->input->post('iduser');
        $namalengkap = $this->input->post('namalengkap');
        $telepon = $this->input->post('telepon');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $kodecabang = $this->input->post('kodecabang');

        $data = array(
            'id_user' => $iduser,
            'nama_lengkap' => $namalengkap,
            'no_hp' => $telepon,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'kode_cabang' => $kodecabang,

        );
        // panggil model user
        $simpan = $this->Model_user->updateUser($data, $iduser);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil diupdate
          </div>');
            redirect("user");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal diupdate
          </div>');
            redirect("user");
        }
    }

    function hapususer()
    {
        $kodeuser = $this->uri->segment(3);
        $hapus = $this->Model_user->deleteUser($kodeuser);
        if ($hapus == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil dihapus
          </div>');
            redirect("user");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal dihapus
          </div>');
            redirect("user");
        }
    }
}