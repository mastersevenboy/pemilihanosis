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
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <meta http-equiv="refresh" content="120"/>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
           <a href="javascript:void(0);">Aplikasi ||<b> E-voting</b></a>
            <small>Ketua OSIS SMK WIDYA KARYA</small>
        </div>
        <div class="card">
            <div class="body">
                <figure>
                <center><img src="<?php echo base_url();?>assets/images/logo.png" width="75" height="75"/></center>
                </figure>
                <form action="<?php echo base_url();?>Register/simpan" id="sign_up" method="POST">
                    <div class="msg">Register a new membership</div>
                    <?php echo $error; ?>  
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">vpn_key</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">star</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="kelas">
                                        <option value="">-- Please s elect Kelas --</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">school</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="jurusan">
                                        <option value="">-- Please s elect Jurusan --</option>
                                        <option value="TKJ">TKJ</option>
                                        <option value="TKR">TKR</option>
                                        <option value="TSM">TSM</option>
                            </select>
                        </div>
                    </div>
                     
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                                        
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" id="demo">SIGN UP</button>
                  <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12" align="center">
                            <a href="<?php echo base_url(); ?>Login">Sudah Punya Account</a>
                        </div>
                  </div>
                </form>
            </div>
        </div>
    </div>


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
      location.href="<?php echo base_url(); ?>Register/tutup";
    }
  }, 1000);
<?php } ?>
</script>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/examples/sign-up.js"></script>
</body>

</html>