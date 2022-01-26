 <?php $this->load->view('layout/user/header'); ?>
<!--  <?php $this->load->view('layout/user/menu'); ?> -->

 <section class="content">
        <div class="container-fluid">
            <!-- Image Gallery -->
            <?php foreach($peraturan as $row) { ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div id="aniimated-thumbnials<?php echo $row->id;?>" class="list-unstyled row clearfix">
                                <div class="col-md-12">
                                   
                                <img  height="100%" width="100%" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>" class="rounded-circle">
                                <div class="form-line">
                                <input data-toggle="tooltip" data-placement="top" title="" data-original-title="" value="<?=$row->foto ?>" type="hidden" class="form-control date" placeholder="" name="filelama" >
  								</div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php } ?> 
        </div>
        <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                               About Aplikasi E-voting SMK WIDYA KARYA
                            </h2>
                        </div>
                        <div class="body">
                            <p class="lead">
                                Aplikasi E-voting SMK WIDYA KARYA
                            </p>
                            <p>
                               Aplikasi ini adalah aplikasi yang berfungsi sebagai pengganti dari sistem yang sudah ada yaitu sistem yang masih manual. Aplikasi ini memudahkan bagi pengguna untuk perhitungan suara, mengelola data pemilih dan memberikan pengamanan pada suara agar tidak ada kecurangan.
                            </p>
                            <p>
                               Aplikasi ini dibuat oleh mahasiswa STMIK Widya Utama sebagai bahan untuk mendapat gelar sarjana komputer. Aplikasi ini dibuat untuk penelitian skripsi oleh Puas Triawan NIM STI201501241 dan aplikasi ini berbasis web dengan framework CodeIgniter.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Body Copy -->
    </section>
     





 <?php $this->load->view('layout/script_atas'); ?>
 <?php $this->load->view('layout/script_datatables'); ?>
 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>