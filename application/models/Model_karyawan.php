<?php
class Model_karyawan extends CI_Model
{
    function getDataKaryawan()
    {
        // query dari tabel barang master
        return $this->db->get('data_karyawan');
    }

    function insertKaryawan($data)
    {
        // quert memasukkan data ke tabel                
        $simpan = $this->db->insert('data_karyawan', $data);
        return $simpan;
        // if ($simpan) {
        //     return 1;
        // } else {
        //     return 0;
        // }
    }

    function deleteKaryawan($kode_karyawan)
    {
        $hapus = $this->db->delete("data_karyawan", array('kode_karyawan' => $kode_karyawan));
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }

    function getKaryawan($kodekaryawan)
    {
        return $this->db->get_where("data_karyawan", array('kode_karyawan' => $kodekaryawan));
    }

    function updateKaryawan($data, $kodekaryawan)
    {
        $update = $this->db->update("data_karyawan", $data, array('kode_karyawan' => $kodekaryawan));
        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function getLastFaktur($bulan, $tahun, $cabang)
    {
        $this->db->select('kode_karyawan');
        $this->db->from('data_karyawan');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tglreg)', $bulan);
        $this->db->where('YEAR(tglreg)', $tahun);
        $this->db->order_by('kode_karyawan', 'desc');
        $this->db->join('users', 'data_karyawan.id_user = users.id_user');
        $this->db->limit(1);
        return $this->db->get();
    }

    function get_no_invoice()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_karyawan,4)) AS kd_max FROM data_karyawan WHERE DATE(tglreg)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'EMP' . date('dmy') . $kd;
    }
}