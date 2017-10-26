<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_m extends CI_Model {

	public function get_all($value='')
	{
		return $this->db->get('tb_mahasiswa');
	}
}
