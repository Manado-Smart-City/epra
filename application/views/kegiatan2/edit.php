<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit</h3>
            </div>
			
			<?php echo form_open('kegiatan/edit/'.$kegiatan['kode_giat'],array("class"=>"form-horizontal")); ?>

				<div class="box-body">
					<div class="form-group">
						<label for="nama_giat" class="col-md-4 control-label">Nama Giat</label>
						<div class="col-md-8">
							<input type="text" name="nama_giat" value="<?php echo ($this->input->post('nama_giat') ? $this->input->post('nama_giat') : $kegiatan['nama_giat']); ?>" class="form-control" id="nama_giat" />
						</div>
					</div>
					<div class="form-group">
						<label for="kode_prog" class="col-md-4 control-label">Kode Prog</label>
						<div class="col-md-8">
							<input type="text" name="kode_prog" value="<?php echo ($this->input->post('kode_prog') ? $this->input->post('kode_prog') : $kegiatan['kode_prog']); ?>" class="form-control" id="kode_prog" />
						</div>
					</div>
					<div class="form-group">
						<label for="nip_pptk" class="col-md-4 control-label">Nip Pptk</label>
						<div class="col-md-8">
							<input type="text" name="nip_pptk" value="<?php echo ($this->input->post('nip_pptk') ? $this->input->post('nip_pptk') : $kegiatan['nip_pptk']); ?>" class="form-control" id="nip_pptk" />
						</div>
					</div>
					<div class="form-group">
						<label for="pagu_giat" class="col-md-4 control-label">Pagu Giat</label>
						<div class="col-md-8">
							<input type="text" name="pagu_giat" value="<?php echo ($this->input->post('pagu_giat') ? $this->input->post('pagu_giat') : $kegiatan['pagu_giat']); ?>" class="form-control" id="pagu_giat" />
						</div>
					</div>
					<div class="form-group">
						<label for="tahun_giat" class="col-md-4 control-label">Tahun Giat</label>
						<div class="col-md-8">
							<input type="text" name="tahun_giat" value="<?php echo ($this->input->post('tahun_giat') ? $this->input->post('tahun_giat') : $kegiatan['tahun_giat']); ?>" class="form-control" id="tahun_giat" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_1" class="col-md-4 control-label">Tf 1</label>
						<div class="col-md-8">
							<input type="text" name="tf_1" value="<?php echo ($this->input->post('tf_1') ? $this->input->post('tf_1') : $kegiatan['tf_1']); ?>" class="form-control" id="tf_1" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_2" class="col-md-4 control-label">Tf 2</label>
						<div class="col-md-8">
							<input type="text" name="tf_2" value="<?php echo ($this->input->post('tf_2') ? $this->input->post('tf_2') : $kegiatan['tf_2']); ?>" class="form-control" id="tf_2" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_3" class="col-md-4 control-label">Tf 3</label>
						<div class="col-md-8">
							<input type="text" name="tf_3" value="<?php echo ($this->input->post('tf_3') ? $this->input->post('tf_3') : $kegiatan['tf_3']); ?>" class="form-control" id="tf_3" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_4" class="col-md-4 control-label">Tf 4</label>
						<div class="col-md-8">
							<input type="text" name="tf_4" value="<?php echo ($this->input->post('tf_4') ? $this->input->post('tf_4') : $kegiatan['tf_4']); ?>" class="form-control" id="tf_4" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_5" class="col-md-4 control-label">Tf 5</label>
						<div class="col-md-8">
							<input type="text" name="tf_5" value="<?php echo ($this->input->post('tf_5') ? $this->input->post('tf_5') : $kegiatan['tf_5']); ?>" class="form-control" id="tf_5" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_6" class="col-md-4 control-label">Tf 6</label>
						<div class="col-md-8">
							<input type="text" name="tf_6" value="<?php echo ($this->input->post('tf_6') ? $this->input->post('tf_6') : $kegiatan['tf_6']); ?>" class="form-control" id="tf_6" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_7" class="col-md-4 control-label">Tf 7</label>
						<div class="col-md-8">
							<input type="text" name="tf_7" value="<?php echo ($this->input->post('tf_7') ? $this->input->post('tf_7') : $kegiatan['tf_7']); ?>" class="form-control" id="tf_7" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_8" class="col-md-4 control-label">Tf 8</label>
						<div class="col-md-8">
							<input type="text" name="tf_8" value="<?php echo ($this->input->post('tf_8') ? $this->input->post('tf_8') : $kegiatan['tf_8']); ?>" class="form-control" id="tf_8" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_9" class="col-md-4 control-label">Tf 9</label>
						<div class="col-md-8">
							<input type="text" name="tf_9" value="<?php echo ($this->input->post('tf_9') ? $this->input->post('tf_9') : $kegiatan['tf_9']); ?>" class="form-control" id="tf_9" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_10" class="col-md-4 control-label">Tf 10</label>
						<div class="col-md-8">
							<input type="text" name="tf_10" value="<?php echo ($this->input->post('tf_10') ? $this->input->post('tf_10') : $kegiatan['tf_10']); ?>" class="form-control" id="tf_10" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_11" class="col-md-4 control-label">Tf 11</label>
						<div class="col-md-8">
							<input type="text" name="tf_11" value="<?php echo ($this->input->post('tf_11') ? $this->input->post('tf_11') : $kegiatan['tf_11']); ?>" class="form-control" id="tf_11" />
						</div>
					</div>
					<div class="form-group">
						<label for="tf_12" class="col-md-4 control-label">Tf 12</label>
						<div class="col-md-8">
							<input type="text" name="tf_12" value="<?php echo ($this->input->post('tf_12') ? $this->input->post('tf_12') : $kegiatan['tf_12']); ?>" class="form-control" id="tf_12" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_1" class="col-md-4 control-label">Rf 1</label>
						<div class="col-md-8">
							<input type="text" name="rf_1" value="<?php echo ($this->input->post('rf_1') ? $this->input->post('rf_1') : $kegiatan['rf_1']); ?>" class="form-control" id="rf_1" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_2" class="col-md-4 control-label">Rf 2</label>
						<div class="col-md-8">
							<input type="text" name="rf_2" value="<?php echo ($this->input->post('rf_2') ? $this->input->post('rf_2') : $kegiatan['rf_2']); ?>" class="form-control" id="rf_2" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_3" class="col-md-4 control-label">Rf 3</label>
						<div class="col-md-8">
							<input type="text" name="rf_3" value="<?php echo ($this->input->post('rf_3') ? $this->input->post('rf_3') : $kegiatan['rf_3']); ?>" class="form-control" id="rf_3" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_4" class="col-md-4 control-label">Rf 4</label>
						<div class="col-md-8">
							<input type="text" name="rf_4" value="<?php echo ($this->input->post('rf_4') ? $this->input->post('rf_4') : $kegiatan['rf_4']); ?>" class="form-control" id="rf_4" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_5" class="col-md-4 control-label">Rf 5</label>
						<div class="col-md-8">
							<input type="text" name="rf_5" value="<?php echo ($this->input->post('rf_5') ? $this->input->post('rf_5') : $kegiatan['rf_5']); ?>" class="form-control" id="rf_5" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_6" class="col-md-4 control-label">Rf 6</label>
						<div class="col-md-8">
							<input type="text" name="rf_6" value="<?php echo ($this->input->post('rf_6') ? $this->input->post('rf_6') : $kegiatan['rf_6']); ?>" class="form-control" id="rf_6" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_7" class="col-md-4 control-label">Rf 7</label>
						<div class="col-md-8">
							<input type="text" name="rf_7" value="<?php echo ($this->input->post('rf_7') ? $this->input->post('rf_7') : $kegiatan['rf_7']); ?>" class="form-control" id="rf_7" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_8" class="col-md-4 control-label">Rf 8</label>
						<div class="col-md-8">
							<input type="text" name="rf_8" value="<?php echo ($this->input->post('rf_8') ? $this->input->post('rf_8') : $kegiatan['rf_8']); ?>" class="form-control" id="rf_8" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_9" class="col-md-4 control-label">Rf 9</label>
						<div class="col-md-8">
							<input type="text" name="rf_9" value="<?php echo ($this->input->post('rf_9') ? $this->input->post('rf_9') : $kegiatan['rf_9']); ?>" class="form-control" id="rf_9" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_10" class="col-md-4 control-label">Rf 10</label>
						<div class="col-md-8">
							<input type="text" name="rf_10" value="<?php echo ($this->input->post('rf_10') ? $this->input->post('rf_10') : $kegiatan['rf_10']); ?>" class="form-control" id="rf_10" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_11" class="col-md-4 control-label">Rf 11</label>
						<div class="col-md-8">
							<input type="text" name="rf_11" value="<?php echo ($this->input->post('rf_11') ? $this->input->post('rf_11') : $kegiatan['rf_11']); ?>" class="form-control" id="rf_11" />
						</div>
					</div>
					<div class="form-group">
						<label for="rf_12" class="col-md-4 control-label">Rf 12</label>
						<div class="col-md-8">
							<input type="text" name="rf_12" value="<?php echo ($this->input->post('rf_12') ? $this->input->post('rf_12') : $kegiatan['rf_12']); ?>" class="form-control" id="rf_12" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_1" class="col-md-4 control-label">Tk 1</label>
						<div class="col-md-8">
							<input type="text" name="tk_1" value="<?php echo ($this->input->post('tk_1') ? $this->input->post('tk_1') : $kegiatan['tk_1']); ?>" class="form-control" id="tk_1" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_2" class="col-md-4 control-label">Tk 2</label>
						<div class="col-md-8">
							<input type="text" name="tk_2" value="<?php echo ($this->input->post('tk_2') ? $this->input->post('tk_2') : $kegiatan['tk_2']); ?>" class="form-control" id="tk_2" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_3" class="col-md-4 control-label">Tk 3</label>
						<div class="col-md-8">
							<input type="text" name="tk_3" value="<?php echo ($this->input->post('tk_3') ? $this->input->post('tk_3') : $kegiatan['tk_3']); ?>" class="form-control" id="tk_3" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_4" class="col-md-4 control-label">Tk 4</label>
						<div class="col-md-8">
							<input type="text" name="tk_4" value="<?php echo ($this->input->post('tk_4') ? $this->input->post('tk_4') : $kegiatan['tk_4']); ?>" class="form-control" id="tk_4" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_5" class="col-md-4 control-label">Tk 5</label>
						<div class="col-md-8">
							<input type="text" name="tk_5" value="<?php echo ($this->input->post('tk_5') ? $this->input->post('tk_5') : $kegiatan['tk_5']); ?>" class="form-control" id="tk_5" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_6" class="col-md-4 control-label">Tk 6</label>
						<div class="col-md-8">
							<input type="text" name="tk_6" value="<?php echo ($this->input->post('tk_6') ? $this->input->post('tk_6') : $kegiatan['tk_6']); ?>" class="form-control" id="tk_6" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_7" class="col-md-4 control-label">Tk 7</label>
						<div class="col-md-8">
							<input type="text" name="tk_7" value="<?php echo ($this->input->post('tk_7') ? $this->input->post('tk_7') : $kegiatan['tk_7']); ?>" class="form-control" id="tk_7" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_8" class="col-md-4 control-label">Tk 8</label>
						<div class="col-md-8">
							<input type="text" name="tk_8" value="<?php echo ($this->input->post('tk_8') ? $this->input->post('tk_8') : $kegiatan['tk_8']); ?>" class="form-control" id="tk_8" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_9" class="col-md-4 control-label">Tk 9</label>
						<div class="col-md-8">
							<input type="text" name="tk_9" value="<?php echo ($this->input->post('tk_9') ? $this->input->post('tk_9') : $kegiatan['tk_9']); ?>" class="form-control" id="tk_9" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_10" class="col-md-4 control-label">Tk 10</label>
						<div class="col-md-8">
							<input type="text" name="tk_10" value="<?php echo ($this->input->post('tk_10') ? $this->input->post('tk_10') : $kegiatan['tk_10']); ?>" class="form-control" id="tk_10" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_11" class="col-md-4 control-label">Tk 11</label>
						<div class="col-md-8">
							<input type="text" name="tk_11" value="<?php echo ($this->input->post('tk_11') ? $this->input->post('tk_11') : $kegiatan['tk_11']); ?>" class="form-control" id="tk_11" />
						</div>
					</div>
					<div class="form-group">
						<label for="tk_12" class="col-md-4 control-label">Tk 12</label>
						<div class="col-md-8">
							<input type="text" name="tk_12" value="<?php echo ($this->input->post('tk_12') ? $this->input->post('tk_12') : $kegiatan['tk_12']); ?>" class="form-control" id="tk_12" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_1" class="col-md-4 control-label">Rk 1</label>
						<div class="col-md-8">
							<input type="text" name="rk_1" value="<?php echo ($this->input->post('rk_1') ? $this->input->post('rk_1') : $kegiatan['rk_1']); ?>" class="form-control" id="rk_1" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_2" class="col-md-4 control-label">Rk 2</label>
						<div class="col-md-8">
							<input type="text" name="rk_2" value="<?php echo ($this->input->post('rk_2') ? $this->input->post('rk_2') : $kegiatan['rk_2']); ?>" class="form-control" id="rk_2" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_3" class="col-md-4 control-label">Rk 3</label>
						<div class="col-md-8">
							<input type="text" name="rk_3" value="<?php echo ($this->input->post('rk_3') ? $this->input->post('rk_3') : $kegiatan['rk_3']); ?>" class="form-control" id="rk_3" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_4" class="col-md-4 control-label">Rk 4</label>
						<div class="col-md-8">
							<input type="text" name="rk_4" value="<?php echo ($this->input->post('rk_4') ? $this->input->post('rk_4') : $kegiatan['rk_4']); ?>" class="form-control" id="rk_4" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_5" class="col-md-4 control-label">Rk 5</label>
						<div class="col-md-8">
							<input type="text" name="rk_5" value="<?php echo ($this->input->post('rk_5') ? $this->input->post('rk_5') : $kegiatan['rk_5']); ?>" class="form-control" id="rk_5" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_6" class="col-md-4 control-label">Rk 6</label>
						<div class="col-md-8">
							<input type="text" name="rk_6" value="<?php echo ($this->input->post('rk_6') ? $this->input->post('rk_6') : $kegiatan['rk_6']); ?>" class="form-control" id="rk_6" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_7" class="col-md-4 control-label">Rk 7</label>
						<div class="col-md-8">
							<input type="text" name="rk_7" value="<?php echo ($this->input->post('rk_7') ? $this->input->post('rk_7') : $kegiatan['rk_7']); ?>" class="form-control" id="rk_7" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_8" class="col-md-4 control-label">Rk 8</label>
						<div class="col-md-8">
							<input type="text" name="rk_8" value="<?php echo ($this->input->post('rk_8') ? $this->input->post('rk_8') : $kegiatan['rk_8']); ?>" class="form-control" id="rk_8" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_9" class="col-md-4 control-label">Rk 9</label>
						<div class="col-md-8">
							<input type="text" name="rk_9" value="<?php echo ($this->input->post('rk_9') ? $this->input->post('rk_9') : $kegiatan['rk_9']); ?>" class="form-control" id="rk_9" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_10" class="col-md-4 control-label">Rk 10</label>
						<div class="col-md-8">
							<input type="text" name="rk_10" value="<?php echo ($this->input->post('rk_10') ? $this->input->post('rk_10') : $kegiatan['rk_10']); ?>" class="form-control" id="rk_10" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_11" class="col-md-4 control-label">Rk 11</label>
						<div class="col-md-8">
							<input type="text" name="rk_11" value="<?php echo ($this->input->post('rk_11') ? $this->input->post('rk_11') : $kegiatan['rk_11']); ?>" class="form-control" id="rk_11" />
						</div>
					</div>
					<div class="form-group">
						<label for="rk_12" class="col-md-4 control-label">Rk 12</label>
						<div class="col-md-8">
							<input type="text" name="rk_12" value="<?php echo ($this->input->post('rk_12') ? $this->input->post('rk_12') : $kegiatan['rk_12']); ?>" class="form-control" id="rk_12" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_tgl" class="col-md-4 control-label">Update Tgl</label>
						<div class="col-md-8">
							<input type="text" name="update_tgl" value="<?php echo ($this->input->post('update_tgl') ? $this->input->post('update_tgl') : $kegiatan['update_tgl']); ?>" class="form-control" id="update_tgl" />
						</div>
					</div>
					<div class="form-group">
						<label for="update_oleh" class="col-md-4 control-label">Update Oleh</label>
						<div class="col-md-8">
							<input type="text" name="update_oleh" value="<?php echo ($this->input->post('update_oleh') ? $this->input->post('update_oleh') : $kegiatan['update_oleh']); ?>" class="form-control" id="update_oleh" />
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