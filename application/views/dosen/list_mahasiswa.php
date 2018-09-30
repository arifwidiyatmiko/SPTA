
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Mahasiswa <small>Data Mahasiswa</small>
                        </h1>
                        <span class="pull-right" style="margin-left: 10px;"><a href="<?= base_url()?>Mahasiswa" class="btn btn-sm btn-primary">Tambah Mahasiswa</a></span>
                         <span class="pull-right"><a href="<?= base_url()?>Mahasiswa/Export" class="btn btn-sm btn-info">Export</a></span>
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
                    <div class="col-lg-12">
                        <table class="table table-responsive" style="" id="table_mahasiswa">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <!-- <th>Program Studi</th> -->
                                <th>Nama Lengkap</th>
                                <th>Jalur Masuk</th>
                                <!-- <th>Jenis Kelamin</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('#table_mahasiswa').DataTable();

        //datatables
        table = $('#table_mahasiswa').DataTable({ 
 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Dash/get_data_user')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
        } );
    </script>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <div class="modal fade" id="confirm-reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Konfirmasi Reset Password</h4>
                            </div>
                        
                            <div class="modal-body">
                                <p>Anda ingin Mengganti Password?</p>
                                Nama Mahasiswa (NIM) :  <strong><span class="debug-url"></span></strong>
                                <p>Menjadi <b>12345</b></p>
                            </div>
                            
                            <div class="modal-footer">
                                <a class="btn btn-danger btn-ok">Ganti</a>
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
                    $('#confirm-reset').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        $('.debug-url').html($(e.relatedTarget).data('nama')+" ("+$(e.relatedTarget).data('nim')+")");
                    });
                </script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

</body>

</html>
