<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->load->view('login');
	}
	public function process(){
		if(!$this->input->post('IdKasir')){
			$this->session->set_flashdata('error', 'Silahkan masukan Id Kasir anda!');
			return redirect(site_url('auth/login'));
		}
		if(!$this->input->post('password')){
			$this->session->set_flashdata('error', 'Silahkan masukan Password anda!');
			return redirect(site_url('auth/login'));
		}

		$idKasir = $this->input->post('IdKasir');
		$password = md5($this->input->post('password'));

		$this->load->model('Auth_m');
		$user = $this->Auth_m->login($idKasir, $password);
		if(!$user){
			$this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
			return redirect(site_url('auth/login'));
		}
		$this->session->set_userdata([
			'idKasir'=> $user->id_kasir,
			'namaKasir'=> $user->nama_kasir,
			'logged_in'=> TRUE
		]);
		return redirect(site_url('dashboard'));
	}

	public function logout(){
		session_destroy();
		return redirect(site_url('auth/login'));
	}
	// public function process(){
	// 	$post = $this->input->post(null, TRUE);
	// 	if(isset($post['login'])) {
	// 		$this->load->model('User_m');
	// 		$query = $this->User_m->login($post);
	// 		if($query->num_rows() > 0) {
	// 			$row = $query->row();
	// 			echo "<script>
	// 			alert('Selamat, Login berhasil');
	// 			window.location='".site_url('dashboard')."';
	// 			</script>";
	// 		}else{
	// 			echo "<script>
	// 			alert('Login Gagal, Id atau Password salah');
	// 			window.location='".site_url('auth/login')."';
	// 			</script>";
	// 		}
	// 	}
	// }
}
