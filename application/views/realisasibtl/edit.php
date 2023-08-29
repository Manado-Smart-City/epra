<div class="row">
   <div class="col-md-22">
      <?php
         // Jika ada pesan sukses/kesalahan
         if (isset($success)){
           if ($success){
             echo '<div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h4><i class="fa fa-calendar"></i> <i class="icon fa fa-check"></i> Sukses!</h4>'.$message.
                  '</div>';
           } else {
             echo '<div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h4><i class="fa fa-calendar"></i> <i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>'.$message.
                  '</div>';
           }
         }
         ?>
      <?php echo form_open_multipart('realisasibtl/edit/',array("class"=>"form-horizontal")); ?>
      <div class="box">
         <div class='box-header with-border'>
            <h4 class="box-title">Edit Realisasi Belanja Tidak Langsung</h4>
         </div>
         <!-- /.box-header -->
         <div class='box-body'>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Januari</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_1" value="<?php echo ($this->input->post('btl_rf_1') ? $this->input->post('btl_rf_1') : $pd['btl_rf_1']); ?>" class="form-control floating" id="btl_rf_1"/>
	                        <?php echo form_error('btl_rf_1'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_1" value="<?php echo ($this->input->post('btl_rk_1') ? $this->input->post('btl_rk_1') : $pd['btl_rk_1']); ?>" class="form-control integer" id="btl_rk_1"/>
	                        <?php echo form_error('btl_rk_1'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Februari</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_2" value="<?php echo ($this->input->post('btl_rf_2') ? $this->input->post('btl_rf_2') : $pd['btl_rf_2']); ?>" class="form-control floating" id="btl_rf_2"/>
	                        <?php echo form_error('btl_rf_2'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_2" value="<?php echo ($this->input->post('btl_rk_2') ? $this->input->post('btl_rk_2') : $pd['btl_rk_2']); ?>" class="form-control integer" id="btl_rk_2"/>
	                        <?php echo form_error('btl_rk_2'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Maret</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_3" value="<?php echo ($this->input->post('btl_rf_3') ? $this->input->post('btl_rf_3') : $pd['btl_rf_3']); ?>" class="form-control floating" id="btl_rf_3"/>
	                        <?php echo form_error('btl_rf_3'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_3" value="<?php echo ($this->input->post('btl_rk_3') ? $this->input->post('btl_rk_3') : $pd['btl_rk_3']); ?>" class="form-control integer" id="btl_rk_3"/>
	                        <?php echo form_error('btl_rk_3'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> April</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_4" value="<?php echo ($this->input->post('btl_rf_4') ? $this->input->post('btl_rf_4') : $pd['btl_rf_4']); ?>" class="form-control floating" id="btl_rf_4"/>
	                        <?php echo form_error('btl_rf_4'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_4" value="<?php echo ($this->input->post('btl_rk_4') ? $this->input->post('btl_rk_4') : $pd['btl_rk_4']); ?>" class="form-control integer" id="btl_rk_4"/>
	                        <?php echo form_error('btl_rk_4'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Mei</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_5" value="<?php echo ($this->input->post('btl_rf_5') ? $this->input->post('btl_rf_5') : $pd['btl_rf_5']); ?>" class="form-control floating" id="btl_rf_5"/>
	                        <?php echo form_error('btl_rf_5'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_5" value="<?php echo ($this->input->post('btl_rk_5') ? $this->input->post('btl_rk_5') : $pd['btl_rk_5']); ?>" class="form-control integer" id="btl_rk_5"/>
	                        <?php echo form_error('btl_rk_5'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Juni</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_6" value="<?php echo ($this->input->post('btl_rf_6') ? $this->input->post('btl_rf_6') : $pd['btl_rf_6']); ?>" class="form-control floating" id="btl_rf_6"/>
	                        <?php echo form_error('btl_rf_6'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_6" value="<?php echo ($this->input->post('btl_rk_6') ? $this->input->post('btl_rk_6') : $pd['btl_rk_6']); ?>" class="form-control integer" id="btl_rk_6"/>
	                        <?php echo form_error('btl_rk_6'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Juli</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_7" value="<?php echo ($this->input->post('btl_rf_7') ? $this->input->post('btl_rf_7') : $pd['btl_rf_7']); ?>" class="form-control floating" id="btl_rf_7"/>
	                        <?php echo form_error('btl_rf_7'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_7" value="<?php echo ($this->input->post('btl_rk_7') ? $this->input->post('btl_rk_7') : $pd['btl_rk_7']); ?>" class="form-control integer" id="btl_rk_7"/>
	                        <?php echo form_error('btl_rk_7'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Agustus</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_8" value="<?php echo ($this->input->post('btl_rf_8') ? $this->input->post('btl_rf_8') : $pd['btl_rf_8']); ?>" class="form-control floating" id="btl_rf_8"/>
	                        <?php echo form_error('btl_rf_8'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_8" value="<?php echo ($this->input->post('btl_rk_8') ? $this->input->post('btl_rk_8') : $pd['btl_rk_8']); ?>" class="form-control integer" id="btl_rk_8"/>
	                        <?php echo form_error('btl_rk_8'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> September</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_9" value="<?php echo ($this->input->post('btl_rf_9') ? $this->input->post('btl_rf_9') : $pd['btl_rf_9']); ?>" class="form-control floating" id="btl_rf_9"/>
	                        <?php echo form_error('btl_rf_9'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_9" value="<?php echo ($this->input->post('btl_rk_9') ? $this->input->post('btl_rk_9') : $pd['btl_rk_9']); ?>" class="form-control integer" id="btl_rk_9"/>
	                        <?php echo form_error('btl_rk_9'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>                        

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Oktober</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_10" value="<?php echo ($this->input->post('btl_rf_10') ? $this->input->post('btl_rf_10') : $pd['btl_rf_10']); ?>" class="form-control floating" id="btl_rf_10"/>
	                        <?php echo form_error('btl_rf_10'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_10" value="<?php echo ($this->input->post('btl_rk_10') ? $this->input->post('btl_rk_10') : $pd['btl_rk_10']); ?>" class="form-control integer" id="btl_rk_10"/>
	                        <?php echo form_error('btl_rk_10'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

         	<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> November</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_11" value="<?php echo ($this->input->post('btl_rf_11') ? $this->input->post('btl_rf_11') : $pd['btl_rf_11']); ?>" class="form-control floating" id="btl_rf_11"/>
	                        <?php echo form_error('btl_rf_11'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_11" value="<?php echo ($this->input->post('btl_rk_11') ? $this->input->post('btl_rk_11') : $pd['btl_rk_11']); ?>" class="form-control integer" id="btl_rk_11"/>
	                        <?php echo form_error('btl_rk_11'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>

            <div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Desember</h4>
	               </div>
	               <div class='panel-body'>
	                  <div class="form-group">
	                     <label class="col-md-6 control-label">Realisasi Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rf_12" value="<?php echo ($this->input->post('btl_rf_12') ? $this->input->post('btl_rf_12') : $pd['btl_rf_12']); ?>" class="form-control floating" id="btl_rf_12"/>
	                        <?php echo form_error('btl_rf_12'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Realisasi Keuangan (Rp.):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="btl_rk_12" value="<?php echo ($this->input->post('btl_rk_12') ? $this->input->post('btl_rk_12') : $pd['btl_rk_12']); ?>" class="form-control integer" id="btl_rk_12"/>
	                        <?php echo form_error('btl_rk_12'); ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
            </div>
                                                                                  
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
		      <div class="form-group">
		        <div class="col-md-12">
		             <button type="button" class="btn btn-default pull-left">
		            <a href="<?php echo base_url('realisasibtl/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
		            </button>
		            <button type="submit" class="btn btn-success pull-right">
		            <i class="fa fa-check"></i> Simpan
		            </button>
		        </div>
		      </div>      
		 </div>   
      </div>
      <!-- /.box -->

      <?php echo form_close(); ?>
   </div>
</div>