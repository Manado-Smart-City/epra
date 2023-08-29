<div class="row">
    <div class="col-md-12">
		<?php echo form_open_multipart('program/view/'.$program['kode_prog'],array("class"=>"form-horizontal")); ?>
    <div class="box">
	   		<div class='box-header with-border'>
	      		<h4 class="box-title">Tampil Program Belanja Langsung</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>
	        	<div class="form-group">
				         <label for="kode_prog" class="col-md-2 control-label">Kode Program</label>
				         <div class="col-md-5">
					           <input readonly type="text" name="kode_prog" value="<?php echo ($this->input->post('kode_prog') ? $this->input->post('kode_prog') : $program['kode_prog']); ?>" class="form-control" id="kode_prog"/>
                     <?php echo form_error('kode_prog'); ?>
			           </div>
				    </div>

	        	<div class="form-group">
				         <label for="nama_prog" class="col-md-2 control-label">Nama Program</label>
				         <div class="col-md-10">
					           <input readonly type="text" name="nama_prog" value="<?php echo ($this->input->post('nama_prog') ? $this->input->post('nama_prog') : $program['nama_prog']); ?>" class="form-control" id="nama_prog" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_prog'); ?>
			           </div>
				    </div>				    
			  </div><!-- /.box-body -->
		</div><!-- /.box -->


	        	<div class="form-group">
	      			<div class="col-md-10"></div>
  	  				<div class="col-md-2">
              	<button type="button" class="btn btn-default">
              		<a href="<?php echo base_url('program/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
              	</button>
  	          </div>
	        	</div>
        <?php echo form_close(); ?>
    </div>
</div>
