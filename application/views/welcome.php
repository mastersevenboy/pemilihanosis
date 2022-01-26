 <?php $this->load->view('layout/header'); ?>
<!--  <?php $this->load->view('layout/menu'); ?> -->
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
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" id="demo">&times;</span></button>
                                 Pemilihan dimuali
                            </div>
                            <!-- <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" id="akhir">&times;</span></button>
                                 Batas waktu berakhir
                            </div> -->
                        </div>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-3 col-sm-20 col-xs-12">
                    	<div class="info-box bg-pink">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Total User</div>

                                <!-- totaluser itu diambil dari kontroller User, jadi harus sama. nah karna pengen nampilin total user di sini, maka pakenya totaluser. terus tek aliasin namanya jadi row. foreach itu fungsi untuk memecah data dari database, juga wajib pake foreach untuk nampilin data. jangan lupa tutup dari foreach -->

                                <!-- $row->totaluser . nah totaluser itu kudu sama kaya alias yang di User_model -->
                                <?php foreach ($datauserall as $row) {?>
                                <div class="number count-to" data-from="0" data-to="<?php echo $row->totaluserall; ?>" data-speed="1000" data-fresh-interval="20"></div>
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
                                <div class="text">Total Pemilih</div>

                                <?php foreach ($datapemilih as $row) { ?>
                                <div class="number count-to" data-from="0" data-to="<?php echo $row->totalpemilih; ?>" data-speed="1000" data-fresh-interval="20"></div>
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
                                <div class="text">Total Kandidat</div>

                                <?php foreach ($datakandidat as $row) { ?>
                                <div class="number count-to" data-from="0" data-to="<?php echo $row->totalkandidat; ?>" data-speed="1000" data-fresh-interval="20"></div>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Fungsi untuk menampilkan pesan error sesuai Alert modal yang dikirim kontroller -->
            </div>     
        <?php foreach($peraturan as $row) { ?>
            <div class="row">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    PANITIA PEMILIHAN KETUA OSIS
                                    SMK WIDYA KARYA
                                    <small>Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar, Mersi, Banyumas, Kabupaten Banyumas, Jawa Tengah 53111</small>
                                </h2>
                            </div>
                            <div class="body">
                                <div id="aniimated-thumbnials<?php echo $row->id;?>" class="list-unstyled row clearfix">
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
                                    <img class="img-responsive" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto;?>">
                                   <!--  </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
         
        <?php } ?>     
        
<?php foreach ($waktu as $time) { ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-orange">
                            <h2>
                                Atur Waktu Pemilihan <small>Lama waktu pemilihan berlangsung</small>
                            </h2>
                        </div>
                        <div class="body">
                            <center><h2>
                                <?php echo $time->waktu; ?>
                            </h2></center>
                        </div>
                        <div class="header">
                            <center>
                            <h2>
                                <button type="button" class="btn btn-primary waves-effect waves-float" title="Setting Waktu" data-toggle="modal" data-target="#modal_timer">Setting Waktu
                                 <i class="material-icons">settings_applications</i>
                                  </button>
                            </h2>
                            </center>
                       </div>
                    </div>
                </div>
            </div>  
        </div>

<?php } ?>          
<?php foreach ($waktu as $time) { ?>
 <div class="modal fade" id="modal_timer" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Welcome/simpan_waktu/" method="POST" id="form_validation">

                        <div class="modal-header bg-cyan">
                            <h4 class="modal-title" id="defaultModalLabel">Setting Waktu Pemilihan</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                                <label class="form-control-label">Tanggal</label>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  <input name="tanggal" placeholder="tanggal" class="form-control" type="Date">
                                  <font size="2px" color="red" class="help-block"></font>
                                </div>

                              </div>
                              <div class="form-group">
                                <label class=" form-control-label">Waktu</label>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                  <input name="time" placeholder="Time" class="form-control" type="time">
                                  <font size="2px" color="red" class="help-block"></font>
                                </div>
                                  <small class="form-text text-muted">nb : format waktu 24 jam.</small>
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
<?php } ?>
         
    <?php foreach($peraturan as $row) { ?> 
       <div class="container-fluid">
            <div class="row">
               <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KETENTUAN PANITIA PEMILIHAN KETUA OSIS
                                SMK Widya Karya
                                <small>Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar, Mersi, Banyumas, Kabupaten Banyumas, Jawa Tengah 53111</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="aniimated-thumbnials<?php echo $row->id;?>" class="list-unstyled row clearfix">
                                <div class="col-md-12">
                                <?php echo $row->ketentuan; ?>
                                </div>
                            </div>
                        </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php } ?> 

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
    document.getElementById("demo").innerHTML = "" + days + " Hari " + hours + " Jam "
    + minutes + " Menit " + seconds + " Detik ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "Waktu Memilih Berakhir.";
    }
  }, 1000);
<?php } ?>
</script>

 <?php $this->load->view('layout/script_atas'); ?>
 <?php $this->load->view('layout/script_datatables'); ?>
 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>

