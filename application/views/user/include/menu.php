<div class="fixed" style="z-index:99999;">
  <input type="checkbox" id="menuToggle">
  <label for="menuToggle" class="menu-icon">&#9776;</label>
  <header>
    <div id="brnad">Ayo Berbudaya</div>
  </header>
 <nav class="menu">
    <ul>
      <li><a href="<?php echo site_url('user/index');?>"><?php echo $this->home;?></a></li>
      <li><a href="#"><?php echo $this->profil;?></a></li>
      <li><a href="<?php echo site_url('user/c_kebudayaan');?>">Kebudayaan</a></li>
      <li><a href="<?php echo site_url('user/c_forum');?>">Forum</a></li>
      <li><a href="<?php echo site_url('user/c_berita');?>"><?php echo $this->berita;?></a></li>
      <li><a href="<?php echo base_url();?>user/bahasa/simpan_session/indonesia">Indonesia</a></li>
      <li><a href="<?php echo base_url();?>user/bahasa/simpan_session/english">English</a></li>
      <li>
        <a href="#popup1">
            <div class="submit"><?php echo $this->login;?></div>
            <div class="arrow">
             <div class="top line"></div>
             <div class="bottom line"></div>
          </div>
        </a>
      </li>   
    </ul>
  </nav>
</div>