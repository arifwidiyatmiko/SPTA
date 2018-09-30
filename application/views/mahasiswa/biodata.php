
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="arifwidiyatmiko">
    <link rel="icon" href="../../favicon.ico">

    <title>Data Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<script type="text/javascript">
		 function isNumber(evt) {
                                    evt = (evt) ? evt : window.event;
                                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                        return false;
                                    }
                                    return true;
                                }
	</script>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
          	<li><a><?= $this->session->userdata('account')['nim']; ?></a></li>
            <li role="presentation"><a href="<?= base_url();?>Auth/destroy">Logout</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Data Mahasiswa</h3>
      </div>

      <form action="<?= base_url();?>Welcome/submit" method="POST">
      	<?php 
      	if ($this->session->flashdata('success')) {
      		echo $this->session->flashdata('success');
      	}
      	?>
      	<h3><b>Biodata</b></h3><hr>
      	<div class="form-group">
			<label for="exampleInputEmail1">Nama Lengkap</label>
		    <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?= $this->session->userdata('account')['namaLengkap']; ?>" placeholder="Nama Lengkap">
		 </div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Tempat Lahir</label>
			    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $this->session->userdata('account')['tempatLahir']; ?>" placeholder="Tempat Lahir">
			</div>
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Tanggal Lahir</label>
			    <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?= substr($this->session->userdata('account')['tanggalLahir'], 8,2)."/".substr($this->session->userdata('account')['tanggalLahir'], 5,2)."/".substr($this->session->userdata('account')['tanggalLahir'], 0,4); ?>" placeholder="Tanggal Lahir">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Nomor Hp Aktif</label>
			    <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $this->session->userdata('account')['telepon']; ?>" placeholder="08..." onkeypress="return isNumber(event)">
			</div>
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">NIK</label>
			    <input type="number" class="form-control" id="NIK" name="NIK" value="<?= $this->session->userdata('account')['NIK']; ?>"  onkeypress="return isNumber(event)">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Jenis Kelamin</label>
			    <div class="radio">
				  <label>
				    <input type="radio" name="jenisKelamin" id="jenisKelamin" value="L" <?php if($this->session->userdata('account')['jenisKelamin'] == 'L'){echo "checked";} ?>>
				    Laki Laki
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="jenisKelamin" id="jenisKelamin" value="P" <?php if($this->session->userdata('account')['jenisKelamin'] == 'P'){echo "checked";} ?>>
				    Perempuan
				  </label>
				</div>
			</div>
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Jalur Masuk</label>
			    <select name="jalurMasuk" class="form-control" id="jalurMasuk">
			    	<option disabled>---Pilih ---</option>
			    	<option value="USMI/SNMPTN Undangan/SNMPTN" <?php if($this->session->userdata('account')['jalurMasuk'] == 'USMI/SNMPTN Undangan/SNMPTN'){echo "selected";} ?>>USMI/SNMPTN Undangan/SNMPTN</option>
			    	<option value="REGULER/SBMPTN/Ujian Tulis" <?php if($this->session->userdata('account')['jalurMasuk'] == 'REGULER/SBMPTN/Ujian Tulis'){echo "selected";} ?>>REGULER/SBMPTN/Ujian Tulis</option>
			    	<option value="BUD/Beasiswa/Kemitraan/Jalur Kerjasama" <?php if($this->session->userdata('account')['jalurMasuk'] == 'BUD/Beasiswa/Kemitraan/Jalur Kerjasama'){echo "selected";} ?>>BUD/Beasiswa/Kemitraan/Jalur Kerjasama</option>
			    </select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Nama Ibu Kandung</label>
			    <input type="text" class="form-control" id="ibuKandung" name="ibuKandung" value="<?= $this->session->userdata('account')['ibuKandung']; ?>" placeholder="Nama Lengkap Ibu Kandung">
			</div>
			<div class="col-sm-6 form-group">
				<label for="exampleInputEmail1">Tanggal Masuk</label>
			    <input type="text" class="form-control" id="tanggalMasuk" name="tanggalMasuk" value="<?= substr($this->session->userdata('account')['tanggalMasuk'], 8,2)."/".substr($this->session->userdata('account')['tanggalMasuk'], 5,2)."/".substr($this->session->userdata('account')['tanggalMasuk'], 0,4); ?>" placeholder="Tanggal Lahir">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Program Studi</label>
		    <select name="programStudi" id="programStudi" class="form-control">
		    	<option disabled>-- Pilih --</option>
		    	<?php 
		    	// print_r($pk);
		    	foreach ($pk as $key=>$value) {
		    		?><option value="<?php echo $value;?>" <?php if($this->session->userdata('account')['programStudi'] ==$value){echo "selected";}?>><?php echo $value;?></option><?php
		    	}
		    	?>
		    </select>
		 </div>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Batas Waktu Studi</label>
			    <input type="number" size="4" class="form-control" id="batasStudi" onkeypress="return isNumber(event)" name="batasStudi" value="<?= $this->session->userdata('account')['batasStudi']; ?>" placeholder="Tempat Lahir">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Tinggi Badan</label>
				<div class="input-group">
     				 
			    <input type="number" size="3" class="form-control" onkeypress="return isNumber(event)" id="tinggi" name="tinggi" value="<?= $this->session->userdata('account')['tinggi']; ?>" placeholder="Tinggi Badan">
			    	<div class="input-group-addon">Cm</div>
				</div>
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Berat Badan</label>
				<div class="input-group">
			    <input type="number" size="3" class="form-control" onkeypress="return isNumber(event)" id="berat" name="berat" value="<?= $this->session->userdata('account')['berat']; ?>" placeholder="Berat Badan">
			    	<div class="input-group-addon">Kg</div>
			    </div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 form-group">
				<label for="exampleInputEmail1">Kewarganegaraan</label>
			    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
			    	<option <?php if($this->session->userdata('account')['kewarganegaraan'] =='WNI'){echo "selected";}?>>WNI</option>
			    	<option <?php if($this->session->userdata('account')['kewarganegaraan'] =='WNA'){echo "selected";}?>>WNA</option>
			    </select>
			</div>
			<div class="col-sm-3 form-group">
				<label for="exampleInputEmail1">Golongan Darah</label>
			    <select name="golonganDarah" id="golonganDarah" class="form-control">
			    	<option <?php if($this->session->userdata('account')['golonganDarah'] =='A'){echo "selected";}?>>A</option>
			    	<option <?php if($this->session->userdata('account')['golonganDarah'] =='B'){echo "selected";}?>>B</option>
			    	<option <?php if($this->session->userdata('account')['golonganDarah'] =='O'){echo "selected";}?>>O</option>
			    	<option <?php if($this->session->userdata('account')['golonganDarah'] =='AB'){echo "selected";}?>>AB</option>
			    </select>
			</div>
			<div class="col-sm-3 form-group">
				<label for="exampleInputEmail1">Status Perkawinan</label>
			    <select name="statusKawin" id="statusKawin" class="form-control">
			    	<option <?php if($this->session->userdata('account')['statusKawin'] =='Menikah'){echo "selected";}?>>Menikah</option>
			    	<option <?php if($this->session->userdata('account')['statusKawin'] =='Belum Menikah'){echo "selected";}?>>Belum Menikah</option>
			    	<option <?php if($this->session->userdata('account')['statusKawin'] =='Janda'){echo "selected";}?>>Janda</option>
			    	<option <?php if($this->session->userdata('account')['statusKawin'] =='Duda'){echo "selected";}?>>Duda</option>
			    </select>
			</div>
			<div class="col-sm-3 form-group">
				<label for="exampleInputEmail1">Agama</label>
			    <input type="text" class="form-control" id="agama" name="agama" value="<?= $this->session->userdata('account')['agama']; ?>" placeholder="islam/protestan/katolik/hindu/buddha">
			</div>
		</div>
		<h3><b>Alamat Tempat Tinggal</b></h3><hr>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kota/ Kabupaten</label>
			    <input type="text" class="form-control" id="kotaKabupatenTinggal" name="kotaKabupatenTinggal" value="<?= $this->session->userdata('account')['kotaKabupatenTinggal']; ?>" placeholder="Kota Kabupaten">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kecamatan</label>
			    <input type="text" class="form-control" id="kecamatanTinggal" name="kecamatanTinggal" value="<?= $this->session->userdata('account')['kecamatanTinggal']; ?>" placeholder="Kecamatan">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kelurahan</label>
			    <input type="text" class="form-control" id="kelurahanTinggal" name="kelurahanTinggal" value="<?= $this->session->userdata('account')['kelurahanTinggal']; ?>" placeholder="Keluruhan">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat Jalan</label>
		    <input type="text" class="form-control" id="alamatTinggal" name="alamatTinggal" value="<?= $this->session->userdata('account')['alamatTinggal']; ?>" placeholder="Alamat">
		 </div>
		 <div class="row">
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kode Pos</label>
			    <input type="number" class="form-control" id="kodepos" name="kodepos" value="<?= $this->session->userdata('account')['posTinggal']; ?>" placeholder="Kode Pos" onkeypress="return isNumber(event)">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Nomor RT</label>
			    <input type="number" class="form-control" id="rt" name="rt" value="<?= substr($this->session->userdata('account')['rtrwTinggal'], 0,strpos($this->session->userdata('account')['rtrwTinggal'], '/')) ?>" placeholder="RT" onkeypress="return isNumber(event)">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Nomor RW</label>
			    <input type="number" class="form-control" id="rw" name="rw" value="<?= substr($this->session->userdata('account')['rtrwTinggal'], strpos($this->session->userdata('account')['rtrwTinggal'], '/')+1) ?>" placeholder="RW" onkeypress="return isNumber(event)">
			</div>
		</div>
		<h3><b>Alamat Domisili/Asal</b></h3><hr>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kota/ Kabupaten</label>
			    <input type="text" class="form-control" id="kotaKabupatenDomisili" name="kotaKabupatenDomisili" value="<?= $this->session->userdata('account')['kotaKabupatenDomisili']; ?>" placeholder="Kota Kabupaten">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kecamatan</label>
			    <input type="text" class="form-control" id="kecamatanDomisili" name="kecamatanDomisili" value="<?= $this->session->userdata('account')['kecamatanDomisili']; ?>" placeholder="Kecamatan">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kelurahan</label>
			    <input type="text" class="form-control" id="kelurahanDomisili" name="kelurahanDomisili" value="<?= $this->session->userdata('account')['kelurahanDomisili']; ?>" placeholder="Keluruhan">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat Jalan</label>
		    <input type="text" class="form-control" id="alamatTinggal" name="alamatDomisili" value="<?= $this->session->userdata('account')['alamatDomisili']; ?>" placeholder="Alamat">
		 </div>
		 <div class="row">
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Kode Pos</label>
			    <input type="number" class="form-control" id="posDomisili" name="posDomisili" value="<?= $this->session->userdata('account')['posDomisili']; ?>" placeholder="Kode Pos" onkeypress="return isNumber(event)">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Nomor RT</label>
			    <input type="number" class="form-control" id="rtDomisili" name="rtDomisili" value="<?= substr($this->session->userdata('account')['rtrwDomisili'], 0,strpos($this->session->userdata('account')['rtrwDomisili'], '/')) ?>" placeholder="RT" onkeypress="return isNumber(event)">
			</div>
			<div class="col-sm-4 form-group">
				<label for="exampleInputEmail1">Nomor RW</label>
			    <input type="number" class="form-control" id="rwDomisili" name="rwDomisili" value="<?= substr($this->session->userdata('account')['rtrwDomisili'], strpos($this->session->userdata('account')['rtrwDomisili'], '/')+1) ?>" placeholder="RW" onkeypress="return isNumber(event)">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-lg btn-primary" value="Simpan">
		</div>
      </form>

      <footer class="footer">
        <p>&copy; <?php echo date('Y');?> <a href="https://svipb.id/">svipb.id</a>.</p>
      </footer>

    </div> <!-- /container -->

	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>  
	 <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>   
    <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
		  $( function() {
		    $( "#tanggalLahir" ).datepicker();
		    $( "#tanggalMasuk" ).datepicker();

		  } );
    </script>
  </body>
</html>
