<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/select2.min.css">
  <script src="<?php echo base_url();?>asset/ckeditor/jquery/jQuery-2.1.4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/font-awesome-4.5.0/css/font-awesome.min.css">
      <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-green sidebar-mini">

<div id="wrapper">

        <header class="main-header">
         
        <a href="<?php echo base_url();?>admincontroller/dashboard" class="logo suntikfixed">
          
          <span class="logo-mini"><p class="p">ADM</p></span>
          
          <span class="logo-lg"><b>Admin</b>IND</span>
        </a>
        
        <nav class="navbar navbar-static-top" role="navigation">
          
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              
              
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'images/'.$user['photo'];?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $user['nama_depan'];?></span>
                </a>
                <ul class="dropdown-menu">
                 
                  <li class="user-header">
                    <img src="<?php echo base_url().'images/'.$user['photo'];?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $user['nama_depan']; echo " "; echo $user['nama_belakang'];?> - Admin Kebudayaan
                      <small>Kebudayaan Indonesia</small>
                    </p>
                  </li>
                 
                  
                
                  <li class="user-footer usfoot">
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>dashboard/logout" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar suntikfixed">

        <section class="sidebar">
          
          <div class="user-panel">
            
          </div>
          
          
          
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
              <a href="<?php echo base_url();?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url();?>admin/c_quiz/pilihquiz">
                <i class="fa fa-dashboard"></i> <span>Jawab Quiz Cenah</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url();?>admin/c_level">
                <i class="fa fa-dashboard"></i> <span>Level</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url();?>admin/c_topik">
                <i class="fa fa-dashboard"></i> <span>Topik</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>admin/c_artikel"><i class="fa fa-plus"></i> Artikel</a></li>
                <li><a href="<?php echo base_url();?>admin/c_berita"><i class="fa fa-list-ol"></i> Berita</a></li>
                <li>
                  <a href="#">
                    <i class="fa fa-plus"></i> 
                      <span>Quiz</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>admin/c_quiz/daftarquiz"><i class="fa fa-list-ol"></i> Daftar Quiz</a></li>
                    <li><a href="<?php echo base_url();?>admin/c_quiz/daftarsoal"><i class="fa fa-list-ol"></i> Daftar Soal</a></li>
                    <li><a href="<?php echo base_url();?>admin/c_kategori_quiz"><i class="fa fa-list-ol"></i> Daftar Kategori Quiz</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/c_kategori_forum"><i class="fa fa-list-ol"></i> Kategori Forum</a></li>
                <li><a href="<?php echo base_url();?>admin/c_provinsi"><i class="fa fa-list-ol"></i> Provinsi</a></li>
                <li><a href="<?php echo base_url();?>admin/c_bahasa"><i class="fa fa-list-ol"></i> Bahasa</a></li>

              </ul>
            </li>
        </section>
      
      </aside>
      <div class="content-wrapper">

        <section class="content-header">

        </section>

     
        <section class="content">
          
       