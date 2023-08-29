<div class="row">
   <div class="col-md-12">
      <?php echo form_open_multipart('config/index/'.$config['id_config'],array("class"=>"form-horizontal")); ?>
      <div class="box">
         <div class='box-header with-border'>
            <h4 class="box-title">Edit Konfigurasi Aplikasi</h4>
         </div>
         <!-- /.box-header -->
         <div class='box-body'> 

                     <div class="form-group">
                        <label for="ukuran_file_upload" class="col-md-3 control-label">Ukuran File Upload (KB)</label>
                        <div class="col-md-2">
                           <input type="text" name="ukuran_file_upload" value="<?php echo ($this->input->post('ukuran_file_upload') ? $this->input->post('ukuran_file_upload') : $config['ukuran_file_upload']); ?>" class="form-control" id="ukuran_file_upload" placeholder="Dalam Kilobytes" />
                           <?php echo form_error('ukuran_file_upload'); ?>
                        </div>
                     </div> 
        
                     <div class="form-group">
                        <label for="running_text" class="col-md-3 control-label">Running Text</label>
                        <div class="col-md-9">
                           <input type="text" name="running_text" value="<?php echo ($this->input->post('running_text') ? $this->input->post('running_text') : $config['running_text']); ?>" class="form-control" id="running_text" placeholder="" />
                           <?php echo form_error('running_text'); ?>
                        </div>
                     </div> 

                     <div class="form-group">
                        <label for="tahun_anggaran" class="col-md-3 control-label">Tahun Anggaran</label>
                        <div class="col-md-2">
                           <input type="text" name="tahun_anggaran" value="<?php echo ($this->input->post('tahun_anggaran') ? $this->input->post('tahun_anggaran') : $config['tahun_anggaran']); ?>" class="form-control" id="tahun_anggaran" placeholder="" />
                           <?php echo form_error('tahun_anggaran'); ?>
                        </div>
                     </div> 

                    <div class="form-group">
                      <label for="bulan_ini" class="col-md-3 control-label">Bulan Anggaran</label>
                      <div class="col-md-2">
                        <?php 
                            $pilihan_bulan_ini = array(
                                                         '' => 'Pilihan bulan anggaran...', 
                                                         '1' => 'Januari', 
                                                         '2' => 'Februari', 
                                                         '3' => 'Maret', 
                                                         '4' => 'April', 
                                                         '5' => 'Mei', 
                                                         '6' => 'Juni', 
                                                         '7' => 'Juli', 
                                                         '8' => 'Agustus', 
                                                         '9' => 'September', 
                                                         '10' => 'Oktober', 
                                                         '11' => 'November',
                                                         '12' => 'Desember', );
                            echo form_dropdown('bulan_ini', $pilihan_bulan_ini,($this->input->post('bulan_ini') ? $this->input->post('bulan_ini') : $config['bulan_ini']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>                     
        

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="form-group">
         <div class="col-md-10"></div>
         <div class="col-md-2">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
         </div>
      </div>
      <?php echo form_close(); ?>
   </div>
</div>
