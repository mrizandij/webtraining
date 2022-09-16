 <?php
    class Model_invoice extends CI_Model
    {
        function get_no_invoice()
        {
            $q = $this->db->query("SELECT MAX(RIGHT(nobukti,4)) AS kd_max FROM histori_bayar WHERE DATE(tglbayar)=CURDATE()");
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
            return date('dmy') . $kd;
        }

        // function simpan_invoice($no_invoice)
        // {
        //     // $simpan = $this->db->update('cabang', $data, array('kode_cabang' => $kodecabang));
        //     $hasil = $this->db->insert('histori_bayar', $no_invoice);
        //     if ($hasil) {
        //         return 1;
        //     } else {
        //         return 0;
        //     }
        // }
    }