<div class="row">
    <div class="col-md-12">
        <div class="box" style="height: 100%;">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $pengumuman['judul']; ?></h3>
                </div>
            <div class="box-body">
                <div class="col-md-12">
            	   <img src="<?php echo site_url('resources/img/banner-epra.png'); ?>" width="100%">
                   <br><br>
                   <marquee behavior="scroll" direction="left" style="color: red;"><?php echo $running_text; ?> </marquee>
                   <br><br>
                </div>
                <div class="col-md-12">

                  <?php echo $pengumuman['isi']; ?>

                </div>  
            </div><!-- /.box-body -->

        </div>
    </div>
</div>