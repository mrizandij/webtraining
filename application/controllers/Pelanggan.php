<?php
class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pelanggan');
        $this->load->model('Model_cabang');
    }
    function index()
    {
        $data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
        $this->template->load('template/template', 'pelanggan/view_pelanggan', $data);
    }

    function inputpelanggan()
    {
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $this->load->view('pelanggan/input_pelanggan', $data);
    }

    function simpanpelanggan()
    {
        $kodepelanggan = $this->input->post('kodepelanggan');
        $namapelanggan = $this->input->post('namapelanggan');
        $alamatpelanggan = $this->input->post('alamatpelanggan');
        $nohp = $this->input->post('nohp');
        $cabang = $this->input->post('cabang');

        $data = array(
            'kode_pelanggan' => $kodepelanggan,
            'nama_pelanggan' => $namapelanggan,
            'alamat_pelanggan' => $alamatpelanggan,
            'no_hp' => $nohp,
            'kode_cabang' => $cabang,

        );
        // panggil model Pelanggan
        $simpan = $this->Model_pelanggan->insertPelanggan($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil disimpan
          </div>');
            redirect("pelanggan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal disimpan
          </div>');
            redirect("pelanggan");
        }
    }

    function editpelanggan()
    {
        $kodepelanggan = $this->uri->segment(3);
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $data['pelanggan'] = $this->Model_pelanggan->getPelanggan($kodepelanggan)->row_array();
        $this->load->view('pelanggan/edit_pelanggan', $data);
    }

    function updatepelanggan()
    {
        $kodepelanggan = $this->input->post('kodepelanggan');
        $namapelanggan = $this->input->post('namapelanggan');
        $alamatpelanggan = $this->input->post('alamatpelanggan');
        $nohp = $this->input->post('nohp');
        $cabang = $this->input->post('cabang');

        $data = array(
            'kode_pelanggan' => $kodepelanggan,
            'nama_pelanggan' => $namapelanggan,
            'alamat_pelanggan' => $alamatpelanggan,
            'no_hp' => $nohp,
            'kode_cabang' => $cabang,
        );
        // panggil model pelanggan
        $simpan = $this->Model_pelanggan->updatePelanggan($data, $kodepelanggan);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil diupdate
          </div>');
            redirect("pelanggan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal diupdate
          </div>');
            redirect("pelanggan");
        }
    }
    function hapuspelanggan()
    {
        $kodepelanggan = $this->uri->segment(3);
        $hapus = $this->Model_pelanggan->deletePelanggan($kodepelanggan);
        if ($hapus == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data berhasil dihapus
          </div>');
            redirect("pelanggan");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data gagal dihapus
          </div>');
            redirect("pelanggan");
        }
    }
}