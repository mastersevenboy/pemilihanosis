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
                                Data Calon Kandidat
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn-primary_outline" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">add_box</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#tambahmodal">Tambah Data Kandidat</a></li>
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
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($isi as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $row->nis_kandidat; ?></td>
                                            <td align="center"><?php echo $row->nama; ?></td>
                                            <td align="center"><?php echo $row->kelas; ?></td>
                                            <td align="center"><?php echo $row->jurusan; ?></td>
                                            <td align="center"><img height="50px" width="50px" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>"></td>
                                            
                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="Edit data" data-toggle="modal" data-target="#editmodal<?php echo $row->nis_kandidat;?>">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                
                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapusmodal<?php echo $row->nis_kandidat;?>">
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
                    <form action="<?php echo base_url(); ?>Kandidat/tambah" method="POST" id="form_validation" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Kandidat</h4>
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
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="NIS" type="text" class="form-control date" placeholder="nis" name="nis_kandidat">
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">room</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tempat" type="text" class="form-control date" placeholder="Tempat Lahir" name="tempat" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">event</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tgl_lahir" type="date" class="form-control date" placeholder="tgl_lahir" name="tgl_lahir" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jenis Kelamin</b>
                                                    </p>
                                                    <select class="form-control show-tick" name="jk">
                                                        <option value="P">Perempuan</option>
                                                        <option value="L">Laki-Laki</option>
                                                    </select>
                                                </div>
                                            </div></div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Kelas</b>
                                                    </p>
                                                    <select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                </div>
                                            </div></div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jurusan</b>
                                                    </p>
                                                    <select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>
                                                </div>
                                            </div></div>
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
                                            <div class="col col-md-6">
                                            <label class=" form-control-label">Visi</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea  class="ckeditor" rows="5" placeholder="Visi" id="ckeditor" name="visi"></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">ex. Memajukan . . .</small>
                                          </div>
                                          <div class="col col-md-6">
                                            <label class=" form-control-label">Misi</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea class="ckeditor" rows="5" placeholder="Misi" id="ckeditor" name="misi"></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">ex. 1. Melakukan . . .</small>
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

        <?php foreach($isi as $row) { ?>

        <!-- Modal Edit Data -->
        
           <div class="modal fade" id="editmodal<?php echo $row->nis_kandidat;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Kandidat/update_kandidat/<?php echo $row->nis_kandidat;?>" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data Kandidat</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title">Edit data dengan benar.</h2>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="input-group" align="center">
                                                    <img  height="200px" width="200px" alt="<?= $row->foto; ?>" src="<?= base_url() ?>./assets/images/<?= $row->foto; ?>"
                                                    class="rounded-circle">

                                                    <input data-toggle="tooltip" data-placement="top" title="" data-original-title="" name="filelama" value="<?=$row->foto ?>" type="hidden" class="form-control date" placeholder="">
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nis" value="<?php echo $row->nis_kandidat ?>" type="text" class="form-control date" placeholder="nis" name="nis_kandidat" >
                                                    </div>
                                                </div>
                                            </div>
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
                                              <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">room</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tempat" type="text" class="form-control date" placeholder="Tempat Lahir" name="tempat" value="<?php echo $row->tempat?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">event</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tgl_lahir" type="date" class="form-control date" placeholder="tgl_lahir" name="tgl_lahir" value="<?php echo $row->tgl_lahir?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jenis Kelamin</b>
                                                    </p>
                                                    <?php if ($row -> jk == "L") {
                                                        echo '<select class="form-control show-tick" name="jk">
                                                        <option value="P">Perempuan</option>
                                                        <option value="L" selected>Laki-Laki</option>
                                                    </select>';

                                                    }
                                                    else {
                                                       echo '<select class="form-control show-tick" name="jk">
                                                        <option value="P" selected>Perempuan</option>
                                                        <option value="L">Laki-Laki</option>
                                                    </select>'; 
                                                    } ?>
                                                    
                                                </div>
                                            </div></div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Kelas</b>
                                                    </p>
                                                    <?php if ($row -> kelas == "X") {
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X" selected>X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>';
                                                    }elseif($row -> kelas == "XI"){
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI" selected>XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>';
                                                    }else{
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII" selected>XII</option>
                                                    </select>';
                                                    } ?>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jurusan</b>
                                                    </p>
                                                    <?php if ($row -> jurusan == "TKR"){
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR" selected>TKR</option>
                                                    </select>';

                                                    }elseif($row -> jurusan == "TSM"){
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM" selected>TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }else{
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ" selected>TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div></div>
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
                                            <div class="col col-md-6">
                                                <label class=" form-control-label">Visi</label>
                                                <div class="input-group">
                                                  <div class="col col-md-12">
                                                    <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                    <textarea  class="ckeditor" rows="5" placeholder="Visi" id="ckeditor" name="visi"><?php echo $row->visi;?></textarea>
                                                  </div>
                                                </div>
                                                <small class="form-text text-muted">ex. Memajukan . . .</small>
                                          </div>
                                          <div class="col col-md-6">
                                            <label class=" form-control-label">Misi</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea class="ckeditor" rows="5" placeholder="Misi" id="ckeditor" name="misi"><?php echo $row->misi;?></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">ex. 1. Melakukan . . .</small>
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
            <div class="modal fade" id="hapusmodal<?php echo $row->nis_kandidat;?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <form action="<?php echo base_url()?>Kandidat/delete/<?php echo $row->nis_kandidat;?>" method="POST">
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
        <?php foreach($isi as $row) { ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img height="200px" width="200px" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>" alt="<?= $row->foto; ?>" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $row->nis_kandidat; ?></h3>
                                <p><?php echo $row->nama; ?></p>
                                <p><?php echo $row->kelas; ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                           <center>
                            <button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" title="View data" data-toggle="modal" data-target="#viewmodal<?php echo $row->nis_kandidat;?>">
                            <i class="material-icons">visibility</i>
                            </button>
                            </center>
                        </div>
                    </div>
                    </div>

        <?php } ?>
    <?php foreach($isi as $row) { ?>
      <div class="modal fade" id="viewmodal<?php echo $row->nis_kandidat;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="form_validation">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">View Data Kandidat</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <h2 class="card-inside-title"></h2>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="input-group" align="center">
                                                  <center><img  height="200px" width="200px" alt="<?= $row->foto; ?>" src="<?= base_url() ?>./assets/images/<?= $row->foto; ?>"
                                                    class="rounded-circle"></center>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nis" value="<?php echo $row->nis_kandidat ?>" type="text" class="form-control date" placeholder="nis" name="nis_kandidat" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Nama" value="<?php echo $row->nama ?>" type="text" class="form-control date" placeholder="Nama" name="nama" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">room</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tempat" type="text" class="form-control date" placeholder="Tempat Lahir" name="tempat" value="<?php echo $row->tempat?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">event</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Tgl_lahir" type="date" class="form-control date" placeholder="tgl_lahir" name="tgl_lahir" value="<?php echo $row->tgl_lahir?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jenis Kelamin</b>
                                                    </p>
                                                    <?php if ($row -> jk == "L") {
                                                        echo '<select class="form-control show-tick" name="jk">
                                                        <option value="P">Perempuan</option>
                                                        <option value="L" selected>Laki-Laki</option>
                                                    </select>';

                                                    }
                                                    else {
                                                       echo '<select class="form-control show-tick" name="jk">
                                                        <option value="P" selected>Perempuan</option>
                                                        <option value="L">Laki-Laki</option>
                                                    </select>'; 
                                                    } ?>
                                                    
                                                </div>
                                            </div></div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Kelas</b>
                                                    </p>
                                                    <?php if ($row -> kelas == "X") {
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X" selected>X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>';
                                                    }elseif($row -> kelas == "XI"){
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI" selected>XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>';
                                                    }else{
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII" selected>XII</option>
                                                    </select>';
                                                    } ?>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jurusan</b>
                                                    </p>
                                                    <?php if ($row -> jurusan == "TKR"){
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR" selected>TKR</option>
                                                    </select>';

                                                    }elseif($row -> jurusan == "TSM"){
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM" selected>TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }else{
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ" selected>TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div></div>
                                            
                                            <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label class=" form-control-label">Visi</label>
                                                <div class="input-group">
                                                  <div class="col col-md-12">
                                                    <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                    <textarea  class="ckeditor" rows="5" placeholder="Visi" id="ckeditor" name="visi" readonly><?php echo $row->visi;?></textarea>
                                                  </div>
                                                </div>
                                                <small class="form-text text-muted">ex. Memajukan . . .</small>
                                          </div>
                                          <div class="col col-md-6">
                                            <label class=" form-control-label">Misi</label>
                                            <div class="input-group">
                                              <div class="col col-md-12">
                                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                                <textarea class="ckeditor" rows="5" placeholder="Misi" id="ckeditor" name="misi" readonly><?php echo $row->misi;?></textarea>
                                              </div>
                                            </div>
                                            <small class="form-text text-muted">ex. 1. Melakukan . . .</small>
                                          </div>
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
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