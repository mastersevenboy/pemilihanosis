<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi E-voting Pemilihan Ketua OSIS SMK WIKA</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- =========Tambahan Script====== -->

     <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url();?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- =========Tambahan Script====== -->

    <!-- Colorpicker Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php echo base_url();?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php echo base_url();?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?php echo base_url();?>assets/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?php echo base_url();?>assets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/css/themes/all-themes.css" rel="stylesheet" />

    
    <!-- Flot Charts Plugin Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/charts/chartjs.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/charts/flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/charts/jquery-knob.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/charts/morris.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/charts/sparkline.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/chards/basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/charts/colored.js"></script>
    
    
<meta http-equiv="refresh" content="300"/>
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    

    <!-- Navigasi -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">Aplikasi E-voting SMK WIKA</a><span>
                <img src="<?php echo base_url();?>assets/images/logo.png" style="width:10%;height:10%"/></span>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="#defaultModal" class="js-right-sidebar" data-toggle="modal"  data-close="true"><i class="material-icons">help_outline</i></a></li>
                </ul>
            </div>
        </div>
       <?php if ($this->session->userdata('level')=="admin") { ?>
                <?php $this->load->view('layout/menu'); ?>
            <?php } ?>

            <?php if (($this->session->userdata('level')=="user") && ($this->session->userdata('suara')!="1")) { ?>
                <?php $this->load->view('layout/user/menu'); ?>
            <?php } ?>

            <?php if (($this->session->userdata('level')=="user") && ($this->session->userdata('suara')=="1")) { ?>
                <?php $this->load->view('layout/user/menu_pemilih'); ?>
            <?php } ?> 
    </nav>

        <!-- Modal -->
 <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="defaultModalLabel">Panduan Aplikasi</h3>
                        </div>
                        <div class="modal-body">
                           <li>Pertama Silakan Login untuk mendapatkan akses masuk ke aplikasi ini</li>
                           <li>Kedua Menu home berisi grafik pemilih, hasil pemenang dan pengaturan waktu</li>
                           <li>Ketiga Menu admin berisi data admin yang bisa menggunakan aplikasi ini</li>
                           <li>Keempat Menu pemilih berisi data pemilih yang registrasi dan yang udah menjoblos</li>
                           <li>Kelima Menu Kandidat berisi data kandidat yang mencalonkan sebagai Ketua OSIS</li>
                           <li>Keenam Menu Hasil Pemilih berisi jumlah suara dari kandidat</li>
                           <li>Ketujuh Menu aturan berisi aturan dalam memilih</li>
                           <li>Kedelapan Menu about berisi tentang dari aplikasi</li>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
<!-- #Modal -->  