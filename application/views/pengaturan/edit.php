<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit</h3>
            </div>
			
			<?php echo form_open('pengaturan/edit/'.$pengaturan['id'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">
					<div class="form-group">
						<label for="tahun_aktif" class="col-md-4 control-label">Tahun Aktif</label>
						<div class="col-md-8">
							<input type="text" name="tahun_aktif" value="<?php echo ($this->input->post('tahun_aktif') ? $this->input->post('tahun_aktif') : $pengaturan['tahun_aktif']); ?>" class="form-control" id="tahun_aktif" />
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