<?php include('include/header_user.php');?>
   <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
    <?php include('include/sidebar.php');?>
      <div class="mainbar">
        <?php foreach ($lihat_forum as $row): ?>
        <div class="article">
          <h2><span><?php echo $row->judul_artikel;?></span></h2>
          <div class="clr"></div>
          <p>Posted by <a href="#"><?php echo $row->nama_panggilan;?></a> </p>
          <p><?php echo $row->isi_artikel;?></p>
          <p><a href="#"><strong>Comments (<?php echo count($lihat_komentar);?>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?php echo $row->tanggal;?> <span>&nbsp;&bull;&nbsp;</span> <a href="#"><strong>Edit</strong></a></p>
        </div>
        <?php endforeach; ?>

        <div class="article">
          <h2><span><?php echo count($lihat_komentar);?></span> Responses</h2>
          <div class="clr"></div>
          <?php 
          if(empty($lihat_komentar))
          {
            echo 'Tidak ada komentar'; 
          }
          else
          {
            foreach ($lihat_komentar as $data): 
          ?>
                                        <input type="hidden" value="<?php echo $data->id_user_komentar;?>">
          <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#"><?php echo $data->nama_panggilan_komentar;?></a> Says:<br />
              <?php echo $data->tanggal_komentar;?></p>
            <p><?php echo $data->isi_komentar;?></p>
          </div>
          <?php endforeach; }?>
        </div>
        <form  method="post" action="<?php echo base_url()."user/c_forum/simpan_komen"?>" class="form-horizontal form-label-left">                                
        <?php 
        $no=1;
        $lebar = 9;
        $nomor = intval(substr($autonumberkomen,strlen("IDK")))+$no-1;
        if($lebar>0){
            $angka = "IDK".str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        }else{
            $angka = "IDK".$nomor;
        }
            echo "          
               <input type='hidden'  name='id_komentar' value='".$angka."'>";
        $no++;
        ?>
        <input type="hidden" name="id_forum" value="<?php echo $id_forum;?>">
        <input type="hidden" name="id_user" value="<?php echo $user['id_user'];?>">
        <div class="article">
          <h2><span>Leave a</span> Reply</h2>
          <div class="clr"></div>
            <ol>
              <li>
                <label for="name">Name (required)</label>
                <input id="name" readonly name="name" value="<?php echo $user['nama_panggilan'];?>" class="text" />
              </li>
              <li>
                <label for="email">Email Address (required)</label>
                <input id="email" readonly name="email" class="text" value="<?php echo $user['email'];?>" />
              </li>
              <li>
                <label for="email">Tanggal</label>
                <input type="date" readonly value="<?php echo date('Y-m-d'); ?>" name='tanggal' class="text" />
              </li>
             
              <li>
                <label for="message">Komentar</label>
                <textarea id="message" name='isi_komentar' rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="submit" name="submit" id="imageField" src="<?php echo base_url();?>assets_users/images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
        </div>
    </form>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <?php include('include/footers_user.php');?>
  

                                        