 <?php $this->load->view('layout/header'); ?>
<!--  <?php $this->load->view('layout/menu'); ?> -->

<section class="content">
       <div class="container-fluid">
            <div class="row">
            </div>

            <!-- Fungsi untuk menampilkan pesan error sesuai Alert modal yang dikirim kontroller -->
            
            <!-- Basic Examples -->
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-black">
                            <h2>
                                Data Panitia Pemilihan Ketua OSIS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn-primary_outline" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">add_box</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#tambahmodal">Tambah Data Panitia</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   <thead>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($panitia as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $row->nama; ?></td>
                                            <td align="center"><?php echo $row->status; ?></td>          
                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="Edit data" data-toggle="modal" data-target="#editmodal<?php echo $row->id_panitia;?>">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                
                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapusmodal<?php echo $row->id_panitia;?>">
                                                    <i class="material-icons" title="Hapus data">delete_forever</i>
                                                </button>                                          
                                            </td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url(); ?>Panitia/tambah" method="POST" id="form_validation" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Panitia</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title">Tambah data dengan benar.</h2>
                                        <div class="row clearfix">
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Nama" type="text" class="form-control date" placeholder="nama" name="nama" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <b>Status</b>
                                                        </p>
                                                        <select class="form-control show-tick" name="status">
                                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                            <option value="Kesiswaan">Kesiswaan</option>
                                                            <option value="Ketua Panitia">Ketua Panitia</option>
                                                            <option value="Panitia">Panitia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
         
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">Simpan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach($panitia as $row) { ?>

        <!-- Modal Edit Data -->
        
           <div class="modal fade" id="editmodal<?php echo $row->id_panitia;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Panitia/update/<?php echo $row->id_panitia;?>" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data Panitia</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title">Edit data dengan benar.</h2>
                                        <div class="row clearfix">
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Nama" value="<?php echo $row->nama ?>" type="text" class="form-control date" placeholder="Nama" name="nama" >
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Status</b>
                                                    </p>
                                                    <?php if ($row -> status == "Kepala Sekolah") {
                                                        echo '<select class="form-control show-tick" name="status">
                                                        <option value="Kepala Sekolah" selected>Kepala Sekolah</option>
                                                        <option value="Kesiswaan">Kesiswaan</option>
                                                        <option value="Ketua Panitia">Ketua Panitia</option>
                                                        <option value="Panitia">Panitia</option>
                                                    </select>';
                                                    }elseif($row -> status == "Kesiswaan"){
                                                        echo '<select class="form-control show-tick" name="status">
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Kesiswaan" selected>Kesiswaan</option>
                                                        <option value="Ketua Panitia">Ketua Panitia</option>
                                                        <option value="Panitia">Panitia</option>
                                                    </select>';
                                                    }elseif($row -> status == "Ketua Panitia"){
                                                        echo '<select class="form-control show-tick" name="status">
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Kesiswaan">Kesiswaan</option>
                                                        <option value="Ketua Panitia" selected>Ketua Panitia</option>
                                                        <option value="Panitia">Panitia</option>
                                                    </select>';
                                                    }else{
                                                        echo '<select class="form-control show-tick" name="status">
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Kesiswaan">Kesiswaan</option>
                                                        <option value="Ketua Panitia">Ketua Panitia</option>
                                                        <option value="Panitia" selected>Panitia</option>
                                                    </select>';
                                                    } ?>
                                                </div>
                                            </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">Simpan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
           </div>


            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusmodal<?php echo $row->id_panitia;?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <form action="<?php echo base_url()?>Panitia/delete/<?php echo $row->id_panitia;?>" method="POST">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="smallModalLabel">Konfirmasi hapus</h4>
                                </div>
                                <div class="modal-body">
                                    <font color="red" size="3">Apakah Data akan dihapus ?</font>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-link waves-effect">Hapus</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
          <?php } ?>   
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

 <?php $this->load->view('layout/script_atas'); ?>
 <?php $this->load->view('layout/script_datatables'); ?>
 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>