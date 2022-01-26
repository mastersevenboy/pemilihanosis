 <?php $this->load->view('layout/header'); ?>
<!--  <?php $this->load->view('layout/menu'); ?> -->

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>LAPORAN APLIKASI E-VOTING PEMILIHAN KETUA OSIS</h2>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Aplikasi E-voting Ketua OSIS SMK Widya Karya
                                <small>Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar, Mersi, Banyumas, Kabupaten Banyumas, Jawa Tengah 53111</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">Laporan Pemilih</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">Laporan Kandidat</a></li>
                                <li role="presentation"><a href="#messages" data-toggle="tab">Laporan Perolehan Suara</a></li>
                                <li role="presentation"><a href="#settings" data-toggle="tab">Laporan Pemenang</a></li>
                                <li role="presentation"><a href="#panitia" data-toggle="tab">Laporan Susunan Panitia</a></li>
                            </ul>

                            <!-- Tab panes -->
             <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home">
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
                                       <button type="button" class="btn btn-primary waves-effect" target="_blank" data-toggle="modal" data-target="#cetak">PRINT DATA</button>
                                    </a>
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
                                                                                       
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            <div role="tabpanel" class="tab-pane fade" id="panitia">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-black">
                            <h2>
                                Data Panitia Pemilihan Ketua OSIS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn-primary_outline" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn btn-primary waves-effect" target="_blank" data-toggle="modal" data-target="#cetak_susunan_panitia">PRINT DATA</button>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   <thead>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($panitia as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $row->nama; ?></td>
                                            <td align="center"><?php echo $row->status; ?></td> 
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">
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
                                    <button type="button" class="btn btn-primary waves-effect" target="_blank" data-toggle="modal" data-target="#cetak_kandidat">PRINT DATA</button>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   <thead>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Foto</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-green">
                                            <td>No</td>
                                            <th>Foto</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($isi as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                             <td align="center"><img height="100px" width="100px" alt="<?= $row->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $row->foto; ?>"></td>
                                            <td align="center"><?php echo $row->nis_kandidat; ?></td>
                                            <td align="center"><?php echo $row->nama; ?></td>
                                            <td align="center"><?php echo $row->kelas; ?></td>
                                            <td align="center"><?php echo $row->jurusan; ?></td>
                                            <td align="center"><?php echo $row->visi; ?></td>
                                            <td align="center"><?php echo $row->misi; ?></td> 
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        <div role="tabpanel" class="tab-pane fade" id="messages">
        <div class="container-fluid">
            <div class="block-header">
              <button type="button" class="btn btn-primary waves-effect" target="_blank" data-toggle="modal" data-target="#cetak_suara">PRINT DATA</button>  
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
        </div>
        
        <div role="tabpanel" class="tab-pane fade" id="settings">
         <div class="container-fluid">
           <div class="block-header">
            <button type="button" class="btn btn-primary waves-effect" target="_blank" data-toggle="modal" data-target="#cetak_pemenang">PRINT DATA</button>
                                
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
        </div>
    </section>
    <div class="modal fade" id="cetak" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Laporan/cetak_pemilih" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Konfirmasi Cetak Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <font color="red" size="3">Apakah Laporan Akan di cetak</font>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">PRINT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

 <div class="modal fade" id="cetak_kandidat" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Laporan/cetak_kandidat" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Konfirmasi Cetak Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <font color="red" size="3">Apakah Laporan Akan di cetak</font>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">PRINT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 <div class="modal fade" id="cetak_pemenang" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Laporan/cetak_pemenang" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Konfirmasi Cetak Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <font color="red" size="3">Apakah Laporan Akan di cetak</font>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">PRINT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 <div class="modal fade" id="cetak_suara" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Laporan/cetak_suara" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Konfirmasi Cetak Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <font color="red" size="3">Apakah Laporan Akan di cetak</font>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">PRINT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 <div class="modal fade" id="cetak_susunan_panitia" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>Laporan/cetak_susunan_panitia" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Konfirmasi Cetak Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <font color="red" size="3">Apakah Laporan Akan di cetak</font>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">PRINT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 <?php $this->load->view('layout/script_atas'); ?>
 <?php $this->load->view('layout/script_datatables'); ?>
 <?php $this->load->view('layout/script_bawah'); ?>
</body>

</html>