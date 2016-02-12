<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title src="<?php echo base_url();?>assets/images/smk2.png" width="40" height="40">SMKN 2 CIMAHI </title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="<?php echo base_url();?>assets/stylesheet" type="text/css" href="assets/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/floatexamples.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

    <link href="<?php echo base_url();?>assets/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

                <script src="<?php echo base_url();?>assets/js/jquery-1.7.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    function search(){
        var id_kelas = $("#id_kelas").val();
        var id_pel = $("#id_pel").val();
        var id_thn = $("#id_thn").val();
            if(id_guru!=""){
                //tampilkan status loading dan animasinya
                $("#status").html("<img src='<?php echo base_url('asset/img/load.gif') ?>'>");
                $("#loading").show();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('con_nilaimapel/getDataTabel'); ?>",
                    data :  "Akelas=" + id_kelas + "&Amapel=" + id_pel + "&Asemester=" + id_thn,
                    success:function(data){
                        $("#eusi").html(data);
                        //hilangkan status dan animasi loading
                        $("#status").html("");
                        $("#loading").hide();
                }
            });
        }          
    }
    $("#pilari").click(function(){
        search();
    });
});
</script>


    <!-- editor -->
    <link href="<?php echo base_url();?>assets/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/editor/index.css" rel="stylesheet">
    <!-- select2 -->
    <link href="<?php echo base_url();?>assets/css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/switchery/switchery.min.css" />

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>

<script>

function bacaGambar(input) {

if (input.files && input.files[0]) {

var reader = new FileReader();



reader.onload = function (e) {

$('#gambar_nodin').attr('src', e.target.result);

}



reader.readAsDataURL(input.files[0]);

}

}



$("#preview_gambar").change(function(){

bacaGambar(this);

});

</script>


   
</head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
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
                                        <li><a href="<?php echo site_url('admin/c_min_siswa');?>">Data Siswa</a>
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


            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url().'images/'.$user['photo'];?>" />
                                    <!--<?php echo $user['nama_guru'];?>-->                                
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url() . 'admin/con_guru/edit_profile';?>">  Profile</a>
                                    </li>
                                    <li><a href='<?php echo base_url('dashboard/logout');?>'><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>
