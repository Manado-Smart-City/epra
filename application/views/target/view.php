<div class="row">
    <div class="col-md-12">
		<?php echo form_open_multipart('program/view/'.$kegiatan['kode_giat'],array("class"=>"form-horizontal")); ?>
    <div class="box">
	   		<div class='box-header with-border'>
            <label class="control-label"><i class="fa fa-cube"></i> Program: <?php echo $program['nama_prog']; ?></label><br><br>
	      		<h4 class="box-title">Tampil Kegiatan</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>
	        	<div class="form-group">
				         <label for="nama_giat" class="col-md-2 control-label">Nama Kegiatan</label>
				         <div class="col-md-10">
					           <input readonly type="text" name="nama_giat" value="<?php echo ($this->input->post('nama_giat') ? $this->input->post('nama_giat') : $kegiatan['nama_giat']); ?>" class="form-control" id="nama_giat" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_giat'); ?>
			           </div>
				    </div>
            <div class="form-group">
                 <label for="kode_giat" class="col-md-2 control-label">Kode Kegiatan</label>
                 <div class="col-md-5">
                     <input readonly type="text" name="kode_giat" value="<?php echo ($this->input->post('kode_giat') ? $this->input->post('kode_giat') : $kegiatan['kode_giat']); ?>" class="form-control" id="kode_giat" placeholder="Wajib diisi"/>
                     <?php echo form_error('kode_giat'); ?>
                 </div>
            </div>
            <div class="form-group">
				         <label for="pagu_giat" class="col-md-2 control-label">Pagu (Rp.)</label>
				         <div class="col-md-5">
					           <input readonly type="text" name="pagu_giat" value="<?php echo ($this->input->post('pagu_giat') ? $this->input->post('pagu_giat') : number_format($kegiatan['pagu_giat'])); ?>" class="form-control" id="pagu_giat" placeholder="Wajib diisi"/>
                     <?php echo form_error('pagu_giat'); ?>
			           </div>
				    </div>
			  </div><!-- /.box-body -->
		</div><!-- /.box -->


	        	<div class="form-group">
	      			<div class="col-md-10"></div>
  	  				<div class="col-md-2">
              	<button type="button" class="btn btn-default">
              		<a href="<?php echo base_url('kegiatan/index/'.$kegiatan['kode_prog']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
              	</button>
  	          </div>
	        	</div>
        <?php echo form_close(); ?>
    </div>
</div>