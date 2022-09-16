<?php
class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_karyawan');
        checklogin();
    }

    function index()
    {
        // $data["files"] = directory_map("assets/file");
        // query untuk menampilkan data karyawan        

        $data['karyawan'] = $this->Model_karyawan->getDataKaryawan()->result();
        $this->template->load('template/template', 'karyawan/view_karyawan', $data);
    }

    function inputkaryawan()

    {
        // $bulan =  date("m");
        // $tahun = date("Y");
        // $thn =  substr($tahun, 2, 2);
        // $cabang = $this->session->userdata('kode_cabang');
        // $getLastFaktur = $this->Model_karyawan->getLastFaktur($bulan, $tahun, $cabang)->row_array();
        // $data['kode_karyawan'] = $this->Model_karyawan->get_no_invoice();
        // $nomorterakhir = $getLastFaktur['kode_karyawan'];
        // $kode = buatkode($nomorterakhir, $cabang . $bulan . $thn, 4);
        // $data['kode_karyawan'] = $kode;

        $data['karyawan'] = $this->Model_karyawan->getDataKaryawan()->result();
        $data['kode_karyawan'] = $this->Model_karyawan->get_no_invoice();
        $this->load->view('karyawan/input_karyawan', $data);


        // $data["files"] = directory_map("assets/file");
    }

    function upload()
    {
        $config["upload_path"] = 'assets/file';
        $config["allowed_types"] = '*';
        $config['max_size']      = 10000;

        $this->load->library("upload", $config);
        if ($this->upload->do_upload('file')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil disimpan
          </div>');
            redirect("karyawan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data gagal disimpan
          </div>');
            redirect("karyawan");
        }
    }

    function simpankaryawan()
    {
        $kode_karyawan = $this->input->post('kode_karyawan');
        $nama = $this->input->post('nama');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');
        $jabatan = $this->input->post('jabatan');
        $departement = $this->input->post('departement');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');

        // $tglreg = $this->input->post('tglreg');
        // $photo = $this->input->post('photo');
        // $photo = $_FILES['photo'];
        // if ($photo = '') {
        // } else {
        //     $config['upload_path']      = '/.asset/img';
        //     $config['allowed_types']    = 'jpg|JPG|png|PNG';
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('photo')) {
        //         echo "upload gagal";
        //         die();
        //     } else {
        //         $photo = $this->upload->data('file_name');
        //     }
        // }        
        $data = array(
            'kode_karyawan' => $kode_karyawan,
            'nama' => $nama,
            'ttl' => $ttl,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'departement' => $departement,
            'telepon' => $telepon,
            'email' => $email,
        );
        $simpan = $this->Model_karyawan->insertKaryawan($data);
        // redirect("karyawan");
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil disimpan
          </div>');
            redirect("karyawan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal disimpan
          </div>');
            redirect("karyawan");
        }
    }
    function editkaryawan()
    {
        $kodekaryawan = $this->uri->segment(3);
        $data['karyawan'] = $this->Model_karyawan->getKaryawan($kodekaryawan)->row_array();
        $this->load->view('karyawan/edit_karyawan', $data);
    }

    function updatekaryawan()
    {
        $kodekaryawan = $this->input->post('kode_karyawan');
        $nama = $this->input->post('nama');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');
        $jabatan = $this->input->post('jabatan');
        $departement = $this->input->post('departement');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $data = array(
            'kode_karyawan' => $kodekaryawan,
            'nama' => $nama,
            'ttl' => $ttl,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'departement' => $departement,
            'telepon' => $telepon,
            'email' => $email,
        );

        $simpan = $this->Model_karyawan->updateKaryawan($data, $kodekaryawan);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil diupdate
          </div>');
            redirect("karyawan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal diupdate
          </div>');
            redirect("karyawan");
        }
    }

    function hapuskaryawan()
    {
        $kode_karyawan = $this->uri->segment(3);
        $hapus = $this->Model_karyawan->deleteKaryawan($kode_karyawan);
        if ($hapus == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil dihapus
          </div>');
            redirect("karyawan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal dihapus
          </div>');
            redirect("karyawan");
        }
    }
}