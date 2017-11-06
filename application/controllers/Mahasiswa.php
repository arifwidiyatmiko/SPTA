<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_m','admin');
		$this->load->model('Mahasiswa_m','mahasiswa');
		
	}
	public function index($value='')
	{
		$data = [];
		$data['mahasiswa'] = $this->mahasiswa->getAll();
		$this->load->view('header', $data, FALSE);
		$this->load->view('mahasiswa/index', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
}