<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('stok_m');
                $this->load->helper('url');
	}

	public function index()
	{
		$barang = $this->stok_m->tampil_data();
		$data['barang']=$barang;
		$this->template->load('template', 'stok', $data);
	}
}