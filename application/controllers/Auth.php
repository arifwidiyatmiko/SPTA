<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
	}
	public function index($val='')
	{
		$this->load->view('login');
	}
	public function login($val='')
	{
		if ($this->input->post('username') ==  $this->input->post('password')) {
			// echo $this->uri->segment(3);die();
			$this->session->set_userdata('url',$this->uri->segment(3));
			redirect('Welcome/index/'.$this->uri->segment(3),'refresh');
		}else{
			redirect('Auth','refresh');
		}
	}
}
