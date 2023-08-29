<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Add</h3>
            </div>
            
			<?php echo form_open('program/add',array("class"=>"form-horizontal")); ?>

              	<div class="box-body">
                	<div class="form-group">
						<label for="nama_prog" class="col-md-4 control-label">Nama Prog</label>
						<div class="col-md-8">
							<input type="text" name="nama_prog" value="<?php echo $this->input->post('nama_prog'); ?>" class="form-control" id="nama_prog" />
						</div>
					</div>
					<div class="form-group">
						<label for="kode_pd" class="col-md-4 control-label">Kode Pd</label>
						<div class="col-md-8">
							<input type="text" name="kode_pd" value="<?php echo $this->input->post('kode_pd'); ?>" class="form-control" id="kode_pd" />
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