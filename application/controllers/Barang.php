<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('stok_m');
	}

	public function index()
	{
		$barang = $this->stok_m->tampil_data();
		$data['barang']=$barang;
		$this->template->load('template', 'stok', $data);
	}

	public function getBarang($idBarang)
	{
		$barang = $this->stok_m->getBarang($idBarang);

		echo json_encode($barang);
	}

	public function tambah()
	{
		$this->template->load('template', 'tambah_barang');
	}

	public function store()
	{
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'nama_barang'	=> $this->input->post('nama_barang'),
			'stok' 			=> $this->input->post('stok'),
			'harga' 		=> $this->input->post('harga')
		);

		$this->db->insert('barang', $data);

		$this->session->set_flashdata('success', 'Berhasil menambah barang');
		return redirect(site_url('barang/tambah'));
	}

	public function update()
	{
		$data = array(
			'nama_barang'	=> $this->input->post('nama_barang'),
			'stok' 			=> $this->input->post('stok'),
			'harga' 		=> $this->input->post('harga')
		);

		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('barang', $data);

		$this->session->set_flashdata('success', 'Berhasil mengubah barang');
		return redirect(site_url('stok'));
	}

	public function hapus($idBarang)
	{
		$this->db->where('id_barang', $idBarang);
		$this->db->delete('barang');

		$this->session->set_flashdata('success', 'Berhasil menghapus barang');
		return redirect(site_url('stok'));
	}
}