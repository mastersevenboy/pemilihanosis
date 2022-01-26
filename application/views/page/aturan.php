 <?php $this->load->view('layout/header'); ?>
<!--  <?php $this->load->view('layout/menu'); ?> -->

<section class="content">
       <div class="container-fluid">
            <div class="row">
            </div>

            <!-- Fungsi untuk menampilkan pesan error sesuai Alert modal yang dikirim kontroller -->
            
            <!-- Basic Examples -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Data Peraturan dan Perubahan Foto Panitia
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn-primary_outline" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">add_box</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#tambahmodal2">Tambah Data Peraturan</a></li>
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
                                            <th>Ketentuan</th>
                                            <th>Panduan Aplikasi</th>
                                            <th>Foto Panitia</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Ketentuan</th>
                                            <th>Panduan Aplikasi</th>
                                            <th>Foto Panitia</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($peraturan as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->ketentuan; ?></td>
                                            <td><?php echo $row->panduan; ?></td>
                                            <td><img height="50px" width="50px" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>"></td>
                                            
                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="Edit data" data-toggle="modal" data-target="#editmodal<?php echo $row->id;?>">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                
                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapusmodal<?php echo $row->id;?>">
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
        <div class="modal fade" id="tambahmodal2" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url(); ?>Welcome/aturan_tambah" method="POST" id="form_validation" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Peraturan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title">Tambah data dengan benar.</h2>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">image</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Pilih Foto maks. 1024 Kb" type="file" class="form-control date" placeholder="Pilih Foto maks. 1024 Kb" name="input_gambar" id="file-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col col-md-12">
                                            <label class=" form-control-label">Ketentuan</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea  class="ckeditor" rows="5" placeholder="Ketentuan" id="ckeditor" name="ketentuan"></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">Ketentuan Pemilihan</small>
                                          </div>
                                          <div class="col col-md-12">
                                            <label class=" form-control-label">Panduan</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea class="ckeditor" rows="5" placeholder="Panduan" id="ckeditor" name="panduan"></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">Panduan Aplikasi</small>
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

        <?php foreach($peraturan as $row) { ?>
 
        <!-- Modal Edit Data -->
        
        <div class="modal fade" id="editmodal<?php echo $row->id;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Welcome/aturan_update/<?php echo $row->id;?>" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data Peraturan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title">Edit data dengan benar.</h2>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="input-group" align="center">
                                                    <img  height="200px" width="200px" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>">
                                                    <input data-toggle="tooltip" data-placement="top" title="" data-original-title="" name="filelama" value="<?=$row->foto ?>" type="hidden" class="form-control date" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">image</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Foto maks. 1024 Kb" type="file" class="form-control date" placeholder="Pilih Foto maks. 1024 Kb" name="input_gambar" id="file-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col col-md-12">
                                                <label class=" form-control-label">Ketentuan</label>
                                                <div class="input-group">
                                                  <div class="col col-md-12">
                                                    <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                    <textarea  class="ckeditor" rows="5" placeholder="Ketentuan" id="ckeditor" name="ketentuan"><?php echo $row->ketentuan;?></textarea>
                                                  </div>
                                                </div>
                                                <small class="form-text text-muted">ex. Ketentuan Panitia . . .</small>
                                              </div>
                                              <div class="col col-md-12">
                                                <label class=" form-control-label">Panduan</label>
                                                <div class="input-group">
                                                  <div class="col col-md-12">
                                                    <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                    <textarea class="ckeditor" rows="5" placeholder="Panduan" id="ckeditor" name="panduan"><?php echo $row->panduan;?></textarea>
                                                  </div>
                                                </div>
                                                <small class="form-text text-muted">ex. 1. Panduan Aplikasi . . .</small>
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

        <div class="modal fade" id="hapusmodal<?php echo $row->id;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Welcome/aturan_delete/<?php echo $row->id;?>" method="POST" id="form_validation">
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