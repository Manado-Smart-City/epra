<div class="row">
  <div class="col-md-12">
    <div class="box">

        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Program</a>
            </div>
        </div>
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cubes"></i> Sub Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('kegiatan/index/'.$program['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Sub Kegiatan</a>
            </div>
        </div><br>


        <div class='box-header with-border'>
            <h4 class="box-title">Tampil Belanja Swakelola</h4>
            <div class="box-tools">
                <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Belanja</a>
            </div>            
        </div><!-- /.box-header -->
        <div class='box-body'>

        <?php require_once(APPPATH."views/belanja/shared_view_swakelola.php"); ?>  

        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-default">
          <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
        </button>
      </div>
      <div class="col-md-2">
        <input type="hidden" name="kode_giat" value="<?php echo $belanja['kode_giat']; ?>">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> Simpan
        </button>
       </div>
    </div>
        <?php echo form_close(); ?>
    </div>
    <br><br>

</div>
