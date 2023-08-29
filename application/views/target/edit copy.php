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
      <?php echo form_open_multipart('target/edit/',array("class"=>"form-horizontal")); ?>
      <div class="box">
         <div class='box-header with-border'>
            <h4 class="box-title">Edit Target Belanja Langsung</h4>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_1" value="<?php echo ($this->input->post('tf_1') ? $this->input->post('tf_1') : $pd['tf_1']); ?>" class="form-control floating" id="tf_1"/>
	                        <?php echo form_error('tf_1'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_1" value="<?php echo ($this->input->post('tk_1') ? $this->input->post('tk_1') : $pd['tk_1']); ?>" class="form-control floating" id="tk_1"/>
	                        <?php echo form_error('tk_1'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_2" value="<?php echo ($this->input->post('tf_2') ? $this->input->post('tf_2') : $pd['tf_2']); ?>" class="form-control floating" id="tf_2"/>
	                        <?php echo form_error('tf_2'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_2" value="<?php echo ($this->input->post('tk_2') ? $this->input->post('tk_2') : $pd['tk_2']); ?>" class="form-control floating" id="tk_2"/>
	                        <?php echo form_error('tk_2'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_3" value="<?php echo ($this->input->post('tf_3') ? $this->input->post('tf_3') : $pd['tf_3']); ?>" class="form-control floating" id="tf_3"/>
	                        <?php echo form_error('tf_3'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_3" value="<?php echo ($this->input->post('tk_3') ? $this->input->post('tk_3') : $pd['tk_3']); ?>" class="form-control floating" id="tk_3"/>
	                        <?php echo form_error('tk_3'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_4" value="<?php echo ($this->input->post('tf_4') ? $this->input->post('tf_4') : $pd['tf_4']); ?>" class="form-control floating" id="tf_4"/>
	                        <?php echo form_error('tf_4'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_4" value="<?php echo ($this->input->post('tk_4') ? $this->input->post('tk_4') : $pd['tk_4']); ?>" class="form-control floating" id="tk_4"/>
	                        <?php echo form_error('tk_4'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_5" value="<?php echo ($this->input->post('tf_5') ? $this->input->post('tf_5') : $pd['tf_5']); ?>" class="form-control floating" id="tf_5"/>
	                        <?php echo form_error('tf_5'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_5" value="<?php echo ($this->input->post('tk_5') ? $this->input->post('tk_5') : $pd['tk_5']); ?>" class="form-control floating" id="tk_5"/>
	                        <?php echo form_error('tk_5'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_6" value="<?php echo ($this->input->post('tf_6') ? $this->input->post('tf_6') : $pd['tf_6']); ?>" class="form-control floating" id="tf_6"/>
	                        <?php echo form_error('tf_6'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_6" value="<?php echo ($this->input->post('tk_6') ? $this->input->post('tk_6') : $pd['tk_6']); ?>" class="form-control floating" id="tk_6"/>
	                        <?php echo form_error('tk_6'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_7" value="<?php echo ($this->input->post('tf_7') ? $this->input->post('tf_7') : $pd['tf_7']); ?>" class="form-control floating" id="tf_7"/>
	                        <?php echo form_error('tf_7'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_7" value="<?php echo ($this->input->post('tk_7') ? $this->input->post('tk_7') : $pd['tk_7']); ?>" class="form-control floating" id="tk_7"/>
	                        <?php echo form_error('tk_7'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_8" value="<?php echo ($this->input->post('tf_8') ? $this->input->post('tf_8') : $pd['tf_8']); ?>" class="form-control floating" id="tf_8"/>
	                        <?php echo form_error('tf_8'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_8" value="<?php echo ($this->input->post('tk_8') ? $this->input->post('tk_8') : $pd['tk_8']); ?>" class="form-control floating" id="tk_8"/>
	                        <?php echo form_error('tk_8'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_9" value="<?php echo ($this->input->post('tf_9') ? $this->input->post('tf_9') : $pd['tf_9']); ?>" class="form-control floating" id="tf_9"/>
	                        <?php echo form_error('tf_9'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_9" value="<?php echo ($this->input->post('tk_9') ? $this->input->post('tk_9') : $pd['tk_9']); ?>" class="form-control floating" id="tk_9"/>
	                        <?php echo form_error('tk_9'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_10" value="<?php echo ($this->input->post('tf_10') ? $this->input->post('tf_10') : $pd['tf_10']); ?>" class="form-control floating" id="tf_10"/>
	                        <?php echo form_error('tf_10'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_10" value="<?php echo ($this->input->post('tk_10') ? $this->input->post('tk_10') : $pd['tk_10']); ?>" class="form-control floating" id="tk_10"/>
	                        <?php echo form_error('tk_10'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_11" value="<?php echo ($this->input->post('tf_11') ? $this->input->post('tf_11') : $pd['tf_11']); ?>" class="form-control floating" id="tf_11"/>
	                        <?php echo form_error('tf_11'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_11" value="<?php echo ($this->input->post('tk_11') ? $this->input->post('tk_11') : $pd['tk_11']); ?>" class="form-control floating" id="tk_11"/>
	                        <?php echo form_error('tk_11'); ?>
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
	                     <label class="col-md-6 control-label">Target Fisik (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tf_12" value="<?php echo ($this->input->post('tf_12') ? $this->input->post('tf_12') : $pd['tf_12']); ?>" class="form-control floating" id="tf_12"/>
	                        <?php echo form_error('tf_12'); ?>
	                     </div>	                     
	                     <label class="col-md-6 control-label">Target Keuangan (%):</label>
	                     <div class="col-md-6">
	                        <input type="text" name="tk_12" value="<?php echo ($this->input->post('tk_12') ? $this->input->post('tk_12') : $pd['tk_12']); ?>" class="form-control floating" id="tk_12"/>
	                        <?php echo form_error('tk_12'); ?>
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
		            <a href="<?php echo base_url('target/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
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
<script>
function hitungPersen() {
    var x = document.getElementById("tk_1");
    var y = document.getElementById("persen_tk_1");
    y.value = (x.value / 120000000)*100;
}
</script>