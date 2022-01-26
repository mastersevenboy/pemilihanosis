    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('level'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a class="btn btn-default bg-blue waves-effect m-r-30" data-color="blue" data-toggle="modal" data-target="#defaultModal2"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>Login/logout"><i class="material-icons">input</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
           
                       <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                        <a href="<?php echo base_url(); ?>Welcome/user">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>pemilu/Pemilihan">
                            <i class="material-icons">assignment_ind</i>
                            <span>Pemilu</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url(); ?>Admin/pemilih">
                            <i class="material-icons">people</i>
                            <span>Data Pemilih</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Kandidat">
                            <i class="material-icons">contacts</i>
                            <span>Data Kandidat</span>
                        </a>
                    </li>
                    <li> -->
                        <a href="<?php echo base_url(); ?>Hasil_pemilu/user">
                            <i class="material-icons">pie_chart</i>
                            <span>Hasil Pemilu</span>
                        </a>
                    </li>
                   <li>
                   <!--  <li class="header">MAIN NAVIGATION</li>
                        <a href="<?php echo base_url(); ?>Welcome/aturan">
                            <i class="material-icons">warning</i>
                            <span>Aturan Pemilu</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url(); ?>About/user">
                            <i class="material-icons">local_library</i>
                            <span>Tentang Aplikasi</span>
                        </a>
                    </li>
                   
                   
                </ul>
            </div>
            <!-- #Menu -->

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">Puas Triawan - STI201501241</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
    </section>

   <!--  modal profil -->
   <div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Profil User/h4>
                        </div>
            
                <div class="col-xs-12 col-sm-12">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo base_url(); ?>assets/images/user.png" width="150px" height="150px" alt="User" />
                            </div>
                            <div class="content-area">
                                <h3><center><?php echo $this->session->userdata('nama'); ?></center></h3>
                                <p><center><?php echo $this->session->userdata('level'); ?></center></p>
                               
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Kelas</span>
                                    <span><?php echo $this->session->userdata('kelas'); ?></span>
                                </li>
                                <li>
                                    <span>Jurusan</span>
                                    <span><?php echo $this->session->userdata('jurusan'); ?></span>
                                </li>
                                <li>
                                    <span>Status</span>
                                    <span><?php if (($this->session->userdata('status'))==1) {
                                                    echo '<span class="badge bg-cyan">Aktif</span>';
                                                }else{
                                                    echo '<span class="badge bg-red">Tidak</span>';
                                                } 
                                                ?></span>

                                </li>
                            </ul>
                           
                        </div>
                    </div>

                </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                 
                    </div>
                </div>
   </div>
  <!--  #modal profil -->

