<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {
    public function getPenjualans(){

        $query = $this->db->get('penjualan')->result_array();
            return $query;
    }

    public function getPenjualan($idPenjualan){

        $query = $this->db->where('id_penjualan', $idPenjualan)->get('penjualan')->row_array();
            return $query;
    }

    public function getPenjualanDetais(){

        $query = $this->db->order_by('id_penjualan_detail', 'DESC')->get('penjualan_detail')->result_array();
            return $query;
    }

    public function getPenjualanDetail($idPenjualan){

        $query = $this->db->where('id_penjualan', $idPenjualan)->get('penjualan_detail')->result_array();
            return $query;
    }
}
