 <?php $this->load->view('layout/header'); ?>
 
<!--  <?php $this->load->view('layout/menu'); ?> -->

<section class="content">
        <div class="container-fluid">
            <div class="row">
                                
              <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                	<div class="info-box bg-pink">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Total User Pemilih</div>
                             
                            <!-- totaluser itu diambil dari kontroller User, jadi harus sama. nah karna pengen nampilin total user di sini, maka pakenya totaluser. terus tek aliasin namanya jadi row. foreach itu fungsi untuk memecah data dari database, juga wajib pake foreach untuk nampilin data. jangan lupa tutup dari foreach -->

                            <!-- $row->totaluser . nah totaluser itu kudu sama kaya alias yang di User_model -->
                            <?php foreach ($datauser as $row) { ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row->totaluser; ?>" data-speed="1000" data-fresh-interval="20"></div>
                              <?php } ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">User Aktif</div>

                            <?php foreach ($datauseraktif as $row) { ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row->totaluseraktif; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">User Non Aktif</div>

                            <?php foreach ($datausertidakaktif as $row) { ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row->totalusertidakaktif; ?>" data-speed="1000" data-fresh-interval="20"></div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fungsi untuk menampilkan pesan error sesuai Alert modal yang dikirim kontroller -->
            
            <!-- Basic Examples -->
             <?php echo $this->session->flashdata('message'); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pemilih
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn-primary_outline" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">add_box</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#tambahmodal">Tambah Data Pengguna</a></li>
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
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Voting</th>
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
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Voting</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($all as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td align="center"><?php echo $row->kelas; ?></td>
                                            <td align="center"><?php echo $row->jurusan; ?></td>
                                            <td align="center"><?php echo $row->level; ?></td>
                                            <td align="center">
                                                <?php if (($row->status)==1) {
                                                    echo '<span class="badge bg-cyan">Aktif</span>';
                                                }else{
                                                    echo '<span class="badge bg-red">Tidak</span>';
                                                } 
                                                ?>
                                            </td>
                                           
                                           <td>
                                              <?php if (($row->suara)==1) {
                                                  echo '<span class="badge badge-primary"><i class="fa fa-check">&nbsp; Memilih</span>';
                                              }else{
                                                echo '<span class="badge badge-warning"><i class="fa fa-minus">&nbsp; Belum</span>';
                                              } ?>
                                             </td>
                                              
                                            <td align="center">
                                                <button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" title="View data" data-toggle="modal" data-target="#viewmodal<?php echo $row->nis;?>">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="Edit data" data-toggle="modal" data-target="#editmodal<?php echo $row->nis;?>">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                
                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapusmodal<?php echo $row->nis;?>">
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

        <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url(); ?>Admin/simpanpemilih" method="POST" id="form_validation"">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data User</h4>
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
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nis" type="text" class="form-control date" placeholder="nis" name="nis" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">account_circle</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nama" type="text" class="form-control date" placeholder="nama" name="nama" required>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                                                                                    
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Level" class="material-icons">grade</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="level">
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Status" class="material-icons">data_usage</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="status">
                                                            <option value="0">Tidak Aktif</option>
                                                            <option value="1">Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Password" type="password" class="form-control date" placeholder="Password" name="password" required>
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

        <?php foreach($datapengguna as $row) { ?>

        <!-- view modal -->
        <div class="modal fade" id="viewmodal<?php echo $row->nis;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="form_validation"">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data User</h4>
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
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nis" value="<?php echo $row->nis ?>" type="text" class="form-control date" placeholder="nis" name="nis" readonly>
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
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">star</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Kelas" value="<?php echo $row->kelas ?>" type="kelas" class="form-control kelas" placeholder="kelas" name="jurusan" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">school</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Jurusan" value="<?php echo $row->jurusan ?>" type="jurusan" class="form-control jurusan" placeholder="jurusan" name="jurusan" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Level User" class="material-icons">grade</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select  class="form-control show-tick" name="level">
                                                            <?php if ($row->level == 'user'){
                                                                echo '<option value="user" selected>User</option>
                                                                <option value="admin">Admin</option>';
                                                            }else{
                                                                echo '<option value="user" >User</option>
                                                                <option value="admin" selected>Admin</option>';
                                                            }?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Status User" class="material-icons">data_usage</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="status">
                                                            <?php if ($row->status == 1){ 
                                                                echo '<option value="0">Tidak Aktif</option>
                                                                <option value="1" selected>Aktif</option>';
                                                            }else{
                                                                echo '<option value="0" selected>Tidak Aktif</option>
                                                                <option value="1" >Aktif</option>';
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Password" value="<?php echo $row->password ?>" type="password" class="form-control password" placeholder="password" name="password" readonly>
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
        <!-- #view modal -->
        <!-- Modal Edit Data -->
        <div class="modal fade" id="editmodal<?php echo $row->nis;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Admin/updatepemilih/<?php echo $row->nis;?>" method="POST" id="form_validation">

                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data User</h4>
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
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="nis" value="<?php echo $row->nis ?>" type="text" class="form-control date" placeholder="nis" name="nis" >
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
                                                    }elseif ($row -> kelas == "XI"){
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI" selected>XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>';
                                                    }else {
                                                        echo '<select class="form-control show-tick" name="kelas">
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII" selected>XII</option>
                                                    </select>';
                                                    } ?>
                                                    
                                                </div>
                                            </div></div>
                                            <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <p>
                                                        <b>Jurusan</b>
                                                    </p>
                                                    <?php if ($row -> jurusan == "TKJ") {
                                                       echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ" selected>TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }elseif ($row -> jurusan == "TSM"){
                                                        echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM" selected>TSM</option>
                                                        <option value="TKR">TKR</option>
                                                    </select>';
                                                    }else {
                                                      echo '<select class="form-control show-tick" name="jurusan">
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="TSM">TSM</option>
                                                        <option value="TKR" selected>TKR</option>
                                                    </select>';  
                                                    } ?>
                                                    
                                                </div>
                                            </div></div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Level" class="material-icons">grade</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select  class="form-control show-tick" name="level">
                                                            <?php if ($row->level == 'user'){
                                                                echo '<option value="user" selected>User</option>
                                                                <option value="admin">Admin</option>';
                                                            }else{
                                                                echo '<option value="user" >User</option>
                                                                <option value="admin" selected>Admin</option>';
                                                            }?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Status" class="material-icons">data_usage</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="status">
                                                            <?php if ($row->status == 1){ 
                                                                echo '<option value="0">Tidak Aktif</option>
                                                                <option value="1" selected>Aktif</option>';
                                                            }else{
                                                                echo '<option value="0" selected>Tidak Aktif</option>
                                                                <option value="1" >Aktif</option>';
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input data-toggle="tooltip" data-placement="top" title="" data-original-title="Password" value="<?php echo $row->password ?>" type="password" class="form-control password" placeholder="password" name="password" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">beenhere</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="suara">
                                                            <?php if (($row->suara)==1){ 
                                                                echo '<option value="0">Belum</option>
                                                                <option value="1" selected>Memilih</option>';
                                                            }else{
                                                                echo '<option value="0" selected>Belum</option>
                                                                <option value="1" >Memilih</option>';
                                                            }?>
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

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusmodal<?php echo $row->nis;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Admin/deletepemilih/<?php echo $row->nis;?>" method="POST">
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


 <?php $this->load->view('layout/script_atas'); ?>
 <?php $this->load->view('layout/script_datatables'); ?>
 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>