
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
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Mahasiswa <small>Ubah Data Mahasiswa</small>
                        </h1>
                        <?php 
                        if ($this->session->flashdata('success')) {
                            echo $this->session->flashdata('success');
                        }
                        ?>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Mahasiswa
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                    <form action="<?= base_url();?>Mahasiswa/update/<?= $this->uri->segment(3)?>" method="POST">
        <h3><b>Biodata</b></h3><hr>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomor Induk Mahasiswa (NIM)</label>
            <input type="text" class="form-control" id="nim" name="nim"  placeholder="Nama Lengkap" value="<?= $mahasiswa['nim']?>"  disabled >
         </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control" id="namaLengkap" name="namaLengkap"  placeholder="Nama Lengkap" value="<?= $mahasiswa['namaLengkap']?>">
         </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" value="<?= $mahasiswa['tempatLahir']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir"  placeholder="Tanggal Lahir" value="<?= substr($mahasiswa['tanggalLahir'], 8,2)."/".substr($mahasiswa['tanggalLahir'], 5,2)."/".substr($mahasiswa['tanggalLahir'], 0,4); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Nomor Hp Aktif</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="08..." onkeypress="return isNumber(event)" value="<?= $mahasiswa['telepon']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="number" class="form-control" id="NIK" name="NIK" placeholder="NIK" onkeypress="return isNumber(event)" value="<?= $mahasiswa['NIK']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="jenisKelamin" id="jenisKelamin" value="L" <?php if($mahasiswa['jenisKelamin']=='L'){echo "checked";}?>>
                    Laki Laki
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="jenisKelamin" id="jenisKelamin" value="P" <?php if($mahasiswa['jenisKelamin']=='P'){echo "checked";}?> >
                    Perempuan
                  </label>
                </div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Jalur Masuk</label>
                <select name="jalurMasuk" class="form-control" id="jalurMasuk">
                    <option disabled>---Pilih ---</option>
                    <option value="USMI/SNMPTN Undangan/SNMPTN" <?php if($mahasiswa['jalurMasuk'] == 'USMI/SNMPTN Undangan/SNMPTN'){echo "selected";} ?>>USMI/SNMPTN Undangan/SNMPTN</option>
                    <option value="REGULER/SBMPTN/Ujian Tulis" <?php  if($mahasiswa['jalurMasuk'] == 'REGULER/SBMPTN/Ujian Tulis'){echo "selected";} ?>>REGULER/SBMPTN/Ujian Tulis</option>
                    <option value="BUD/Beasiswa/Kemitraan/Jalur Kerjasama" <?php if($mahasiswa['jalurMasuk'] == 'BUD/Beasiswa/Kemitraan/Jalur Kerjasama'){echo "selected";} ?>>BUD/Beasiswa/Kemitraan/Jalur Kerjasama</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Nama Ibu Kandung</label>
                <input type="text" class="form-control" id="ibuKandung" name="ibuKandung"   placeholder="Tempat Lahir" value="<?= $mahasiswa['ibuKandung']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="exampleInputEmail1">Tanggal Masuk</label>
                <input type="text" class="form-control" id="tanggalMasuk" name="tanggalMasuk"  placeholder="Tanggal Lahir"  value="<?= substr($mahasiswa['tanggalMasuk'], 8,2)."/".substr($mahasiswa['tanggalMasuk'], 5,2)."/".substr($mahasiswa['tanggalMasuk'], 0,4); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Program Studi</label>
            <select name="programStudi" id="programStudi" class="form-control">
                <option disabled>-- Pilih --</option>
                <?php 
                // print_r($pk);
                foreach ($pk as $key=>$value) {
                    ?><option value="<?php echo $value;?>" <?php  if($mahasiswa['programStudi'] == $value){echo "selected";} ?> ><?php echo $value;?></option><?php
                }
                ?>
            </select>
         </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Batas Waktu Studi</label>
                <input type="number" size="4" class="form-control" id="batasStudi" value="2023" name="batasStudi" onkeypress="return isNumber(event)"  placeholder="Tempat Lahir" value="<?= $mahasiswa['batasStudi']?>">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Tinggi Badan</label>
                <div class="input-group">
                <input type="number" size="3" class="form-control" id="tinggi" name="tinggi" onkeypress="return isNumber(event)" placeholder="Tinggi Badan" value="<?= $mahasiswa['tinggi']?>">
                    <div class="input-group-addon">Cm</div>
                </div>
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Berat Badan</label>
                <div class="input-group">
                <input type="number" size="3" class="form-control" id="berat" name="berat" onkeypress="return isNumber(event) " placeholder="Berat Badan" value="<?= $mahasiswa['berat']?>">
                    <div class="input-group-addon">Kg</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 form-group">
                <label for="exampleInputEmail1">Kewarganegaraan</label>
                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                    <option <?php if($mahasiswa['kewarganegaraan'] =='WNI'){echo "selected";}?>>WNI</option>
                    <option <?php if($mahasiswa['kewarganegaraan'] =='WNA'){echo "selected";}?>>WNA</option>
                </select>
            </div>
            <div class="col-sm-3 form-group">
                <label for="exampleInputEmail1">Golongan Darah</label>
                <select name="golonganDarah" id="golonganDarah" class="form-control">
                    <option <?php if($mahasiswa['golonganDarah'] =='A'){echo "selected";}?>>A</option>
                    <option <?php if($mahasiswa['golonganDarah'] =='B'){echo "selected";}?>>B</option>
                    <option <?php if($mahasiswa['golonganDarah'] =='O'){echo "selected";}?>>O</option>
                    <option <?php if($mahasiswa['golonganDarah'] =='AB'){echo "selected";}?>>AB</option>
                </select>
            </div>
            <div class="col-sm-3 form-group">
                <label for="exampleInputEmail1">Status Perkawinan</label>
                <select name="statusKawin" id="statusKawin" class="form-control">
                    <option <?php if($mahasiswa['statusKawin'] =='Menikah'){echo "selected";}?>>Menikah</option>
                    <option <?php if($mahasiswa['statusKawin'] =='Belum Menikah'){echo "selected";}?>>Belum Menikah</option>
                    <option <?php if($mahasiswa['statusKawin'] =='Janda'){echo "selected";}?>>Janda</option>
                    <option <?php if($mahasiswa['statusKawin'] =='Duda'){echo "selected";}?>>Duda</option>
                </select>
            </div>
            <div class="col-sm-3 form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama"  placeholder="islam/protestan/katolik/hindu/buddha" value="<?= $mahasiswa['agama']?>">
            </div>
        </div>
        <h3><b>Alamat Tempat Tinggal</b></h3><hr>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kota/ Kabupaten</label>
                <input type="text" class="form-control" id="kotaKabupatenTinggal" name="kotaKabupatenTinggal" value="<?= $mahasiswa['kotaKabupatenTinggal']?>" placeholder="Kota Kabupaten">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatanTinggal" name="kecamatanTinggal" value="<?= $mahasiswa['kecamatanTinggal']?>"  placeholder="Kecamatan">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kelurahan</label>
                <input type="text" class="form-control" id="kelurahanTinggal" name="kelurahanTinggal" value="<?= $mahasiswa['kelurahanTinggal']?>" placeholder="Keluruhan">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat Jalan</label>
            <input type="text" class="form-control" id="alamatTinggal" name="alamatTinggal" placeholder="Alamat" value="<?= $mahasiswa['alamatTinggal']?>">
         </div>
         <div class="row">
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kode Pos</label>
                <input type="text" class="form-control" id="kodepos" name="kodepos" onkeypress="return isNumber(event)" placeholder="Kode Pos" value="<?= $mahasiswa['posTinggal']?>">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Nomor RT</label>
                <input type="number" class="form-control" id="rt" name="rt" onkeypress="return isNumber(event)"  value="<?= substr($mahasiswa['rtrwTinggal'], 0,strpos($mahasiswa['rtrwTinggal'], '/')) ?>" placeholder="RT">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Nomor RW</label>
                <input type="number" class="form-control" id="rw" name="rw" onkeypress="return isNumber(event)" value="<?= substr($mahasiswa['rtrwTinggal'], strpos($mahasiswa['rtrwTinggal'], '/')+1) ?>" placeholder="RW">
            </div>
        </div>
        <h3><b>Alamat Domisili/Asal</b></h3><hr>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kota/ Kabupaten</label>
                <input type="text" class="form-control" id="kotaKabupatenDomisili" name="kotaKabupatenDomisili"  placeholder="Kota Kabupaten" value="<?= $mahasiswa['kotaKabupatenDomisili']?>">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatanDomisili" name="kecamatanDomisili"  placeholder="Kecamatan" value="<?= $mahasiswa['kecamatanDomisili']?>">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kelurahan</label>
                <input type="text" class="form-control" id="kelurahanDomisili" name="kelurahanDomisili" placeholder="Keluruhan" value="<?= $mahasiswa['kelurahanDomisili']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat Jalan</label>
            <input type="text" class="form-control" id="alamatTinggal" name="alamatDomisili"  placeholder="Alamat" value="<?= $mahasiswa['alamatDomisili']?>">
         </div>
         <div class="row">
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Kode Pos</label>
                <input type="text" class="form-control" id="posDomisili" name="posDomisili" onkeypress="return isNumber(event)" placeholder="Kode Pos" value="<?= $mahasiswa['posDomisili']?>">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Nomor RT</label>
                <input type="number" class="form-control" id="rtDomisili" name="rtDomisili" onkeypress="return isNumber(event)"  value="<?= substr($mahasiswa['rtrwDomisili'], 0,strpos($mahasiswa['rtrwDomisili'], '/')) ?>" placeholder="RT">
            </div>
            <div class="col-sm-4 form-group">
                <label for="exampleInputEmail1">Nomor RW</label>
                <input type="number" class="form-control" id="rwDomisili" name="rwDomisili" value="<?= substr($mahasiswa['rtrwDomisili'], strpos($mahasiswa['rtrwDomisili'], '/')+1) ?>" onkeypress="return isNumber(event)"  placeholder="RW">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-lg btn-primary" id="btn_submit" value="Simpan">
        </div>
      </form>
      </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
             $( "#tanggalLahir" ).datepicker();
            $( "#tanggalMasuk" ).datepicker();
            // $('#btn_submit').prop('disabled',true);
           
            // $('#table_mahasiswa').DataTable();

        //datatables
        // table = $('#table_mahasiswa').DataTable({ 
 
        //     "processing": true, 
        //     "serverSide": true, 
        //     "order": [], 
             
        //     "ajax": {
        //         "url": "<?php echo site_url('Dash/get_data_user')?>",
        //         "type": "POST"
        //     },
 
             
        //     "columnDefs": [
        //     { 
        //         "targets": [ 0 ], 
        //         "orderable": false, 
        //     },
        //     ],
 
        // });
        } );
    </script>
   <!--  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Mahasiswa</h4>
                            </div>
                        
                            <div class="modal-body">
                                <p>Anda ingin menghapus?</p>
                                Nama Mahasiswa (NIM) :  <strong><span class="debug-url"></span></strong>
                            </div>
                            
                            <div class="modal-footer">
                                <a class="btn btn-danger btn-ok">Hapus</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Gagal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#confirm-delete').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        $('.debug-url').html($(e.relatedTarget).data('nama')+" ("+$(e.relatedTarget).data('nim')+")");
                    });
                </script> -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    

</body>

</html>
