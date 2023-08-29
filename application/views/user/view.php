<div class="row">
	<div class="col-md-12">
    <?php echo form_open_multipart( 'pd/edit/'.$user['user_id'],array( "class"=>"form-horizontal")); ?>
		<div class="box">
			<div class='box-header with-border'>
				<h4 class="box-title">Akun Pengguna</h4>
			</div>
			<!-- /.box-header -->
			<div class='box-body'>
				<div class="form-group">
					<label for="user_name" class="col-md-2 control-label">Nama Pengguna</label>
					<div class="col-md-10">
						<input readonly type="text" name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $user['user_name']); ?>" class="form-control" id="user_name" placeholder="Wajib diisi"/>
					</div>
				</div>
				<div class="form-group">
					<label for="user_id" class="col-md-2 control-label">User-ID</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_id" value="<?php echo ($this->input->post('user_id') ? $this->input->post('user_id') : $user['user_id']); ?>" class="form-control" id="user_id" placeholder="Wajib diisi dan kode harus unik" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_email" class="col-md-2 control-label">Email</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_email" value="<?php echo ($this->input->post('user_email') ? $this->input->post('user_email') : $user['user_email']); ?>" class="form-control" id="user_email" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_hp" class="col-md-2 control-label">HP</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_hp" value="<?php echo ($this->input->post('user_hp') ? $this->input->post('user_hp') : $user['user_hp']); ?>" class="form-control" id="user_hp" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_role" class="col-md-2 control-label">Peranan</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_role" value="<?php echo $user['user_role']; ?>" class="form-control" id="user_role" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_status" class="col-md-2 control-label">Status</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_status" value="<?php echo $user['user_status']; ?>" class="form-control" id="user_status" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_pd" class="col-md-2 control-label">Perangkat Daerah</label>
					<div class="col-md-5">
						<input readonly type="text" name="user_pd" value="<?php echo $user['nama_pd']; ?>" class="form-control" id="user_pd" />
					</div>
				</div>
				<div class="form-group">
					<label for="user_photo" class="col-md-2 control-label">Foto</label>
					<div class="col-md-5">
						<?php if (!$user['user_photo']=="" ) { echo '<br><img src="'; echo site_url( 'resources/img/user_photos/'.$user['user_photo']); echo '" width="100px" class="img-thumbnail" alt="foto">'; } ?>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
		<div class="form-group">
			<div class="col-md-10"></div>
			<div class="col-md-2">
				<button class="btn btn-default">
				<a href="<?php echo site_url('user/index');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
				</button>
			</div>
		</div>
    <?php echo form_close(); ?>
	</div>
</div>
