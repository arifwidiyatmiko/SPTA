<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_m','admin');
		$this->load->model('Dosen_m','dosen');
		
	}
	public function index($value='')
	{
		$data = [];
		$data['dosen'] = $this->dosen->getAll();
		$this->load->view('header', $data, FALSE);
		$this->load->view('dosen/index', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
}