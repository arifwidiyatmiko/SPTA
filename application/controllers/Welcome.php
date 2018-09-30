<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if (!$this->session->userdata('account')) {
			redirect('Auth','refresh');
		}
		
		$data = $this->Mahasiswa_model->getId($this->session->userdata('account')['nim']);
		$res = $data->result_array()[0];
		$this->session->set_userdata('account',$res);
	}

	public function index()
	{
		if ($this->session->userdata('account')['passwordChanged'] == 0) {
			redirect('Welcome/changePass','refresh');
		}
		$data['pk'] = $this->Mahasiswa_model->get_enum_values('mahasiswa','programStudi');
		$this->load->view('mahasiswa/biodata',$data);
	}
	public function submit($value='')
	{
		$data = array(
			'namaLengkap' => strtoupper($this->input->post('namaLengkap')), 
			'tempatLahir' => strtoupper($this->input->post('tempatLahir')), 
			'tanggalLahir' => date("Y-m-d",strtotime($this->input->post('tanggalLahir'))), 
			'jenisKelamin' => $this->input->post('jenisKelamin'), 
			'jalurMasuk' => $this->input->post('jalurMasuk'), 
			'ibuKandung' => strtoupper($this->input->post('ibuKandung')), 
			'tanggalMasuk' => date("Y-m-d",strtotime($this->input->post('tanggalMasuk'))), 
			'programStudi' => $this->input->post('programStudi'), 
			'batasStudi' => '2023', 
			'tinggi' => $this->input->post('tinggi'), 
			'berat' => $this->input->post('berat'), 
			'kewarganegaraan' => $this->input->post('kewarganegaraan'), 
			'golonganDarah' => $this->input->post('golonganDarah'), 
			'statusKawin' => $this->input->post('statusKawin'), 
			'agama' => strtoupper($this->input->post('agama')), 
			'alamatTinggal' => $this->input->post('alamatTinggal'), 
			'kotakabupatenTinggal' => $this->input->post('kotaKabupatenTinggal'), 
			'kecamatanTinggal' => $this->input->post('kecamatanTinggal'), 
			'kelurahanTinggal' => $this->input->post('kelurahanTinggal'), 
			'posTinggal' => $this->input->post('kodepos'), 
			'rtrwTinggal' => $this->input->post('rt')."/".$this->input->post('rw'), 
			'alamatDomisili' => $this->input->post('alamatDomisili'), 
			'kotakabupatenDomisili' => $this->input->post('kotaKabupatenDomisili'), 
			'kecamatanDomisili' => $this->input->post('kecamatanDomisili'), 
			'kelurahanDomisili' => $this->input->post('kelurahanDomisili'), 
			'posDomisili' => $this->input->post('posDomisili'), 
			'telepon' => $this->input->post('telepon'), 
			'NIK' => $this->input->post('NIK'), 
			'rtrwDomisili' => $this->input->post('rtDomisili')."/".$this->input->post('rwDomisili'),
			'isConfirm'=>1 
		);
		// print_r($data);
		$this->Mahasiswa_model->update($this->session->userdata('account')['nim'],$data);
		$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Terima Kasih sudah memperbarui Biodata.
</div>');
		redirect('Welcome');
	}
	public function changePass($value='')
	{
		$this->load->view('mahasiswa/gantipass');
	}
}
