<?php

class Model_auth extends CI_Model
{
    function getLogin($username, $password)
    {
        // cek username dan password di tabel users        
        return $this->db->get_where('users', array('username' => $username, 'password' => $password));

        // $this->db->where("username =  '$username'");
        // $query = $this->db->get('users');
        // return $query->row_array();
    }
}