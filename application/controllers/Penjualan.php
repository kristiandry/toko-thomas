<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('stok_m');
	}

	public function index()
	{
		$barang = $this->stok_m->tampil_data();
		$data['barang'] = $barang;
		// unset($_SESSION['cart']);
		// var_dump($this->session->userdata('cart'));
		// die();
		$data['carts'] = $this->session->userdata('cart');

		$total = 0;
		if (!empty($this->session->userdata('cart'))) {
			foreach ($this->session->userdata('cart') as $cart) {
				$total += $cart['jmlh'];
			}
		}

		$data['total'] = $total;

		$this->template->load('template', 'penjualan', $data);
	}
	public function getHarga($id_barang)
	{
		$barang = $this->stok_m->getBarang($id_barang);
		echo json_encode($barang);
	}

	public function addCart()
	{
		if (!empty($this->session->userdata('cart'))) {
			$cart = $this->session->userdata('cart');
		} else {
			$cart = [];
		}

		if(!empty($cart)) {
			foreach($cart as $c) {
				if($c['idBarang'] == $this->input->post('idBarang')) {
					$this->session->set_flashdata('warning', 'Barang sudah ada dalam keranjang');
					return redirect(site_url('penjualan'));
				}
			}
		}

		$barang = array(
			'idBarang' 		=> $this->input->post('idBarang'),
			'namaBarang' 	=> $this->input->post('namaBarang'),
			'harga' 		=> $this->input->post('harga'),
			'qty' 			=> $this->input->post('qty'),
			'jmlh' 			=> $this->input->post('jmlh')
		);

		array_push($cart, $barang);

		$this->session->set_userdata('cart', $cart);

		return redirect(site_url('penjualan'));
	}

	public function deleteItem($idBarang) 
	{
		$cart = $this->session->userdata('cart');

		foreach($cart as $key=>$value) {
			if($value['idBarang'] == $idBarang) {
				unset($cart[$key]);
			}
		}

		$this->session->set_userdata('cart', $cart);

		$this->session->set_flashdata('success', 'Berhasil menghapus item');
		return redirect(site_url('penjualan'));
	}

	public function checkout() {
		/** Data table penjualan */
		$dataPenjualan = array(
			'tanggal_penjualan' => date('Y-m-d H:i:s'),
			'jumlah_barang' 	=> count($this->session->userdata('cart')),
			'total_harga' 		=> $this->input->post('totalHarga'),
			'total_bayar' 		=> $this->input->post('totalBayar'),
			'kembalian' 		=> $this->input->post('kembalian')
		);
		$this->db->insert('penjualan', $dataPenjualan);
		$penjualanId = $this->db->insert_id();
		/** Data table penjualan */

		/** Data table penjualan detail */
		$data = array();
		foreach($this->session->userdata('cart') as $cart) {
			array_push($data, array(
				'id_penjualan'		=> $penjualanId,
				'id_barang' 		=> $cart['idBarang'],
				'nama_barang' 		=> $cart['namaBarang'],
				'harga' 			=> $cart['harga'],
				'quantity' 			=> $cart['qty'],
				'jumlah' 			=> $cart['jmlh'],
			));

			$this->decreaseStok($cart['idBarang'], $cart['qty']); // pengurangan stok
		}
		$this->db->insert_batch('penjualan_detail', $data);
		/** Data table penjualan detail */

		unset($_SESSION['cart']);

		$this->session->set_flashdata('success', 'Berhasil checkout');
		return redirect(site_url('penjualan'));
	}

	public function printStruk($data) {
		$this->load->view('print_struk', $data);
	}

	private function decreaseStok($idBarang, $qty) {
		$getBarang = $this->stok_m->getBarang($idBarang); // mengambil data barang yg sekarang

		/** pengurangan stok */
		$stok = $getBarang['stok'] - $qty;

		$this->db->where('id_barang', $idBarang);
		$this->db->update('barang', array('stok' => $stok));
		/** #pengurangan stok */
	}

	public function getList()
	{
		$list = $this->input->post('list');
		// $this->load->model('Auth_m');
		// $user = $this->stok_m->listBa($list);
		$data['list'] = $list;
		$this->load->view('nota');
	}
	// public function nota(){
	// 	$idBarang = $this->input->post('iB');
	// 	$namaBarang = $this->input->post('nB');
	// 	$harGa = $this->input->post('hR');
	// 	$qTy = $this->input->post('qT');
	// 	$toTal = $this->input->post('tO');
	// 	$lihat = $this->load->view('nota', $idBarang, $namaBarang, $harGa, $qTy, $toTal);
	// }
}
