


	<div class="courses_box1">
	   <div class="container">
		 <form action="<?php echo base_url();?>admin/c_lupa_password/cari_user" method="POST">
	    	<p class="lead">Lupa Password</p>
		    <div class="form-group">
			    <input autocomplete="off" type="text" name="username" class="required form-control" placeholder="Username" maxlength="20">
		    </div>
		    <div class="form-group">
                    <select name="id" class="required form-control">
                <?php foreach ($pertanyaan as $data):?>
                        <option value="<?php echo $data->id;?>"><?php echo $data->pertanyaan;?></option>
                <?php endforeach;?>
                    </select>
		    </div>
             <div class="form-group">
                <input autocomplete="off" type="text" onKeyPress="return hurufangka(this, event)" name="jawaban" class="required form-control" placeholder="Hint Jawaban" maxlength="50">
            </div>
            <div class="form-group">
		    	<input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="Cari">
		    </div>

		 </form>
	   </div>
	</div>
