<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Add</h3>
            </div>
            
			<?php echo form_open('pptk/add',array("class"=>"form-horizontal")); ?>

              	<div class="box-body">
                	<div class="form-group">
						<label for="nama_pptk" class="col-md-4 control-label">Nama Pptk</label>
						<div class="col-md-8">
							<input type="text" name="nama_pptk" value="<?php echo $this->input->post('nama_pptk'); ?>" class="form-control" id="nama_pptk" />
						</div>
					</div>
					<div class="form-group">
						<label for="kode_pd" class="col-md-4 control-label">Kode Pd</label>
						<div class="col-md-8">
							<input type="text" name="kode_pd" value="<?php echo $this->input->post('kode_pd'); ?>" class="form-control" id="kode_pd" />
						</div>
					</div>
					<div class="form-group">
						<label for="jabat_pptk" class="col-md-4 control-label">Jabat Pptk</label>
						<div class="col-md-8">
							<input type="text" name="jabat_pptk" value="<?php echo $this->input->post('jabat_pptk'); ?>" class="form-control" id="jabat_pptk" />
						</div>
					</div>
					<div class="form-group">
						<label for="foto_pptk" class="col-md-4 control-label">Foto Pptk</label>
						<div class="col-md-8">
							<input type="text" name="foto_pptk" value="<?php echo $this->input->post('foto_pptk'); ?>" class="form-control" id="foto_pptk" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_tgl" class="col-md-4 control-label">Update Tgl</label>
						<div class="col-md-8">
							<input type="text" name="update_tgl" value="<?php echo $this->input->post('update_tgl'); ?>" class="form-control" id="update_tgl" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_oleh" class="col-md-4 control-label">Update Oleh</label>
						<div class="col-md-8">
							<input type="text" name="update_oleh" value="<?php echo $this->input->post('update_oleh'); ?>" class="form-control" id="update_oleh" />
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