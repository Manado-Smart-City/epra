<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit</h3>
            </div>
			
			<?php echo form_open('pp/edit/'.$pp['nip_pp'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">
					<div class="form-group">
						<label for="nama_pp" class="col-md-4 control-label">Nama Pp</label>
						<div class="col-md-8">
							<input type="text" name="nama_pp" value="<?php echo ($this->input->post('nama_pp') ? $this->input->post('nama_pp') : $pp['nama_pp']); ?>" class="form-control" id="nama_pp" />
						</div>
					</div>
					<div class="form-group">
						<label for="kode_pd" class="col-md-4 control-label">Kode Pd</label>
						<div class="col-md-8">
							<input type="text" name="kode_pd" value="<?php echo ($this->input->post('kode_pd') ? $this->input->post('kode_pd') : $pp['kode_pd']); ?>" class="form-control" id="kode_pd" />
						</div>
					</div>
					<div class="form-group">
						<label for="jabat_pp" class="col-md-4 control-label">Jabat Pp</label>
						<div class="col-md-8">
							<input type="text" name="jabat_pp" value="<?php echo ($this->input->post('jabat_pp') ? $this->input->post('jabat_pp') : $pp['jabat_pp']); ?>" class="form-control" id="jabat_pp" />
						</div>
					</div>
					<div class="form-group">
						<label for="foto_pp" class="col-md-4 control-label">Foto Pp</label>
						<div class="col-md-8">
							<input type="text" name="foto_pp" value="<?php echo ($this->input->post('foto_pp') ? $this->input->post('foto_pp') : $pp['foto_pp']); ?>" class="form-control" id="foto_pp" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_tgl" class="col-md-4 control-label">Update Tgl</label>
						<div class="col-md-8">
							<input type="text" name="update_tgl" value="<?php echo ($this->input->post('update_tgl') ? $this->input->post('update_tgl') : $pp['update_tgl']); ?>" class="form-control" id="update_tgl" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_oleh" class="col-md-4 control-label">Update Oleh</label>
						<div class="col-md-8">
							<input type="text" name="update_oleh" value="<?php echo ($this->input->post('update_oleh') ? $this->input->post('update_oleh') : $pp['update_oleh']); ?>" class="form-control" id="update_oleh" />
						</div>
					</div>
				</div>

				<div class="box-footer">
                	<div class="form-group">
              			<div class="col-md-4"></div>
          				<div class="col-md-8">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
						</div>
					</div>
		        </div>
				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>