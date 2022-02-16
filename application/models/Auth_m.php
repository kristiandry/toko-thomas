<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {
    public function login($idKasir, $password){
        $this->db->select('*');
        $this->db->from('kasir');
        $this->db->where('id_kasir', $idKasir);
        $this->db->where('password', $password);
        $query = $this->db->get()->row();
        return $query;
    }
}