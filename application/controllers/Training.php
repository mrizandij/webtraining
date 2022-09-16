<?php
class Training extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_training');
        $this->load->model('Model_karyawan');
        checklogin();
    }

    function index()
    {
        // load model karyawan untuk baca hasil training record
        // $datatraining = $this->Model_training->getDataTraining()->result();
        // $data['data_training'] = $datatraining;
        $this->template->load('template/template', 'training/view_training');
    }

    function inputtraining()
    {
        $data['kode_karyawan'] = $this->Model_karyawan->get_no_invoice();
        // $data['karyawan'] = $this->Model_training->getDataKaryawan()->result();

        $data['karyawan'] = $this->Model_training->getActiveProductKaryawan();
        $this->template->load('template/template', 'training/input_training', $data);
    }

    function simpantraining()
    {
        $nama_training = $this->input->post('training');
        $nama_trainer = $this->input->post('trainer');
        $tgl_training = $this->input->post('tgltraining');
        $id_user = $this->input->post('id_user');
        $data = array(
            'nama_training' => $nama_training,
            'nama_trainer' => $nama_trainer,
            'tgl_training' => $tgl_training,
            'id_user' => $id_user
            // 'kode_karyawan' => $kode_karyawan
        );
        $this->Model_training->insertTraining($data);
    }

    function cekKaryawan()
    {
        $jmldatakaryawan = $this->Model_training->cekKaryawan()->num_rows();
        echo $jmldatakaryawan;
    }

    function grandcekKaryawan()
    {
        $data['jmlkaryawan'] = $this->Model_training->cekKaryawan()->num_rows();
        echo $data;
        $this->template->load('template/template', 'training/training_detail_temp', $data);
    }

    function getDataKaryawanTemp()
    {
        $id_user = $this->input->post('id_user');
        $data['karyawantemp'] = $this->Model_training->getDataKaryawanTemp($id_user)->result();
        $this->load->view('training/training_detail_temp', $data);
    }

    function simpankaryawantemp()
    {
        $kode_karyawan = $this->input->post('kode_karyawan');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $departement = $this->input->post('departement');
        $email = $this->input->post('email');
        $ket = $this->input->post('ket');
        $id_user = $this->input->post('id_user');

        $cekkaryawantemp = $this->Model_training->cekKaryawanTemp($kode_karyawan, $id_user)->num_rows();
        if ($cekkaryawantemp > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_karyawan' => $kode_karyawan,
                'nama' => $nama,
                'jabatan' => $jabatan,
                'departement' => $departement,
                'email' => $email,
                'ket' => $ket,
                'id_user' => $id_user
            );
            $simpan = $this->Model_training->inserKaryawanTemp($data);
        }
    }

    function hapusKaryawanTemp()
    {
        $kode_karyawan = $this->input->post('kodekaryawan');
        $id_user = $this->input->post('iduser');
        $hapus =  $this->Model_training->deleteKaryawanTemp($kode_karyawan, $id_user);
        echo $hapus;
    }

    function getTableProductRow()
    {
        $products = $this->Model_training->getActiveProductKaryawan();
        echo json_encode($products);
    }

    function getKaryawanValueByKode()
    {
        $karyawan_id = $this->input->post('karyawan_id');
        if ($karyawan_id) {
            $karyawan_data = $this->Model_training->getKaryawanData($karyawan_id);
            echo json_encode($karyawan_data);
        }
    }

    function getTableKaryawanRow()
    {
        $karyawan = $this->Model_training->getActiveKaryawanData();
        echo json_encode($karyawan);
    }
}