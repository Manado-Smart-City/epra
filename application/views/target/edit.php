<div class="row">
   <div class="col-md-12">
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
            <h4 class="box-title">Edit Target Belanja Daerah</h4>
         </div>
         <!-- /.box-header -->
         <div class='box-body'>

			<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-calendar"></i> Target Realisasi Fisik</h4>
	               </div>
	               <div class='panel-body'>				

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Januari</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_1" value="<?php echo ($this->input->post('tf_1') ? $this->input->post('tf_1') : $pd['tf_1']); ?>%" class="form-control floating" id="tf_1" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_1'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_1" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_1') ? $this->input->post('tf_1') : $pd['tf_1']); ?>%;"></div>
				      </div>	

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Februari</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_2" value="<?php echo ($this->input->post('tf_2') ? $this->input->post('tf_2') : $pd['tf_2']); ?>%" class="form-control floating" id="tf_2" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_2'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_2" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_2') ? $this->input->post('tf_2') : $pd['tf_2']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Maret</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_3" value="<?php echo ($this->input->post('tf_3') ? $this->input->post('tf_3') : $pd['tf_3']); ?>%" class="form-control floating" id="tf_3" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_3'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_3" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_3') ? $this->input->post('tf_3') : $pd['tf_3']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">April</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_4" value="<?php echo ($this->input->post('tf_4') ? $this->input->post('tf_4') : $pd['tf_4']); ?>%" class="form-control floating" id="tf_4" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_4'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_4" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_4') ? $this->input->post('tf_4') : $pd['tf_4']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Mei</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_5" value="<?php echo ($this->input->post('tf_5') ? $this->input->post('tf_5') : $pd['tf_5']); ?>%" class="form-control floating" id="tf_5" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_5'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_5" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_5') ? $this->input->post('tf_5') : $pd['tf_5']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Juni</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_6" value="<?php echo ($this->input->post('tf_6') ? $this->input->post('tf_6') : $pd['tf_6']); ?>%" class="form-control floating" id="tf_6" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_6'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_6" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_6') ? $this->input->post('tf_6') : $pd['tf_6']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Juli</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_7" value="<?php echo ($this->input->post('tf_7') ? $this->input->post('tf_7') : $pd['tf_7']); ?>%" class="form-control floating" id="tf_7" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_7'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_7" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_7') ? $this->input->post('tf_7') : $pd['tf_7']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Agustus</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_8" value="<?php echo ($this->input->post('tf_8') ? $this->input->post('tf_8') : $pd['tf_8']); ?>%" class="form-control floating" id="tf_8" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_8'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_8" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_8') ? $this->input->post('tf_8') : $pd['tf_8']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">September</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_9" value="<?php echo ($this->input->post('tf_9') ? $this->input->post('tf_9') : $pd['tf_9']); ?>%" class="form-control floating" id="tf_9" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_9'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_9" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_9') ? $this->input->post('tf_9') : $pd['tf_9']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Oktober</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_10" value="<?php echo ($this->input->post('tf_10') ? $this->input->post('tf_10') : $pd['tf_10']); ?>%" class="form-control floating" id="tf_10" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_10'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_10" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_10') ? $this->input->post('tf_10') : $pd['tf_10']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">November</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_11" value="<?php echo ($this->input->post('tf_11') ? $this->input->post('tf_11') : $pd['tf_11']); ?>%" class="form-control floating" id="tf_11" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_11'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_11" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_11') ? $this->input->post('tf_11') : $pd['tf_11']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Desember</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tf_12" value="<?php echo ($this->input->post('tf_12') ? $this->input->post('tf_12') : $pd['tf_12']); ?>%" class="form-control floating" id="tf_12" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tf_12'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbf_12" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tf_12') ? $this->input->post('tf_12') : $pd['tf_12']); ?>%;"></div>
				      </div>

				    </div>  
				</div>     		      		      
			</div>


			<div class="col-md-6">
	            <div class="panel panel-default">
	               <div class="panel-heading">
	                  <h4><i class="fa fa-money"></i> Target Realisasi Keuangan</h4>
	               </div>
	               <div class='panel-body'>						

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Januari</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_1" value="<?php echo ($this->input->post('tk_1') ? $this->input->post('tk_1') : $pd['tk_1']); ?>%" class="form-control floating" id="tk_1" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_1'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_1" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_1') ? $this->input->post('tk_1') : $pd['tk_1']); ?>%;"></div>
				      </div>	

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Februari</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_2" value="<?php echo ($this->input->post('tk_2') ? $this->input->post('tk_2') : $pd['tk_2']); ?>%" class="form-control floating" id="tk_2" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_2'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_2" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_2') ? $this->input->post('tk_2') : $pd['tk_2']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Maret</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_3" value="<?php echo ($this->input->post('tk_3') ? $this->input->post('tk_3') : $pd['tk_3']); ?>%" class="form-control floating" id="tk_3" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_3'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_3" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_3') ? $this->input->post('tk_3') : $pd['tk_3']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">April</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_4" value="<?php echo ($this->input->post('tk_4') ? $this->input->post('tk_4') : $pd['tk_4']); ?>%" class="form-control floating" id="tk_4" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_4'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_4" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_4') ? $this->input->post('tk_4') : $pd['tk_4']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Mei</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_5" value="<?php echo ($this->input->post('tk_5') ? $this->input->post('tk_5') : $pd['tk_5']); ?>%" class="form-control floating" id="tk_5" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_5'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_5" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_5') ? $this->input->post('tk_5') : $pd['tk_5']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Juni</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_6" value="<?php echo ($this->input->post('tk_6') ? $this->input->post('tk_6') : $pd['tk_6']); ?>%" class="form-control floating" id="tk_6" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_6'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_6" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_6') ? $this->input->post('tk_6') : $pd['tk_6']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Juli</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_7" value="<?php echo ($this->input->post('tk_7') ? $this->input->post('tk_7') : $pd['tk_7']); ?>%" class="form-control floating" id="tk_7" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_7'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_7" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_7') ? $this->input->post('tk_7') : $pd['tk_7']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Agustus</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_8" value="<?php echo ($this->input->post('tk_8') ? $this->input->post('tk_8') : $pd['tk_8']); ?>%" class="form-control floating" id="tk_8" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_8'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_8" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_8') ? $this->input->post('tk_8') : $pd['tk_8']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">September</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_9" value="<?php echo ($this->input->post('tk_9') ? $this->input->post('tk_9') : $pd['tk_9']); ?>%" class="form-control floating" id="tk_9" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_9'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_9" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_9') ? $this->input->post('tk_9') : $pd['tk_9']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Oktober</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_10" value="<?php echo ($this->input->post('tk_10') ? $this->input->post('tk_10') : $pd['tk_10']); ?>%" class="form-control floating" id="tk_10" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_10'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_10" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_10') ? $this->input->post('tk_10') : $pd['tk_10']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">November</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_11" value="<?php echo ($this->input->post('tk_11') ? $this->input->post('tk_11') : $pd['tk_11']); ?>%" class="form-control floating" id="tk_11" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_11'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_11" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_11') ? $this->input->post('tk_11') : $pd['tk_11']); ?>%;"></div>
				      </div>

		      		  <!-- Progress bars -->
				      <div class="clearfix">
				        <span class="pull-left" style="font-size: 20px;">Desember</span>
				        <small class="pull-right">
				        	<div class="input-group">
				        		<input type="text" name="tk_12" value="<?php echo ($this->input->post('tk_12') ? $this->input->post('tk_12') : $pd['tk_12']); ?>%" class="form-control floating" id="tk_12" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
				        		<span class="input-group-addon">%</span>
				        	</div>
				        	<?php echo form_error('tk_12'); ?>
				      </div>
				      <div class="progress xs" style="margin-top: 10px;">
				        <div id="pbk_12" class="progress-bar progress-bar-green" style="width: <?php echo ($this->input->post('tk_12') ? $this->input->post('tk_12') : $pd['tk_12']); ?>%;"></div>
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
function updateProgressBar(z) {
    var x = document.getElementById(z).value;
    if (x > 100){
    	x = 100;
    	document.getElementById(z).value = 100;
    } 
    // update progress bar
    var y = x.concat("%");
    switch (z) {
    	// fisik
    	case "tf_1": document.getElementById("pbf_1").style.width = y; nomor=1 ; break;
    	case "tf_2": document.getElementById("pbf_2").style.width = y; nomor=2 ; break;
    	case "tf_3": document.getElementById("pbf_3").style.width = y; nomor=3 ; break;
    	case "tf_4": document.getElementById("pbf_4").style.width = y; nomor=4 ; break;
    	case "tf_5": document.getElementById("pbf_5").style.width = y; nomor=5 ; break;
    	case "tf_6": document.getElementById("pbf_6").style.width = y; nomor=6 ; break;
    	case "tf_7": document.getElementById("pbf_7").style.width = y; nomor=7 ; break;
    	case "tf_8": document.getElementById("pbf_8").style.width = y; nomor=8 ; break;
    	case "tf_9": document.getElementById("pbf_9").style.width = y; nomor=9 ; break;
    	case "tf_10": document.getElementById("pbf_10").style.width = y; nomor=10; break;
    	case "tf_11": document.getElementById("pbf_11").style.width = y; nomor=11; break;
    	case "tf_12": document.getElementById("pbf_12").style.width = y; nomor=12; break;
    	// keuangan
    	case "tk_1": document.getElementById("pbk_1").style.width = y; nomor=1 ; break;
    	case "tk_2": document.getElementById("pbk_2").style.width = y; nomor=2 ; break;
    	case "tk_3": document.getElementById("pbk_3").style.width = y; nomor=3 ; break;
    	case "tk_4": document.getElementById("pbk_4").style.width = y; nomor=4 ; break;
    	case "tk_5": document.getElementById("pbk_5").style.width = y; nomor=5 ; break;
    	case "tk_6": document.getElementById("pbk_6").style.width = y; nomor=6 ; break;
    	case "tk_7": document.getElementById("pbk_7").style.width = y; nomor=7 ; break;
    	case "tk_8": document.getElementById("pbk_8").style.width = y; nomor=8 ; break;
    	case "tk_9": document.getElementById("pbk_9").style.width = y; nomor=9 ; break;
    	case "tk_10": document.getElementById("pbk_10").style.width = y; nomor=10; break;
    	case "tk_11": document.getElementById("pbk_11").style.width = y; nomor=11; break;
    	case "tk_12": document.getElementById("pbk_12").style.width = y; nomor=12; break;    	
    }
 //    // update isian yang dibawahnya
 //    for (i = nomor+1; i < 13; i++) { 
 //    	if (document.getElementById("tf_".concat(i)).value < document.getElementById("tf_".concat(i-1)).value) {
 //    		document.getElementById("tf_".concat(i)).value = document.getElementById("tf_".concat(i-1)).value;
 //    		document.getElementById("pbf_".concat(i)).style.width = document.getElementById("tf_".concat(i-1)).value.concat("%");
 //    	}
	// }
}
</script>
