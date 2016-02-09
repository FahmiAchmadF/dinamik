<?php include('include/header_user.php');?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
         <?php include('include/sidebar.php');?>
      <div class="mainbar">
        <div class="article">
          <h2><span>Register</span></h2>
          <div class="clr"></div>
          <p>You can find more of my free template designs at my website. For premium commercial designs, you can check out DreamTemplate.com.</p>
        </div>
        <form method="post" action="<?php echo base_url() . "user/c_daftar/submit"?>" enctype="multipart/form-data">   
        <div class="article">
          <h2><span>Register</span> Members</h2>
          <div class="clr"></div>
          <form action="#" method="post" id="sendemail">
            <ol>
              <li>
                <label for="name">Username</label>
                <input id="name" name="username" required class="text" type="text" />
              </li>
              <li>
                <label for="name">Password</label>
                <input id="name" name="password" required class="text" type="password"/>
              </li>
              <li>
                <label for="name">Name Depan</label>
                <input id="name" name="nama_depan" required class="text" type="text"/>
              </li>
              <li>
                <label for="name">Name Belakang</label>
                <input id="name" name="nama_belakang" required class="text" type="text" />
              </li>
              <li>
                <label for="name">Name Panggilan</label>
                <input id="name" name="nama_panggilan" required class="text" type="text"/>
              </li>
              <li>
                <label for="name">Jenis Kelamin</label>
                <input type='radio' name='jk' value='L'>Laki-laki
                <input type='radio' name='jk' value='P'>Perempuan
              </li>
              <li>

                <label for="name">Agama</label>
                <select name='agama' required>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="hindu">Hindu</option>
                  <option value="budha">Budha</option>
                  <option value="konghucu">Konghucu</option>
                </select>
              </li>
              <li>
                <label for="name">Tempat Lahir</label>
                <input id="name" required name="tempat_lahir" class="text" type="text" />
              </li>
              <li>
                <label for="name">Tanggal Lahir</label>
                <input id="name" required name="tanggal_lahir" class="text" type="date" />
              </li>
              <li>
                <label for="message">Alamat</label>
                <textarea id="message" required name="alamat" rows="8" cols="50"></textarea>
              </li>
              <li>
                <label for="email">Email</label>
                <input id="email" required name="email" class="text" type="email" />
              </li>
              <li>
                <label for="website">No Handphone</label>
                <input id="website" name="no_hp" class="text" type="text" />
              </li>
              <li>
                <input type="file" name="userfile" id="preview_gambar" />
                <img id="gambar_nodin" src="<?php echo base_url();?>assets/images/uploadgambar.png" width="220" height="280" alt="Preview Gambar" /> 
              <script>
              function bacaGambar(input) 
              {
                if (input.files && input.files[0]) 
                {
                  var reader = new FileReader();
                  reader.onload = function (e) 
                  {
                    $('#gambar_nodin').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
                }
              }
              $("#preview_gambar").change(function()
              {
                bacaGambar(this);
              }
              );
              </script>
              </li>
              <li>
                <label for="website">Tanggal Daftar</label>
                <input id="website" class="text" type="date" value="<?php echo date('Y-m-d'); ?>" name='tanggal_daftar' readonly/>
              <li>
                <input type="submit" name="submit" id="imageField" src="<?php echo base_url();?>assets_users/images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <?php include('include/footers_user.php');?>