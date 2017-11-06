	<script>
		$(document).ready(function(){
		    $('#data').DataTable();
		});
	</script>
    <div class="page-content">
    	<div class="row">
		  <?php $this->load->view('menu');?>
		  <div class="col-md-10">
		  	<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-6">
		  					<div class="content-box-header">
			  					<div class="panel-title">Dosen</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
					  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
								<br /><br />
							</div>
		  				</div>
		  				<div class="col-md-6">
		  					<div class="content-box-header">
			  					<div class="panel-title">Mahasiswa</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				Harap diperhatikan bahwa :
				  				<ol>
				  				    <li>Mengingatkan mahasiswa untuk melakukan pengisian data Tepat waktu</li>
				  				    <li>Mengingatkan mahasiswa untuk melakukan pengisian dengan benar</li>
				  				</ol>
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Data Mahasiswa</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table id="data" class="table table-bordered">
		  						<thead>
		  							<tr>
		  								<th>NIM </th>
		  								<th>Nama Lengkap</th>
		  								<th>Telpon </th>
		  								<th>Email </th>
		  								<th>Daerah Asal </th>
		  								<th>Jalur Masuk </th>
		  								<th>Aksi </th>
		  							</tr>
		  						</thead>
		  						<tbody>
		  							<?php 
		  							foreach ($mahasiswa->result() as $key) {
		  							?>
		  							<tr>
		  								<td><?php echo $key->NIM;?></td>
		  								<td><?php echo $key->nama;?></td>
		  								<td><?php echo $key->phone;?> </td>
		  								<td><?php echo $key->email;?> </td>
		  								<td><?php echo $key->tempat_lahir;?></td>
		  								<td><?php echo $key->jalur_masuk;?></td>
		  								<td>
		  									<a href="" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
		  								</td>
		  							</tr>
		  							<?php
		  							}
		  							?>
		  						</tbody>
		  					</table>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  </div>
		</div>
    </div>