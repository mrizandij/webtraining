<?php
class Model_user extends CI_Model
{
    function getDataUser()
    {
        // query dari tabel barang master
        return $this->db->get('users');
    }


    function insertUser($data)
    {
        // quert memasukkan data ke tabel        
        $simpan = $this->db->insert('users', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function getUser($kodeuser)
    {
        return $this->db->get_where("users", array('id_user' => $kodeuser));
    }

    function updateUser($data, $id_user)
    {
        $simpan = $this->db->update('users', $data, array('id_user' => $id_user));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function deleteUser($kodeuser)
    {
        $hapus = $this->db->delete("users", array('id_user' => $kodeuser));
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}