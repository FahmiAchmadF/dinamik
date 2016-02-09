<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Kebudayaan</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/styles.css">
    
</head>
<body>

    <section class="container">
            <section class="login-form">
                <form method="post" action="<?php echo base_url();?>login/do_login" role="login">
                <h2 align="center">Kebudayaan</h2>
                    <!-- <img src="<?php echo base_url();?>assets/assets/images/pengolahannilai.png" class="img-responsive" alt="" /> -->
                   <!-- <img src="<?php echo base_url();?>assets/assets/images/logosmk2.png" class="img-responsive" alt="" /> -->
                    <input type="text" name="username" placeholder="Username" required class="form-control input-lg" /><?php echo form_error('username');?>
                    <input type="password" name="password" placeholder="Password" required class="form-control input-lg" /><?php echo form_error('password');?>
                    <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Masuk</button>
                    <!-- <a href="<?php echo base_url();?>daftar_guru/add"><p name="daftar" class="btn btn-lg btn-primary btn-block">Daftar Guru</p></a> -->
                </form>
                <div class="form-links">
                </div>
            </section>
    </section>
    
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>
</html>





