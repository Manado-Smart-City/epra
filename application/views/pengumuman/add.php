<div class="row">
   <div class="col-md-12">
      <?php echo form_open_multipart('pengumuman/add/',array("class"=>"form-horizontal")); ?>
      <div class="box">
         <div class='box-header with-border'>
            <h4 class="box-title">Tambah Pengumuman</h4>
         </div>
         <!-- /.box-header -->
         <div class='box-body'> 

                     <div class="form-group">
                        <label for="judul" class="col-md-2 control-label">Judul Pengumuman</label>
                        <div class="col-md-10">
                           <input type="text" name="judul" value="<?php echo $this->input->post('judul'); ?>" class="form-control" id="judul" placeholder="" />
                           <?php echo form_error('judul'); ?>
                        </div>
                     </div> 
        

                     <div class="form-group">
                        <label for="isi" class="col-md-2 control-label">Isi Pengumuman</label>
                        <div class="col-md-10">
                           <textarea name="isi" class="textarea" placeholder="Ketik teks disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            </textarea>
                           <?php echo form_error('isi'); ?>
                        </div>
                     </div> 
        

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="form-group">
         <div class="col-md-8"></div>
         <div class="col-md-2">
            <button type="button" class="btn btn-default">
            <a href="<?php echo site_url('pengumuman/index/');?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
            </button>
         </div>
         <div class="col-md-2">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
         </div>
      </div>
      <?php echo form_close(); ?>
   </div>
</div>
