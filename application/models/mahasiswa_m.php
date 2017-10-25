<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function get_all($value='')
	{
		return $this->db->get('tb_mahasiswa');
	}
}
