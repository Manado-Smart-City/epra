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

    <?php echo form_open_multipart('belanja/edit_swakelola/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>
    <div class="box">

        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo base_url('program/index');?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Program</a>
            </div>
        </div>
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cubes"></i> Sub Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo base_url('kegiatan/index/'.$kegiatan['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Sub Kegiatan</a>
            </div>
        </div><br>



        <div class='box-header with-border'>
            <h4 class="box-title">Edit Kegiatan Swakelola</h4>
            <div class="box-tools">
                <a href="<?php echo base_url('belanja/index/'.$belanja['kode_giat']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Belanja</a>
            </div>             
        </div><!-- /.box-header -->
        <div class='box-body'>

            <div class="form-group">
                 <label for="kode_rek_belanja" class="col-md-2 control-label">Kode Rekening Belanja</label>
                 <div class="col-md-4">
                     <input type="text" name="kode_rek_belanja" value="<?php echo ($this->input->post('kode_rek_belanja') ? $this->input->post('kode_rek_belanja') : $belanja['kode_rek_belanja']); ?>" class="form-control" id="kode_rek_belanja" placeholder="" readonly/>
                     <?php echo form_error('kode_rek_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_belanja" class="col-md-2 control-label">Nama Belanja</label>
                 <div class="col-md-10">
                     <input type="text" name="nama_belanja" value="<?php echo ($this->input->post('nama_belanja') ? $this->input->post('nama_belanja') : $belanja['nama_belanja']); ?>" class="form-control" id="nama_belanja" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_giat_swa" class="col-md-2 control-label">Nama Sub Kegiatan Swakelola</label>
                 <div class="col-md-10">
                     <input type="text" name="nama_giat_swa" value="<?php echo ($this->input->post('nama_giat_swa') ? $this->input->post('nama_giat_swa') : $belanja['nama_giat_swa']); ?>" class="form-control" id="nama_giat_swa" placeholder="Wajib diisi"/>
                     <?php echo form_error('nama_giat_swa'); ?>
                 </div>
            </div>

            <div class="nav-tabs-custom">

               <ul class="nav nav-tabs">                  
                  <li <?php echo (isset($tab_menu) && $tab_menu == "umum" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_1" data-toggle="tab">Data Umum</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "realisasi" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_2" data-toggle="tab">Realisasi</a></li>
               </ul>

               <div class="tab-content">
                  <div <?php echo (isset($tab_menu) && $tab_menu == "umum" ? 'class="tab-pane active"' : 'class="tab-pane" '); ?>" id="tab_1">
                    <br>  

<!-- --------------------- -->

                    <div class="form-group">
                      <label class="col-md-2 control-label">Pagu bulan</label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Januari
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_1" value="<?php echo ($this->input->post('pagu_giat_1') ? $this->input->post('pagu_giat_1') : $belanja['pagu_giat_1']); ?>" class="form-control integer" id="1" onkeyup="isiPaguSisa(this.value,this.id);" 
                            <?php if ($bulan_ini != 1) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_1']; ?>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Februari
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_2" value="<?php echo ($this->input->post('pagu_giat_2') ? $this->input->post('pagu_giat_2') : $belanja['pagu_giat_2']); ?>" class="form-control integer" id="2" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 2) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_2']; ?>
                        </div>
                      </div>
                    </div>                  

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Maret
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_3" value="<?php echo ($this->input->post('pagu_giat_3') ? $this->input->post('pagu_giat_3') : $belanja['pagu_giat_3']); ?>" class="form-control integer" id="3" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 3) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_3']; ?>
                        </div>
                      </div>
                    </div>  

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          April
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_4" value="<?php echo ($this->input->post('pagu_giat_4') ? $this->input->post('pagu_giat_4') : $belanja['pagu_giat_4']); ?>" class="form-control integer" id="4" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 4) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_4']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Mei
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_5" value="<?php echo ($this->input->post('pagu_giat_5') ? $this->input->post('pagu_giat_5') : $belanja['pagu_giat_5']); ?>" class="form-control integer" id="5" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 5) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_5']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Juni
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_6" value="<?php echo ($this->input->post('pagu_giat_6') ? $this->input->post('pagu_giat_6') : $belanja['pagu_giat_6']); ?>" class="form-control integer" id="6" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 6) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_6']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Juli
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_7" value="<?php echo ($this->input->post('pagu_giat_7') ? $this->input->post('pagu_giat_7') : $belanja['pagu_giat_7']); ?>" class="form-control integer" id="7" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 7) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 7px;">
                           <?php echo $pd['keterangan_pagu_7']; ?>
                        </div>
                      </div>
                    </div>                     

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Agustus
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_8" value="<?php echo ($this->input->post('pagu_giat_8') ? $this->input->post('pagu_giat_8') : $belanja['pagu_giat_8']); ?>" class="form-control integer" id="8" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 8) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 8px;">
                           <?php echo $pd['keterangan_pagu_8']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          September
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_9" value="<?php echo ($this->input->post('pagu_giat_9') ? $this->input->post('pagu_giat_9') : $belanja['pagu_giat_9']); ?>" class="form-control integer" id="9" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 9) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 9px;">
                           <?php echo $pd['keterangan_pagu_9']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Oktober
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_10" value="<?php echo ($this->input->post('pagu_giat_10') ? $this->input->post('pagu_giat_10') : $belanja['pagu_giat_10']); ?>" class="form-control integer" id="10" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 10) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 10px;">
                           <?php echo $pd['keterangan_pagu_10']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          November
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_11" value="<?php echo ($this->input->post('pagu_giat_11') ? $this->input->post('pagu_giat_11') : $belanja['pagu_giat_11']); ?>" class="form-control integer" id="11" onkeyup="isiPaguSisa(this.value,this.id);"
                            <?php if ($bulan_ini != 11) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 11px;">
                           <?php echo $pd['keterangan_pagu_11']; ?>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-10">
                        <div class="col-md-2" style="text-align: left; padding-top: 7px;">
                          Desember
                        </div>  
                        <div class="col-md-3">   
                          <div class="input-group">
                            <span class="input-group-addon">Rp.</span>             
                            <input type="text" name="pagu_giat_12" value="<?php echo ($this->input->post('pagu_giat_12') ? $this->input->post('pagu_giat_12') : $belanja['pagu_giat_12']); ?> " class="form-control integer" id="12" onkeyup="isiPaguSisa(this.value,this.id);" 
                            <?php if ($bulan_ini != 12) { /*echo "readonly"; */} ?> />
                          </div>
                        </div>
                        <div class="col-md-7" style="text-align: left; padding-top: 12px;">
                           <?php echo $pd['keterangan_pagu_12']; ?>
                        </div>
                      </div>
                    </div> 

<!-- --------------------- -->

                    <div class="form-group">
                      <label for="bulan_pelaksanaan_mulai" class="col-md-2 control-label">Bulan Pelaksanaan</label>
                      <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon" style="border: 0;">Mulai bulan: </span>                   
                        <?php 
                            $pilihan_bulan = array
                                              (0 => 'Pilihan bulan...',
                                               1 => 'Januari', 
                                               2 => 'Februari',  
                                               3 => 'Maret', 
                                               4 => 'April', 
                                               5 => 'Mei', 
                                               6 => 'Juni', 
                                               7 => 'Juli', 
                                               8 => 'Agustus', 
                                               9 => 'September', 
                                               10 => 'Oktober', 
                                               11 => 'November', 
                                               12 => 'Desember', 
                                              );
                            echo form_dropdown('bulan_pelaksanaan_mulai', $pilihan_bulan,($this->input->post('bulan_pelaksanaan_mulai') ? $this->input->post('bulan_pelaksanaan_mulai') : $belanja['bulan_pelaksanaan_mulai']),'class="form-control"'); 
                        ?>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon" style="border: 0;">sampai bulan: </span>                   
                        <?php 
                            echo form_dropdown('bulan_pelaksanaan_selesai', $pilihan_bulan,($this->input->post('bulan_pelaksanaan_selesai') ? $this->input->post('bulan_pelaksanaan_selesai') : $belanja['bulan_pelaksanaan_selesai']),'class="form-control"'); 
                        ?>
                        </div>
                      </div>                      
                    </div>                     

                    <div class="form-group">
                         <label for="lokasi_giat" class="col-md-2 control-label">Lokasi</label>
                         <div class="col-md-10">
                             <input type="text" name="lokasi_giat" value="<?php echo ($this->input->post('lokasi_giat') ? $this->input->post('lokasi_giat') : $belanja['lokasi_giat']); ?>" class="form-control" id="lokasi_giat" placeholder="" />
                             <?php echo form_error('lokasi_giat'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="lokasi_spesifik" class="col-md-2 control-label">Lokasi Spesifik</label>
                         <div class="col-md-10">
                             <input type="text" name="lokasi_spesifik" value="<?php echo ($this->input->post('lokasi_spesifik') ? $this->input->post('lokasi_spesifik') : $belanja['lokasi_spesifik']); ?>" class="form-control" id="lokasi_spesifik" placeholder="" />
                             <?php echo form_error('lokasi_spesifik'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label class="col-md-2 control-label">Koordinat Lokasi</label>
                         <div class="col-md-4">
                            <div class="input-group">
                              <span class="input-group-addon" style="border: 0;">Lintang (latitude): </span>
                              <input type="text" name="lokasi_lintang" value="<?php echo ($this->input->post('lokasi_lintang') ? $this->input->post('lokasi_lintang') : $belanja['lokasi_lintang']); ?>" class="form-control" id="lokasi_lintang" placeholder="" />                              
                              <?php echo form_error('lokasi_lintang'); ?>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="input-group">
                              <span class="input-group-addon" style="border: 0;">Bujur (longitude): </span>
                              <input type="text" name="lokasi_bujur" value="<?php echo ($this->input->post('lokasi_bujur') ? $this->input->post('lokasi_bujur') : $belanja['lokasi_bujur']); ?>" class="form-control" id="lokasi_bujur" placeholder="" />                              
                              <?php echo form_error('lokasi_bujur'); ?>
                            </div>
                         </div>                         
                    </div>                    

                    <div class="form-group">
                      <label for="jenis_belanja" class="col-md-2 control-label">Jenis Belanja</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_jenis_belanja = array('' => 'Pilihan jenis belanja...', 
                                                         'Belanja Barang/Jasa' => 'Belanja Barang/Jasa', 
                                                         'Belanja Pegawai' => 'Belanja Pegawai', 
                                                         'Belanja Modal' => 'Belanja Modal', );
                            echo form_dropdown('jenis_belanja', $pilihan_jenis_belanja,($this->input->post('jenis_belanja') ? $this->input->post('jenis_belanja') : $belanja['jenis_belanja']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>           

                    <div class="form-group">
                         <label for="volume_belanja" class="col-md-2 control-label">Volume Belanja</label>
                         <div class="col-md-3">
                             <input type="text" name="volume_belanja" value="<?php echo ($this->input->post('volume_belanja') ? $this->input->post('volume_belanja') : $belanja['volume_belanja']); ?>" class="form-control" id="volume_belanja" placeholder="" />
                             <?php echo form_error('volume_belanja'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="deskripsi_belanja" class="col-md-2 control-label">Deskripsi Belanja</label>
                         <div class="col-md-10">
                             <input type="text" name="deskripsi_belanja" value="<?php echo ($this->input->post('deskripsi_belanja') ? $this->input->post('deskripsi_belanja') : $belanja['deskripsi_belanja']); ?>" class="form-control" id="deskripsi_belanja" placeholder="" />
                             <?php echo form_error('deskripsi_belanja'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                      <label for="file_dokumen_kak" class="col-md-2 control-label">Dokumen KAK/TOR</label>
                      <div class="col-md-5">                
                        <input type="file" name="file_dokumen_kak" value="<?php echo ($this->input->post('file_dokumen_kak') ? $this->input->post('file_dokumen_kak') : $belanja['file_dokumen_kak']); ?>" class="form-control" id="file_dokumen_kak" />                
                        <p class="help-block">File dokumen harus dalam format DOC atau PDF</p> 
                        <?php
                          if(!$belanja['file_dokumen_kak']=='') {
                            echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/swakelola/'.$belanja['file_dokumen_kak']).'" class="view-pdf">'.$belanja['file_dokumen_kak'].'</a>'; 
                          }                              
                        ?>  
                      </div>
                    </div>            

                    <div class="form-group">
                      <label for="usulan_dari" class="col-md-2 control-label">Usulan Kegiatan dari</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_usulan_dari = array('' => 'Pilihan usulan kegiatan dari...',
                                                         'Musrenbang' => 'Musrenbang', 
                                                         'DPRD' => 'DPRD', 
                                                         'Provinsi' => 'Provinsi', 
                                                         'Pemkot' => 'Pemkot', 
                                                         'PD ybs' => 'PD ybs', 
                                                         'Lain-lain' => 'Lain-lain', );
                            echo form_dropdown('usulan_dari', $pilihan_usulan_dari,($this->input->post('usulan_dari') ? $this->input->post('usulan_dari') : $belanja['usulan_dari']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>
                  </div> <!-- /.tab-pane -->  

                  <div <?php echo (isset($tab_menu) && $tab_menu == "realisasi" ? 'class="tab-pane active"' : 'class="tab-pane" '); ?>" id="tab_2">
                    <br>  

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                          <tr>                          
                            <th width="150px">Bulan</th>
                            <th width="320px">Realisasi</th>
                            <th>Foto</th>
                          </tr>                       



                          <tr>

                            <td align="center"><font size="5"><b>Januari</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_1'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_1" value="<?php echo ($this->input->post('kf_1') ? $this->input->post('kf_1') : $belanja['kf_1']); ?>" class="form-control floating" id="kf_1" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_1" value="<?php echo ($this->input->post('kk_1') ? $this->input->post('kk_1') : $belanja['kk_1']); ?>" class="form-control integer" id="kk_1" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_1']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_1" value="<?php echo ($this->input->post('persen_kk_1') ? $this->input->post('persen_kk_1') : $belanja['persen_kk_1']); ?>" class="form-control" id="persen_kk_1" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_1" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==1) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_1" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>   

                          </tr>




                          <tr>
                            <td align="center"><font size="5"><b>Februari</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_2'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_2" value="<?php echo ($this->input->post('kf_2') ? $this->input->post('kf_2') : $belanja['kf_2']); ?>" class="form-control floating" id="kf_2" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_2" value="<?php echo ($this->input->post('kk_2') ? $this->input->post('kk_2') : $belanja['kk_2']); ?>" class="form-control integer" id="kk_2" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_2']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_2" value="<?php echo ($this->input->post('persen_kk_2') ? $this->input->post('persen_kk_2') : $belanja['persen_kk_2']); ?>" class="form-control" id="persen_kk_2" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_2" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==2) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_2" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>                        

                          <tr>
                            <td align="center"><font size="5"><b>Maret</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_3'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_3" value="<?php echo ($this->input->post('kf_3') ? $this->input->post('kf_3') : $belanja['kf_3']); ?>" class="form-control floating" id="kf_3" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_3" value="<?php echo ($this->input->post('kk_3') ? $this->input->post('kk_3') : $belanja['kk_3']); ?>" class="form-control integer" id="kk_3" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_3']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_3" value="<?php echo ($this->input->post('persen_kk_3') ? $this->input->post('persen_kk_3') : $belanja['persen_kk_3']); ?>" class="form-control" id="persen_kk_3" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_3" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==3) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_3" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>  

                          <tr>
                            <td align="center"><font size="5"><b>April</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_4'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_4" value="<?php echo ($this->input->post('kf_4') ? $this->input->post('kf_4') : $belanja['kf_4']); ?>" class="form-control floating" id="kf_4" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_4" value="<?php echo ($this->input->post('kk_4') ? $this->input->post('kk_4') : $belanja['kk_4']); ?>" class="form-control integer" id="kk_4" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_4']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_4" value="<?php echo ($this->input->post('persen_kk_4') ? $this->input->post('persen_kk_4') : $belanja['persen_kk_4']); ?>" class="form-control" id="persen_kk_4" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_4" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==4) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_4" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>  

                          <tr>
                            <td align="center"><font size="5"><b>Mei</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_5'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_5" value="<?php echo ($this->input->post('kf_5') ? $this->input->post('kf_5') : $belanja['kf_5']); ?>" class="form-control floating" id="kf_5" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_5" value="<?php echo ($this->input->post('kk_5') ? $this->input->post('kk_5') : $belanja['kk_5']); ?>" class="form-control integer" id="kk_5" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_5']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_5" value="<?php echo ($this->input->post('persen_kk_5') ? $this->input->post('persen_kk_5') : $belanja['persen_kk_5']); ?>" class="form-control" id="persen_kk_5" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_5" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==5) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_5" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Juni</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_6'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_6" value="<?php echo ($this->input->post('kf_6') ? $this->input->post('kf_6') : $belanja['kf_6']); ?>" class="form-control floating" id="kf_6" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_6" value="<?php echo ($this->input->post('kk_6') ? $this->input->post('kk_6') : $belanja['kk_6']); ?>" class="form-control integer" id="kk_6" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_6']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_6" value="<?php echo ($this->input->post('persen_kk_6') ? $this->input->post('persen_kk_6') : $belanja['persen_kk_6']); ?>" class="form-control" id="persen_kk_6" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_6" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==6) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_6" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>   

                            <td align="center"><font size="5"><b>Juli</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_7'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_7" value="<?php echo ($this->input->post('kf_7') ? $this->input->post('kf_7') : $belanja['kf_7']); ?>" class="form-control floating" id="kf_7" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_7" value="<?php echo ($this->input->post('kk_7') ? $this->input->post('kk_7') : $belanja['kk_7']); ?>" class="form-control integer" id="kk_7" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_7']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_7" value="<?php echo ($this->input->post('persen_kk_7') ? $this->input->post('persen_kk_7') : $belanja['persen_kk_7']); ?>" class="form-control" id="persen_kk_7" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_7" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==7) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_7" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                            <td align="center"><font size="5"><b>Agustus</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_8'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_8" value="<?php echo ($this->input->post('kf_8') ? $this->input->post('kf_8') : $belanja['kf_8']); ?>" class="form-control floating" id="kf_8" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_8" value="<?php echo ($this->input->post('kk_8') ? $this->input->post('kk_8') : $belanja['kk_8']); ?>" class="form-control integer" id="kk_8" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_8']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_8" value="<?php echo ($this->input->post('persen_kk_8') ? $this->input->post('persen_kk_8') : $belanja['persen_kk_8']); ?>" class="form-control" id="persen_kk_8" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_8" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==8) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_8" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>     

                            <td align="center"><font size="5"><b>September</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_9'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_9" value="<?php echo ($this->input->post('kf_9') ? $this->input->post('kf_9') : $belanja['kf_9']); ?>" class="form-control floating" id="kf_9" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_9" value="<?php echo ($this->input->post('kk_9') ? $this->input->post('kk_9') : $belanja['kk_9']); ?>" class="form-control integer" id="kk_9" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_9']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_9" value="<?php echo ($this->input->post('persen_kk_9') ? $this->input->post('persen_kk_9') : $belanja['persen_kk_9']); ?>" class="form-control" id="persen_kk_9" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_9" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==9) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_9" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Oktober</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_10'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_10" value="<?php echo ($this->input->post('kf_10') ? $this->input->post('kf_10') : $belanja['kf_10']); ?>" class="form-control floating" id="kf_10" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_10" value="<?php echo ($this->input->post('kk_10') ? $this->input->post('kk_10') : $belanja['kk_10']); ?>" class="form-control integer" id="kk_10" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_10']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_10" value="<?php echo ($this->input->post('persen_kk_10') ? $this->input->post('persen_kk_10') : $belanja['persen_kk_10']); ?>" class="form-control" id="persen_kk_10" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_10" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==10) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_10" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>   

                          <tr>
                            <td align="center"><font size="5"><b>November</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_11'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_11" value="<?php echo ($this->input->post('kf_11') ? $this->input->post('kf_11') : $belanja['kf_11']); ?>" class="form-control floating" id="kf_11" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_11" value="<?php echo ($this->input->post('kk_11') ? $this->input->post('kk_11') : $belanja['kk_11']); ?>" class="form-control integer" id="kk_11" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_11']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_11" value="<?php echo ($this->input->post('persen_kk_11') ? $this->input->post('persen_kk_11') : $belanja['persen_kk_11']); ?>" class="form-control" id="persen_kk_11" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_11" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==11) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_11" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>

                          <tr>
                            <td align="center"><font size="5"><b>Desember</b></font><br>
                                <br>Pagu: <br>Rp. <?php echo number_format($belanja['pagu_giat_12'],0); ?>
                            </td>            

                            <td>
                              <div class="col-md-7">
                                Fisik (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kf_12" value="<?php echo ($this->input->post('kf_12') ? $this->input->post('kf_12') : $belanja['kf_12']); ?>" class="form-control floating" id="kf_12" placeholder="%"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Keuangan (Rp):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="kk_12" value="<?php echo ($this->input->post('kk_12') ? $this->input->post('kk_12') : $belanja['kk_12']); ?>" class="form-control integer" id="kk_12" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_12']; ?>)"/>
                              </div>
                              <br><br>
                              <div class="col-md-7">
                                Persen dari pagu (%):
                              </div>
                              <div class="col-md-5" align="left">
                                  <input type="text" name="persen_kk_12" value="<?php echo ($this->input->post('persen_kk_12') ? $this->input->post('persen_kk_12') : $belanja['persen_kk_12']); ?>" class="form-control" id="persen_kk_12" placeholder="%" readonly />
                              </div>
                            </td>

                            <td> 
                              <div class="col-md-9">
                                <input type="file" name="file_foto_realisasi_12" class="form-control" />
                                <?php
                                    if (!empty($foto_realisasi)){
                                      echo '<br>';
                                      foreach($foto_realisasi as $foto){
                                        if ($foto['bulan']==12) {
                                          echo '<div class="attachment-block clearfix">';
                                          echo '<div class="col-md-7">';
                                          echo '<a href="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/swakelola/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
                                          echo '</div>';
                                          echo '<div class="col-md-5">';
                                          $time = strtotime($foto['update_tgl']);
                                          $myFormatForView = date("d/m/Y, g:i A", $time);
                                          echo '<font size="2">Tanggal/jam unggah:<br>'.$myFormatForView.'</font><br>
                                                <button type="submit" name="btn_hapus_file_foto_realisasi_'.$foto['id_foto_realisasi'].'" class="btn-xs" onclick="return confirm(\'Hapus data ini?\')">Hapus</button>';                                      
                                          echo '</div>';
                                          echo '</div>';
                                        } 
                                      }
                                    }
                                ?>
                              </div>
                              <div class="col-md-3">
                                <button type="submit" name="btn_unggah_file_foto_realisasi_12" class="btn" >Tambahkan</button>
                              </div>                            
                            </td>                          
                          </tr>     

                        </table>
                      </div><!-- /.box-body -->
                  </div>  <!-- /.tab-pane -->  
               </div> <!-- /.tab-content -->  

            </div> <!-- /.nav-tabs-custom -->  
          
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="form-group">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-default">
          <a href="<?php echo base_url('belanja/index/'.$belanja['kode_giat']);?>"><i class="fa fa-hand-o-left"></i> Kembali</a>
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
</div>

<script type="text/javascript">
function hitungPersenDariPagu(nilai,pengirim,pagu) {    
    var persenDariPagu = Number((nilai / pagu) * 100).toFixed(2);
    document.getElementById("persen_"+pengirim).value = persenDariPagu.toString();
};
</script>

<script type="text/javascript">
function isiPaguSisa(keterangan,bulan) {   
  var bulan_int = parseInt(bulan);    
  //var bulan_str = bulan_int.toString();
  // alert(document.getElementById("2").value + " " + bulan_str);
  // document.getElementById(bulan+1.toString).value = "test";  
  for (i = bulan_int+1; i <= 12; i++) {
    document.getElementById(i.toString()).value = keterangan;
  }    
};
</script>