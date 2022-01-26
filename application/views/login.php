<?php echo form_open('Login/proses_login'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi || E-voting Ketua OSIS SMK WIDYA KARYA</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/images/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ;?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ;?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ;?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url() ;?>assets/css/style.css" rel="stylesheet">
    <meta http-equiv="refresh" content="120"/>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Aplikasi ||<b> E-voting</b></a>
            <small>Ketua OSIS SMK WIDYA KARYA</small>
        </div>
        <div class="card">
             <div class="body">
                <figure>
                <center><img src="<?php echo base_url();?>assets/images/logo.png" width="75" height="75"/></center>
                </figure>
                   <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your voting</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                          <label for="rememberme">Pastikan NIS dan Password Anda Benar</label>
                        </div>
                        <?php echo $error; ?>       
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" >SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-4">
                            <a href="<?php echo base_url(); ?>Register">Register Now!</a>
                        </div>
                        <div class="col-xs-4 align-center">
                            <?php foreach($peraturan as $row) { ?>
                            <a href="" data-toggle="modal" data-target="#defaultModal<?php echo $row->id;?>">Panduan Aplikasi!</a>
                            <?php } ?> 
                        </div>
                        <div class="col-xs-4 align-right">
                            <a href="" data-toggle="modal" data-target="#smallModal">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="smallModalLabel">Pringatan Forget Password</h4>
                        </div>
                        <div class="modal-body">
                            Silakang Hubungi Admin Panitia Pemilihan Ketua OSIS Untuk Mengetahui Password Jika Anda Lupa.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
     </div>

<?php foreach($peraturan as $row) { ?>
        <div class="modal fade" id="defaultModal<?php echo $row->id;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue">
                            <h4 class="modal-title" id="defaultModal">Panduan Aplikasi</h4>
                        </div>
                        <div class="modal-body">
                           <?php echo $row->panduan;?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
     </div>
 <?php } ?> 


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
      location.href="<?php echo base_url(); ?>pemilu/Pemilihan/berakhir";
    }
  }, 1000);
<?php } ?>
</script>


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ;?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() ;?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() ;?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url() ;?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() ;?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ;?>assets/js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php echo form_close(); ?>