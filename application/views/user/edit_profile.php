<?php include('include/header.php');?>

<div class="wrapper">
  <div class="profile">
    <div class="content-edit">
      <h1>Edit Profile</h1>
      <?php foreach($member as $data):?>
      <form action="<?php echo base_url();?>user/index/ubah_profile" method="POST" enctype="multipart/form-data">
        <!-- Photo -->
        <fieldset>
          <div class="grid-35">
            <label for="avatar">Your Photo</label>
          </div>
          <div class="grid-65">
            <img src="<?php echo base_url();?>images/<?php echo $data->photo;?>">
            <span class="photo" title="Upload your Avatar!"></span>
            <input type="file" name="userfile" class="upload" />
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="fname">Username</label>
          </div>
          <div class="grid-65">
            <input type="text" id="fname" name="username" readonly value="<?php echo $data->username;?>" tabindex="1" />
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="fname">First Name</label>
          </div>
          <div class="grid-65">
            <input type="text" id="fname" name="nama_depan" value="<?php echo $data->nama_depan;?>" tabindex="1" />
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="lname">Last Name</label>
          </div>
          <div class="grid-65">
            <input type="text" id="lname" name="nama_belakang" value="<?php echo $data->nama_belakang;?>" tabindex="2" />
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="lname">Password</label>
          </div>
          <div class="grid-65">
            <input type="password" id="lname" value="<?php echo $data->password;?>" name="password" tabindex="3" />
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="lname">Nama Panggilan </label>
          </div>
          <div class="grid-65">
            <input type="text" id="lname" name="nama_panggilan" value="<?php echo $data->nama_panggilan;?>" tabindex="3" />
          </div>
        </fieldset>
        <!-- Description about User -->
        <fieldset>
          <div class="grid-35">
            <label for="description">About you</label>
          </div>
          <div class="grid-65">
            <textarea name="tentang" id="" cols="30" rows="auto" tabindex="4"><?php echo $data->tentang;?></textarea>
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="description">Address</label>
          </div>
          <div class="grid-65">
            <textarea name="alamat" id="" cols="30" rows="auto" tabindex="5"><?php echo $data->alamat;?></textarea>
          </div>
        </fieldset>
        <!-- Email -->
        <fieldset>
          <div class="grid-35">
            <label for="email">Email</label>
          </div>
          <div class="grid-65">
            <input type="email" id="email" name="email" value="<?php echo $data->email;?>" tabindex="6" />
          </div>
        </fieldset>
        <!-- Looking for Work -->
        <!-- Highest Qualification -->
        <fieldset>
          <div class="grid-35">
            <label for="qualification">Gender</label>
          </div>
          <div class="grid-65">
            <select name="jk" id="qualification" tabindex="8" class="profile-edit">
              <option selected="selected" value="" disabled>------------------Pilih------------------</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </fieldset>
        <fieldset>
          <div class="grid-35">
            <label for="forHire">Looking for Work</label>
          </div>
          <div class="grid-65">
            <select name="work" id="forHire" tabindex="7" class="profile-edit">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
        </fieldset>
        <!-- School -->
        <fieldset>
          <div class="grid-35">
            <label for="school">School Name</label>
          </div>
          <div class="grid-65">
            <input type="text" id="school" tabindex="9" />
          </div>
        </fieldset>
      
        <fieldset>
          <input type="button" class="Btn-profil cancel" value="Cancel" />
          <input type="submit" name="submit" class="Btn-profil" value="Save Changes" />
        </fieldset>
      </form>
        <?php endforeach;?>
    </div>
  </div>
</div>



</body>
</html>