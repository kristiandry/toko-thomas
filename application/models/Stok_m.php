<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_m extends CI_Model {
    public function tampil_data(){

        $query = $this->db->get('barang')->result_array();
            return $query;
    }
    public function getBarang($idBarang){

        $query = $this->db->where('id_barang', $idBarang)->get('barang')->row_array();
            return $query;
    }
}
