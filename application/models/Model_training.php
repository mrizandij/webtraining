<?php
class Model_training extends CI_Model
{
    function cekKaryawan()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('karyawan_detail_temp', array('id_user' => $id_user));
    }

    function getDataKaryawan()
    {
        return $this->db->get('data_karyawan');
    }

    // function getDataTraining()
    // {
    //     $this->db->select('karyawan.kode_karyawan,nama_training,nama_trainer,tgl_training,karyawan.id_user');
    //     $this->db->from('karyawan');
    //     $this->db->join('karyawan_detail', 'karyawan.kode_karyawan = karyawan_detail.kode_karyawan');
    //     return $this->db->get();
    // }

    function getActiveProductKaryawan()
    {
        $sql = "SELECT * FROM data_karyawan ORDER BY kode_karyawan ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function cekKaryawanTemp($kode_karyawan, $id_user)
    {
        return $this->db->get_where('karyawan_detail_temp', array('kode_karyawan' => $kode_karyawan, 'id_user' => $id_user));
    }

    function inserKaryawanTemp($data)
    {
        $this->db->insert('karyawan_detail_temp', $data);
    }

    function insertTraining($data)
    {
        // insert ke karyawan detail
        $simpan = $this->db->insert('karyawan_detail', $data);
        // query data karyawan detail
        $karyawan_detail = $this->db->get_where('karyawan_detail', array('id_user' => $data['id_user']));
        foreach ($karyawan_detail->result() as $k) {
            $karyawan = array(
                'nama_training' => $k->nama_training,
                'nama_trainer' => $k->nama_trainer,
                'tgl_training' => $k->tgl_training,
                'id_user' => $k->id_user
            );
            // insert ke tabel karyawan bersamaan dengan dari karyawan detail temp
            $this->db->insert('karyawan', $karyawan);
        }
        if ($simpan) {
            $karyawan_detail_temp = $this->db->get_where('karyawan_detail_temp', array('id_user' => $data['id_user']));
            $berhasil = 0;
            $error = 0;
            foreach ($karyawan_detail_temp->result() as $d) {
                $datadetail = array(
                    'kode_karyawan' => $d->kode_karyawan,
                    'nama_karyawan' => $d->nama,
                    'jabatan' => $d->jabatan,
                    'departement' => $d->departement,
                    'email' => $d->email,
                    'ket' => $d->ket,
                    'id_user' => $d->id_user,
                );
                $simpankaryawandetail = $this->db->insert('karyawan', $datadetail);
                if ($simpankaryawandetail) {
                    $berhasil++;
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusdetail = $this->db->delete('karyawan_detail', array('kode_karyawan' => $d->kode_karyawan));
                $hapusdatakaryawan = $this->db->delete('penjualan', array('kode_karyawan' => $data['kode_karyawan']));
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                 Data Gagal Disimpan 
                </div>');
                redirect('training/inputtraining');
            }
        }
    }

    function getDataKaryawanTemp($id_user)
    {
        $this->db->select('karyawan_detail_temp.kode_karyawan,karyawan_detail_temp.id_user,karyawan_detail_temp.nama,karyawan_detail_temp.jabatan,karyawan_detail_temp.departement,karyawan_detail_temp.email,karyawan_detail_temp.ket');
        $this->db->from('karyawan_detail_temp');
        $this->db->join('data_karyawan', 'karyawan_detail_temp.kode_karyawan = data_karyawan.kode_karyawan');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }

    function deleteKaryawanTemp($kode_karyawan, $id_user)
    {
        $hapus = $this->db->delete('karyawan_detail_temp', array('kode_karyawan' => $kode_karyawan, 'id_user' => $id_user));
        if ($hapus) {
            return 1;
        }
    }

    function getKaryawanData($kode = null)
    {
        if ($kode) {
            $sql = "SELECT * FROM data_karyawan where kode_karyawan = ?";
            $query = $this->db->query($sql, array($kode));
            return $query->row_array();
        }

        $sql = "SELECT * FROM data_karyawan ORDER BY kode_karyawan ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getActiveKaryawanData()
    {
        $sql = "SELECT * FROM data_karyawan ORDER BY kode_karyawan ASC";
        $query = $this->db->query($sql, array());
        return $query->result_array();
    }
}