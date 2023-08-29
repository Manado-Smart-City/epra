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
		<?php echo form_open_multipart('program/edit/'.$program['kode_prog'],array("class"=>"form-horizontal")); ?>
    <div class="box">
	   		<div class='box-header with-border'>
	      		<h4 class="box-title">Edit Program</h4>
	      </div><!-- /.box-header -->
	      <div class='box-body'>
	        	<div class="form-group">
				         <label for="nama_prog" class="col-md-2 control-label">Nama Program</label>
				         <div class="col-md-10">
					           <input type="text" name="nama_prog" value="<?php echo ($this->input->post('nama_prog') ? $this->input->post('nama_prog') : $program['nama_prog']); ?>" class="form-control" id="nama_prog" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_prog'); ?>
			           </div>
				    </div>
			  </div><!-- /.box-body -->
		</div><!-- /.box -->


	        	<div class="form-group">
	      			<div class="col-md-8"></div>
  	  				<div class="col-md-2">
              	<button type="button" class="btn btn-default">
              		<a href="<?php echo base_url('program/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
              	</button>
  	          </div>
  	  				<div class="col-md-2">
                <input type="hidden" name="kode_prog" value="<?php echo $program['kode_prog']; ?>">
              	<button type="submit" class="btn btn-success">
              		<i class="fa fa-check"></i> Simpan
              	</button>
  	           </div>
	        	</div>


        <?php echo form_close(); ?>
    </div>
</div>
