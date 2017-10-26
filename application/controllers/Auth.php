<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_m','admin');
		
	}
	public function index($val='')
	{
		$this->load->view('login');
	}
	public function login($val='')
	{
		$data = $this->admin->login($this->input->post('username'),$this->input->post('password'));
		if ($data->num_rows() > 0) {
			$this->session->set_userdata('admin',$data->result_array());
			redirect('Admin','refresh');
		}else{
			$info = "<div class='alert alert-danger' role='alert'> Username & Password Mismatch</div>";
			$this->session->set_flashdata('info',$info);
			redirect('Auth','refresh');
		}
	}
}
