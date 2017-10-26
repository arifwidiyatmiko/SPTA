<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

	public function login($user,$pass)
	{
		$this->db->where('username',$user);
		$this->db->where('password',md5($pass));
		return $this->db->get('tb_admin');
	}
}
