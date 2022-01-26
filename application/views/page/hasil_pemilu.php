 <?php $this->load->view('layout/header'); ?>
 <!-- <?php $this->load->view('layout/menu'); ?> -->


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HASIL AKHIR PEMENANG</h2>
            </div>
             <?php foreach($banyak as $win) { ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img height="200px" width="200px" src="<?= base_url(); ?>./assets/images/<?= $win->foto; ?>" alt="<?= $win->foto; ?>" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $win->nis_kandidat; ?></h3>
                                <p><?php echo $win->nama; ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <center>
                            <h4>Pemenang</h4>
                            <i class="material-icons">thumb_up</i><i>Voting</i>
                            <span><?php echo $win->suara_kandidat; ?></span>  
                            </center>
                        </div>
                    </div>
                </div>
        <?php } ?> 
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <center><h4>GRAFIK PEROLEHAN SUARA</h4></center>
                            <center><h4>KANDIDAT KETUA OSIS SMK WIDYA KAYRA</h4></center>                           
                        </div>
                        <?php foreach($banyak as $row) { ?>
                       
                        <div class="body">                            
                          <canvas id="myDoughnutChart" width="" height="145"></canvas>
                        <script>
                        
                        var ctx = document.getElementById('myDoughnutChart').getContext('2d');
                        var myDoughnutChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['<?php echo json_encode($row->nama); ?>','Total Pemilih'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [<?php echo json_encode($row->suara_kandidat); ?>,<?php foreach($datauseraktif as $row) { ?>
                                        <?php echo json_encode($row->totaluseraktif); ?>
                                        <?php } ?>
                                     ],
                                      
                                    backgroundColor: [
                                        'rgb(255, 0, 0)',
                                        'rgb(0, 64, 255)',
                                        'rgb(255, 255, 0)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 3
                                }]
                            },
                            options: {
                                scales: {
                                    // yAxes: [{
                                    //     ticks: {
                                    //         beginAtZero: true
                                    //     }
                                    // }]
                                }
                            }
                        });
                        
                        </script>     
                        </div>
                           <?php } ?>
                    </div>
        </div>
        </div>           
</section>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HASIL PEROLEHAN SUARA</h2>
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
                            </div>
                        </div>
                        <div class="profile-footer">
                            <center>
                            <i class="material-icons">thumb_up</i><i>Perolehan Suara  : </i>
                            <span><?php echo $row->suara_kandidat; ?></span>  
                            </center>
                        </div>
                    </div>
                    </div>
            
        <?php } ?>
        </div>
 </section>
    
 

 <?php $this->load->view('layout/script_atas'); ?>

 <?php $this->load->view('layout/script_datatables'); ?>
       
 <?php $this->load->view('layout/script_bawah'); ?>

    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/chartjs/Chart.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.time.js"></script>
</body>

</html>