 <div class="sidebar">
        <div class="search">
          <form id="form" name="form" method="post" action="#">
            <span>
            <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
            </span>
            <input name="b" type="image" src="<?php echo base_url();?>assets_users/images/search.gif" class="button" />
          </form>
        </div>
        <div class="gadget">
        <a href="<?php echo site_url('user/c_forum/tambah_topik');?>">Tambah Topik</a>
          <h2>Forum</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
          <?php
             foreach ($tampil_kategori_forum as $row):
         echo '
            <li><a href="/kebudayaan/user/c_forum/tampil_kategori/'.$row->id.'">'.$row->kategori.'</a></li>
        ';
        endforeach;
        ?>
          </ul>
        </div>
        <div class="gadget">
          <h2><span>Fitur</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="<?php echo site_url('user/c_artikel');?>">Artikel</a>
              </li>
              <li><a href="http://www.dreamtemplate.com">Berita</a>
              </li>
              <li><a href="<?php echo site_url('user/c_quiz');?>">Quiz</a>
              </li>
          </ul>
        </div>
      </div>