 <?php $this->load->view('layout/user/header'); ?>
<!--  <?php $this->load->view('layout/user/menu'); ?> -->
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
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" id="demo">&times;</span></button>
                                 Batas Waktu Memilih
                            </div>
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
                                SMK Widya Karya
                                <small>Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar, Mersi, Banyumas, Kabupaten Banyumas, Jawa Tengah 53111</small>
                            </h2>
                            </div>
                        <div class="body">
                            <div id="aniimated-thumbnials<?php echo $row->id;?>" class="list-unstyled row clearfix">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
                                <img class="img-responsive" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>" class="rounded-circle">
                             <!--    </div> -->
                        </div>
                       
                    </div>
                </div>
            </div>
     
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
        <?php } ?> 
    </div>
</div>
    

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

