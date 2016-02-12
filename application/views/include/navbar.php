<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo site_url('dashboard');?>" class="site_title"><img src="<?php echo base_url();?>assets/images/smk2.png" width="40" height="40"> <span>Pengolahan Nilai</span></a>
                    </div>
                   
                    <div class="clearfix"></div>
        
                    <div class="profile">
                        <div class="profile_pic">
                        <img src="<?php echo base_url().'images/'.$user['photo'];?>" class="img-circle profile_img"/>
<!--                             <img src="<?php echo base_url();?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
 -->                        
                        </div>

                        <div class="profile_info">
                            <span>Welcome,</span>
 <h2><?php echo $user['nama_guru'];?></h2>  
<span> Admin    </span>
                        </div>
                    </div>


                    <br />
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<br><br><br><br><br>
                        <div class="menu_section">
                            
                            <ul class="nav side-menu">
<li>                                <a href="<?php echo site_url('dashboard');?>"><i class="fa fa-home"></i> Home <span class=""></span></a>
    </li>                                                                
                                <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo site_url('admin/con_guru');?>">Data Guru</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/c_min_siswa/input');?>">Data Siswsa</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/con_lihatdata_kelas');?>">Data Kelas</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/con_lihatdata_mapel');?>">Data Mata Pelajaran</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/con_lihatdata_semester');?>">Data Semester</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                
                               <li><a><i class="fa fa-bar-chart-o"></i> Penjadwalan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo site_url('admin/con_walikelas');?>">Wali Kelas</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/con_ngajar');?>">Pengajaran</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                   
  </div>
            </div>