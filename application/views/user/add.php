<div class="row">
    <div class="col-md-12">
      <?php
        // Jika ada pesan sukses/kesalahan
        if (isset($success)){
          if ($success){
            echo '<div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Sukses!</h4>'.$message.
                 '</div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>'.$message.
                 '</div>';
          }
        }
       ?>
		<?php echo form_open_multipart('user/add',array("class"=>"form-horizontal")); ?>
		<div class="box">
	   		<div class='box-header with-border'>
	      		<h4 class="box-title">Akun Pengguna</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>
	        	<div class="form-group">
				         <label for="user_name" class="col-md-2 control-label">Nama Pengguna</label>
				         <div class="col-md-10">
					           <input type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" class="form-control" id="user_name" placeholder="Wajib diisi"/>
                     <?php echo form_error('user_name'); ?>
			           </div>
				    </div>
				    <div class="form-group">
					       <label for="user_id" class="col-md-2 control-label">User-ID</label>
					       <div class="col-md-5">
						         <input type="text" name="user_id" value="<?php echo $this->input->post('user_id'); ?>" class="form-control" id="user_id" placeholder="Wajib diisi dan kode harus unik" />
                     <?php echo form_error('user_id'); ?>
					       </div>
				    </div>
            <div class="form-group">
					       <label for="user_password" class="col-md-2 control-label">Password</label>
					       <div class="col-md-5">
						         <input type="password" name="user_password" value="<?php echo $this->input->post('user_password'); ?>" class="form-control" id="user_password" placeholder="Wajib diisi dengan minimal 8 karakter" />
                     <?php echo form_error('user_password'); ?>
					       </div>
				    </div>
            <div class="form-group">
    					<label for="user_email" class="col-md-2 control-label">Email</label>
    					<div class="col-md-5">
    						<input type="text" name="user_email" value="<?php echo $this->input->post('user_email'); ?>" class="form-control" id="user_email" />
                <?php echo form_error('user_email'); ?>
    					</div>
    				</div>
            <div class="form-group">
    					<label for="user_hp" class="col-md-2 control-label">HP</label>
    					<div class="col-md-5">
    						<input type="text" name="user_hp" value="<?php echo $this->input->post('user_hp'); ?>" class="form-control" id="user_hp" />
    					</div>
    				</div>
            <div class="form-group">
              <label for="user_role" class="col-md-2 control-label">Peranan</label>
              <div class="col-md-5">
                <select name="user_role" class="form-control">
                  <option value="Operator">Operator</option>
                  <option value="Admin">Administrator</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="user_status" class="col-md-2 control-label">Status</label>
              <div class="col-md-5">
                <select name="user_status" class="form-control">
                  <option value="Aktif">Aktif</option>
                  <option value="Diblok">Diblok</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="user_pd" class="col-md-2 control-label">Perangkat Daerah</label>
              <div class="col-md-5">
                <?php echo form_dropdown('user_pd', $pd,'','class="form-control"'); ?>
              </div>
            </div>
            <div class="form-group">
    					<label for="user_photo" class="col-md-2 control-label">Foto</label>
    					<div class="col-md-5">
    						<input type="file" name="user_photo" value="<?php echo $this->input->post('user_photo'); ?>" class="form-control" id="user_photo" />
    						<p class="help-block">File foto harus dalam format gambar (JPG, PNG, atau GIF) dengan ukuran file < 500 KB.</p>
    					</div>
    				</div>
			  </div><!-- /.box-body -->
		</div><!-- /.box -->

  	<div class="form-group">
			<div class="col-md-8"></div>
			<div class="col-md-2">
      	<button class="btn btn-default">
      		<a href="<?php echo site_url('user/index');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
      	</button>
      </div>
			<div class="col-md-2">
      	<button type="submit" class="btn btn-success">
      		<i class="fa fa-check"></i> Simpan
      	</button>
       </div>
  	</div>


        <?php echo form_close(); ?>
    </div>
</div>
