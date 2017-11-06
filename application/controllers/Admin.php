<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_m','admin');
		if (!$this->session->userdata('admin')) {
			redirect('Auth','refresh');
		}
		
	}
	public function index($value='')
	{
		$data = [];
		$this->load->view('header', $data, FALSE);
		$this->load->view('admin/index', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
}