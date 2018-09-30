<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

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
	}

	public function index()
	{
		$this->load->view('dosen/header');
		$data['pk'] = $this->Mahasiswa_model->get_enum_values('mahasiswa','programStudi');
		$this->load->view('dosen/tambahMahasiswa',$data);
	}
	public function json($value='')
	{
		$data = $this->Mahasiswa_model->nimSearch($value);
		echo json_encode($data);
	}

	public function edit($nim)
	{
		$data['pk'] = $this->Mahasiswa_model->get_enum_values('mahasiswa','programStudi');
		$data['mahasiswa'] = $this->Mahasiswa_model->getId($nim)->result_array()[0];
		$this->load->view('dosen/header');
		$this->load->view('dosen/updateMahasiswa', $data);

	}

	public function update($value)
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
			'rtrwDomisili' => $this->input->post('rtDomisili')."/".$this->input->post('rwDomisili'),
			'telepon' => $this->input->post('telepon'), 
			'NIK' => $this->input->post('NIK'), 
			// 'isConfirm'=>0,
			// 'passwordChanged'=>0
		);
		// $data['nim'] = $this->input->post('nim');
		// $data['password'] = md5('12345');
		// echo json_encode($data);die();
		$this->Mahasiswa_model->update($value,$data);
		$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Biodata '.$value.' Berhasil diupdate ke sistem.
</div>');
		redirect('Dash/index','refresh');
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
			'rtrwDomisili' => $this->input->post('rtDomisili')."/".$this->input->post('rwDomisili'),
			'telepon' => $this->input->post('telepon'), 
			'NIK' => $this->input->post('NIK'), 
			'isConfirm'=>0,
			'passwordChanged'=>0
		);
		$data['nim'] = $this->input->post('nim');
		$data['password'] = md5('12345');
		// echo json_encode($data);die();
		$this->Mahasiswa_model->insert($data);
		$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  '.$data['nim'].' Berhasil ditambahkan ke sistem.
</div>');
		redirect('Dash/index','refresh');
	}
	public function reset($nim)
	{
		$data = array('passwordChanged' => 0,'password'=>md5('12345'));
		$this->Mahasiswa_model->update($nim,$data);
		$this->session->set_flashdata('success','<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Password untuk '.$nim.' Berhasil Di ubah menjadi 12345.
</div>');
		redirect('Dash/index','refresh');
	}
	public function hapus($val)
	{
		$this->Mahasiswa_model->delete($val);
		$this->session->set_flashdata('success','<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Data '.$val.' Berhasil DI hapus.
</div>');
		redirect('Dash/index','refresh');
	}
	public function Export($value='')
	{
// 		$this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">
//   <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
//   Sedang Dalam Pengembangan.
// </div>');
// 		redirect('Dash/index','refresh');
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // echo "sdsa";
	     // Settingan awal fil excel
    $excel->getProperties()->setCreator('Sistem')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Mahasiswa Diploma")
                 ->setSubject("Siswa")
                 ->setDescription("Laporan Semua Data Siswa")
                 ->setKeywords("Data Siswa");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "0"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B1', "1"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C1', "2"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D1', "3"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E1', "4"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('F1', "5"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('G1', "6"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('H1', "7"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('I1', "8"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('J1', "9"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('K1', "10"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->createSheet(1);
	    $excel->setActiveSheetIndex(1)->setCellValue('A1', "0"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(1)->setCellValue('B1', "1"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(1)->setCellValue('C1', "2"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(1)->setCellValue('D1', "3"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(1)->setCellValue('E1', "4"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('F1', "5"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('G1', "6"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('H1', "7"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('I1', "8"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('J1', "9"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('K1', "10"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('L1', "11"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('M1', "12"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('N1', "13"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('O1', "14"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('P1', "15"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('Q1', "16"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('R1', "17"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('S1', "18"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('T1', "19"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('U1', "20"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('V1', "21"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('W1', "22"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(1)->setCellValue('X1', "23"); // Set kolom E3 dengan tulisan "ALAMAT"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);

	    $result = $this->Mahasiswa_model->getAll()->result();

	     $no = 1; // Untuk penomoran tabel, di awal set dengan 1
		    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		    foreach($result as $data){ // Lakukan looping pada variabel siswa
		      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
		      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->namaLengkap);
		      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggalLahir);
		      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempatLahir);
		      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jenisKelamin);
		      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jalurMasuk);
		      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tanggalMasuk);
		      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, substr($data->nim, 2,1));
		      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->programStudi);
		      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->ibuKandung);
		      // $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jalurMasuk);

		      
		      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		      

		      $excel->setActiveSheetIndex(1)->setCellValue('B'.$numrow, $data->nim);
		      $excel->setActiveSheetIndex(1)->setCellValue('C'.$numrow, $data->batasStudi);
		      $excel->setActiveSheetIndex(1)->setCellValue('D'.$numrow, $data->tinggi);
		      $excel->setActiveSheetIndex(1)->setCellValue('E'.$numrow, $data->berat);
		      $excel->setActiveSheetIndex(1)->setCellValue('F'.$numrow, $data->alamatTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('G'.$numrow, $data->rtrwTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('H'.$numrow, $data->posTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('I'.$numrow, $data->kelurahanTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('J'.$numrow, $data->kecamatanTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('K'.$numrow, $data->kotaKabupatenTinggal);
		      $excel->setActiveSheetIndex(1)->setCellValue('L'.$numrow, $data->alamatDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('M'.$numrow, $data->rtrwDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('N'.$numrow, $data->posDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('O'.$numrow, $data->kelurahanDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('P'.$numrow, $data->kecamatanDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('Q'.$numrow, $data->kotaKabupatenDomisili);
		      $excel->setActiveSheetIndex(1)->setCellValue('R'.$numrow, $data->kewarganegaraan);
		      $excel->setActiveSheetIndex(1)->setCellValue('S'.$numrow, 'INDONESIA');
		      $excel->setActiveSheetIndex(1)->setCellValue('T'.$numrow, $data->telepon);
		      $excel->setActiveSheetIndex(1)->setCellValue('U'.$numrow, $data->agama);
		      $excel->setActiveSheetIndex(1)->setCellValue('V'.$numrow, $data->golonganDarah);
		      $excel->setActiveSheetIndex(1)->setCellValue('W'.$numrow, $data->statusKawin);
		      $excel->setActiveSheetIndex(1)->setCellValue('X'.$numrow, $data->NIK);

		      $no++; // Tambah 1 setiap kali looping
		      $numrow++; // Tambah 1 setiap kali looping
		    }

			    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		    // Set orientasi kertas jadi LANDSCAPE
		    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		    // Set judul file excel nya
		     $excel->setActiveSheetIndex(0);
		    $excel->getActiveSheet(0)->setTitle("Mahasiswa");
		    $excel->getActiveSheet(1)->setTitle("Mahasiswa & Biodata");
		   
		    // Proses file excel
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		    header('Cache-Control: max-age=0');
		    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		    $write->save('php://output');
	}
}
