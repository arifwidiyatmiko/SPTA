<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

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
			redirect('Auth/login','refresh');
		}
		// $this->load->model('Admin_model');
		// echo "On Dash";die();	
	}

	public function index()
	{
		// echo "string";die();
		// if ($this->session->userdata('account')['passwordChanged'] == 0) {
		// 	redirect('Welcome/changePass','refresh');
		// }
		$data['mahasiswa'] = $this->Mahasiswa_model->getAll();
		$this->load->view('dosen/header');
		$this->load->view('dosen/list_mahasiswa',$data);
	}

	 function get_data_user()
    {
        $list = $this->Mahasiswa_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nim;
            $row[] = $field->namaLengkap;
            $row[] = $field->jalurMasuk;
 			$row[] = '<div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="'.base_url().'Mahasiswa/edit/'.$field->nim.'">Ubah Biodata</a></li>
                                        <li><a data-href="'.base_url().'Mahasiswa/reset/'.$field->nim.'"  data-nim="'.$field->nim.'" data-nama="'.$field->namaLengkap.'" data-toggle="modal" data-target="#confirm-reset">Reset Password</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a data-href="'.base_url().'Mahasiswa/hapus/'.$field->nim.'"  data-nim="'.$field->nim.'" data-nama="'.$field->namaLengkap.'" data-toggle="modal" data-target="#confirm-delete" >Hapus</a></li>
                                      </ul>
                                    </div>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mahasiswa_model->count_all(),
            "recordsFiltered" => $this->Mahasiswa_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function submit($value='')
	{
		$data = array(
			'namaLengkap' => $this->input->post('namaLengkap'), 
			'tempatLahir' => $this->input->post('tempatLahir'), 
			'tanggalLahir' => date("Y-m-d",strtotime($this->input->post('tanggalLahir'))), 
			'jenisKelamin' => $this->input->post('jenisKelamin'), 
			'jalurMasuk' => $this->input->post('jalurMasuk'), 
			'ibuKandung' => $this->input->post('ibuKandung'), 
			'tanggalMasuk' => date("Y-m-d",strtotime($this->input->post('tanggalMasuk'))), 
			'programStudi' => $this->input->post('programStudi'), 
			'batasStudi' => $this->input->post('batasStudi'), 
			'tinggi' => $this->input->post('tinggi'), 
			'berat' => $this->input->post('berat'), 
			'kewarganegaraan' => $this->input->post('kewarganegaraan'), 
			'golonganDarah' => $this->input->post('golonganDarah'), 
			'statusKawin' => $this->input->post('statusKawin'), 
			'agama' => $this->input->post('agama'), 
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
			'rtrwDomisili' => $this->input->post('rtDomisili')."/".$this->input->post('rwDomisili'),
			'telepon' => $this->input->post('telepon'), 
			'NIK' => $this->input->post('NIK'), 
			'isConfirm'=>0,
			'passwordChanged'=>0
		);
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
