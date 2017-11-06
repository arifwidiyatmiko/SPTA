<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_m extends CI_Model {

	public function getAll($value='')
	{
		return $this->db->get('tb_dosen');
	}
}
