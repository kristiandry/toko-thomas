<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function index()
	{
		$this->load->view('nota');
	}
}