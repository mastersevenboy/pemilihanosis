<?php $this->load->view('layout/user/header'); ?>
<!-- <?php $this->load->view('layout/user/menu_pemilih'); ?> -->

<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                            <h2>
                                Aplikasi E-voting Ketua OSIS SMK Widya Karya
                                <small>Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar, Mersi, Banyumas, Kabupaten Banyumas, Jawa Tengah 53111</small>
                            </h2>
                            </div>
                        <div class="body">
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               Selamat Datang di Aplikasi Pemilihan Ketua OSIS
                            </div>
                            <div class="alert bg-blue alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               Terimakasih Telah Menggunakan Hak Pilih Anda 
                            </div>
                             <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" id="demo">&times;</span></button>
                                 Batas Waktu Memilih
                            </div>
                        </div>
                        </div>
                    </div>
            	</div>

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

            	<!-- Fungsi untuk menampilkan pesan error sesuai Alert modal yang dikirim kontroller -->
       		</div>  
       </div>  

    <!-- modal view  -->
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
    <!-- end modal view  -->

    
</section>

<script>
// Set the date we're counting down to
<?php foreach ($waktu as $waktu) { ?>
  var countDownDate = new Date("<?php echo $waktu->waktu; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML ="" + days + " Hari " + hours + " Jam "
    + minutes + " Menit " + seconds + " Detik ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "Waktu Memilih Berakhir.";
      
    }
  }, 1000);
<?php } ?>
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  
 

 <?php $this->load->view('layout/script_atas'); ?>

 <?php $this->load->view('layout/script_datatables'); ?>

 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>