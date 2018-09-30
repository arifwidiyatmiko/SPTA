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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->load->view('mahasiswa/login');
	}

	public function login($value='')
	{
		$this->load->view('dosen/login');
	}
	public function in($in='')
	{
		$array = array('nim'=>strtoupper($this->input->post('nim')),'password'=>md5($this->input->post('password')));
		$data = $this->Mahasiswa_model->getWhere($array);
		// print_r($data);die();
		if ($data->num_rows() == 0) {
			redirect('Auth','refresh');
		}
		$res = $data->result_array()[0];
		$this->session->set_userdata('account',$res);
		// print_r($data->result_array()[0]['passwordChanged']);die();
		if ($data->result_array()[0]['passwordChanged'] == 0) {
			// $this->load->view('mahasiswa/gantipass', $res);
			redirect('Welcome/changePass','refresh');
		}else{
			redirect('Welcome/index','refresh');
		}
	}
	public function signin($value='')
	{
		$array = array('email'=>strtoupper($this->input->post('email')),'password'=>md5($this->input->post('password')));
		// print_r($array);die();
		$data = $this->Admin_model->getWhere($array);
		// print_r($data);die();
		if ($data->num_rows() == 0) {
			redirect('Auth/login','refresh');
		}
		$res = $data->result_array()[0];
		$this->session->set_userdata('account',$res);
		// echo "string";
		redirect('Dash/index','refresh');
	}
	public function destroy()
	{
		$this->session->unset_userdata('account');
		$this->session->sess_destroy();
		redirect('Welcome','refresh');
	}
	public function destroys()
	{
		$this->session->unset_userdata('account');
		$this->session->sess_destroy();
		redirect('Dash','refresh');
	}
	public function changePass()
	{
		$password = array('password' => md5($this->input->post('password')),'passwordChanged'=>1);
		$this->Mahasiswa_model->update($this->session->userdata('account')['nim'],$password);
		redirect('Welcome/index','refresh');
	}

}
