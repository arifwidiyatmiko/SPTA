<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_m','admin');
		
	}
	public function index($value='')
	{
		$data = [];
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('admin/index', $data, FALSE);
		$this->load->view('admin/footer', $data, FALSE);
	}
}