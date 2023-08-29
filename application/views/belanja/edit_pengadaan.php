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

    <?php echo form_open_multipart('belanja/edit_pengadaan/'.$belanja['kode_rek_belanja'],array("class"=>"form-horizontal")); ?>
    <div class="box">

        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cube"></i> Program: <i><?php echo $program['nama_prog']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('program/index');?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Program</a>
            </div>
        </div>
        <div class="box-header with-border">
            <label class="control-label"><i class="fa fa-cubes"></i> Kegiatan: <i><?php echo $kegiatan['nama_giat']; ?></i></label>
            <div class="box-tools">
                <a href="<?php echo site_url('kegiatan/index/'.$program['kode_prog']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Kegiatan</a>
            </div>
        </div><br>


        <div class='box-header with-border'>
            <h4 class="box-title">Edit Kegiatan Belanja Pengadaan</h4>
            <div class="box-tools">
                <a href="<?php echo site_url('belanja/index/'.$belanja['kode_giat']);?>" class="btn btn-primary btn-sm" style="width: 170px;">Kembali ke Daftar Belanja</a>
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
                     <input type="text" name="nama_belanja" value="<?php echo ($this->input->post('nama_belanja') ? $this->input->post('nama_belanja') : $belanja['nama_belanja']); ?>" class="form-control" id="nama_belanja" placeholder=""/>
                     <?php echo form_error('nama_belanja'); ?>
                 </div>
            </div>

            <div class="form-group">
                 <label for="nama_paket_pengadaan" class="col-md-2 control-label">Nama Paket Pengadaan</label>
                 <div class="col-md-10">
                     <input type="text" name="nama_paket_pengadaan" value="<?php echo ($this->input->post('nama_paket_pengadaan') ? $this->input->post('nama_paket_pengadaan') : $belanja['nama_paket_pengadaan']); ?>" class="form-control" id="nama_paket_pengadaan" placeholder=""/>
                     <?php echo form_error('nama_paket_pengadaan'); ?>
                 </div>
            </div>
                
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">                  
                  <li <?php echo (isset($tab_menu) && $tab_menu == "umum" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_1" data-toggle="tab">Data Umum</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "penyediaan" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_2" data-toggle="tab">Penyedia</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "kemajuan" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_3" data-toggle="tab">Realisasi</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "pemeriksaan" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_4" data-toggle="tab">Pemeriksa</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "pengawasan" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_5" data-toggle="tab">Konsultan</a></li>
                  <li <?php echo (isset($tab_menu) && $tab_menu == "penggunaan" ? ' class="active">' : '>'); ?> 
                  <a href="#tab_6" data-toggle="tab">Pengguna</a></li>
               </ul>


               <div class="tab-content">

                  <div <?php echo (isset($tab_menu) && $tab_menu == "umum" ? 'class="tab-pane active" ' : 'class="tab-pane" '); ?> id="tab_1">
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
                      <label for="usulan_dari" class="col-md-2 control-label">Usulan Kegiatan dari</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_usulan_dari = array(
                                                         '' => 'Pilihan usulan kegiatan dari...', 
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

                    <div class="form-group">
                      <label for="file_dokumen_kak" class="col-md-2 control-label">Dokumen KAK/TOR</label>
                      <div class="col-md-5">
                        <input type="file" name="file_dokumen_kak" value="<?php echo ($this->input->post('file_dokumen_kak') ? $this->input->post('file_dokumen_kak') : $belanja['file_dokumen_kak']); ?>" class="form-control" id="file_dokumen_kak" />
                        <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
                        <?php
                          if(!$belanja['file_dokumen_kak']=='') {
                            echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['file_dokumen_kak']).'"  class="view-pdf">'.$belanja['file_dokumen_kak'].'</a>'; 
                          }                              
                        ?>                 
                      </div>
                    </div>  

                    <div class="form-group">
                         <label for="nip_ppk" class="col-md-2 control-label">PPK</label>
                         <div class="col-md-7">
                              <?php 
                                  $pilihan_nip_ppk[""] = "Ketikkan NIP pegawai atau pilih dari daftar di bawah ini...";
                                  foreach ($pejabat as $q) {
                                    $pilihan_nip_ppk[$q['nip_p']] =  'NIP: '.$q['nip_p'].', Nama: '.$q['nama_p'];
                                  }                                  
                                  echo form_dropdown('nip_ppk', $pilihan_nip_ppk,($this->input->post('nip_ppk') ? $this->input->post('nip_ppk') : $belanja['nip_ppk']),'class="js-example-basic-single" style="width: 100%;"');
                              ?>
                             <?php echo form_error('nip_ppk'); ?>
                         </div>
                    </div>     


                    <div class="form-group">
                         <label for="nip_pp" class="col-md-2 control-label">Pejabat Pengadaan</label>
                         <div class="col-md-7">
                              <?php 
                                  $pilihan_nip_pp[""] = "Ketikkan NIP pegawai atau pilih dari daftar di bawah ini...";
                                  foreach ($pejabat as $q) {
                                    $pilihan_nip_pp[$q['nip_p']] =  'NIP: '.$q['nip_p'].', Nama: '.$q['nama_p'];
                                  }                                  
                                  echo form_dropdown('nip_pp', $pilihan_nip_pp,($this->input->post('nip_pp') ? $this->input->post('nip_pp') : $belanja['nip_pp']),'class="js-example-basic-single" style="width: 100%;"');
                              ?>
                             <?php echo form_error('nip_pp'); ?>
                         </div>
                    </div>                                    

                    <div class="form-group">
                      <label for="jenis_pengadaan" class="col-md-2 control-label">Jenis Pengadaan</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_jenis_pengadaan = array(
                                                         '' => 'Pilihan jenis pengadaan...', 
                                                         'Barang' => 'Barang', 
                                                         'Konstruksi' => 'Konstruksi', 
                                                         'Konsultan' => 'Konsultan', 
                                                         'Jasa lainnya' => 'Jasa lainnya',  );
                            echo form_dropdown('jenis_pengadaan', $pilihan_jenis_pengadaan,($this->input->post('jenis_pengadaan') ? $this->input->post('jenis_pengadaan') : $belanja['jenis_pengadaan']),'class="form-control" id="parent_selection"'); 
                        ?>
                      </div>
                    </div>  

                    <div class="form-group">
                      <label for="metode_pemilihan_peny" class="col-md-2 control-label">Metode Pemilihan Penyedia</label>
                      <div class="col-md-4">
                        <?php 
                            if ($belanja['jenis_pengadaan'] == "Barang" || $this->input->post('jenis_pengadaan') == "Barang"){
                                  $pilihan_metode_pemilihan_peny = array(
                                    '' => 'Pilihan metode pemilihan penyedia...', 
                                    'LU' => 'Lelang Umum', 
                                    'LS' => 'Lelang Sederhana', 
                                    'PL' => 'Pengadaan Langsung', 
                                    'PK' => 'Penunjukkan Langsung',  
                                    'SY' => 'Sayembara/Kontes',  
                                  );      
                            } elseif ($belanja['jenis_pengadaan'] == "Konstruksi" || $this->input->post('jenis_pengadaan') == "Konstruksi") {
                                  $pilihan_metode_pemilihan_peny = array(
                                    '' => 'Pilihan metode pemilihan penyedia...', 
                                    'LU' => 'Pelelangan Umum', 
                                    'LT' => 'Pelelangan Terbatas', 
                                    'PML' => 'Pemilihan Langsung', 
                                    'PK' => 'Penunjukkan Langsung',  
                                    'PL' => 'Pengadaan Langsung',  
                                  ); 
                            } elseif ($belanja['jenis_pengadaan'] == "Konsultan" || $this->input->post('jenis_pengadaan') == "Konsultan") {
                                  $pilihan_metode_pemilihan_peny = array(
                                    '' => 'Pilihan metode pemilihan penyedia...', 
                                    'SU' => 'Seleksi Umum', 
                                    'SS' => 'Seleksi Sederhana', 
                                    'PK' => 'Penunjukkan Langsung',  
                                    'PL' => 'Pengadaan Langsung',                                      
                                    'SY' => 'Sayembara',  
                                  ); 
                            } elseif ($belanja['jenis_pengadaan'] == "Jasa lainnya" || $this->input->post('jenis_pengadaan') == "Jasa lainnya") {
                                  $pilihan_metode_pemilihan_peny = array(
                                    '' => 'Pilihan metode pemilihan penyedia...', 
                                    'LU' => 'Lelang Umum', 
                                    'LS' => 'Lelang Sederhana', 
                                    'PK' => 'Penunjukkan Langsung',  
                                    'PL' => 'Pengadaan Langsung',                                      
                                    'SY' => 'Sayembara/Kontes',  
                                  );                                   
                            } else {
                                  $pilihan_metode_pemilihan_peny = array(
                                    '' => 'Pilihan metode pemilihan penyedia...', 
                                  );                                                   
                            }
                            echo form_dropdown('metode_pemilihan_peny', $pilihan_metode_pemilihan_peny,($this->input->post('metode_pemilihan_peny') ? $this->input->post('metode_pemilihan_peny') : $belanja['metode_pemilihan_peny']),'class="form-control" id="child_selection"'); 
                        ?>
                      </div>
                    </div>           

                    <div class="form-group">
                      <label for="jenis_belanja" class="col-md-2 control-label">Jenis Belanja</label>
                      <div class="col-md-3">
                        <?php 
                            $pilihan_jenis_belanja = array(
                                                         '' => 'Pilihan jenis belanja...', 
                                                         'Barang/Jasa' => 'Barang/Jasa',  
                                                         'Modal' => 'Modal', 
                                                         'Hibah' => 'Hibah',  );
                            echo form_dropdown('jenis_belanja', $pilihan_jenis_belanja,($this->input->post('jenis_belanja') ? $this->input->post('jenis_belanja') : $belanja['jenis_belanja']),'class="form-control"'); 
                        ?>
                      </div>
                    </div>  

                    <div class="form-group">
                         <label for="volume_belanja" class="col-md-2 control-label">Volume</label>
                         <div class="col-md-3">
                             <input type="text" name="volume_belanja" value="<?php echo ($this->input->post('volume_belanja') ? $this->input->post('volume_belanja') : $belanja['volume_belanja']); ?>" class="form-control" id="volume_belanja" />
                             <?php echo form_error('volume_belanja'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="hps" class="col-md-2 control-label">Harga Perkiraan Sendiri</label>
                         <div class="col-md-3">
                            <div class="input-group">
                               <span class="input-group-addon">Rp.</span>                   
                               <input type="text" name="hps" value="<?php echo ($this->input->post('hps') ? $this->input->post('hps') : $belanja['hps']); ?>" class="form-control integer" id="hps" />
                               <?php echo form_error('hps'); ?>
                            </div>
                         </div>
                    </div>            
                  </div>  <!-- /.tab-pane -->


                  <div <?php echo (isset($tab_menu) && $tab_menu == "penyediaan" ? 'class="tab-pane active" ' : 'class="tab-pane"'); ?> id="tab_2">
                      <br>
                      <div class="form-group">
                           <label for="nama_peny" class="col-md-2 control-label">Nama Penyedia</label>
                           <div class="col-md-5">                    
                                 <input type="text" name="nama_peny" value="<?php echo ($this->input->post('nama_peny') ? $this->input->post('nama_peny') : $belanja['nama_peny']); ?>" class="form-control" id="nama_peny" placeholder="" />
                                 <?php echo form_error('nama_peny'); ?>                    
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="nama_direktur" class="col-md-2 control-label">Nama Direktur</label>
                           <div class="col-md-5">
                               <input type="text" name="nama_direktur" value="<?php echo ($this->input->post('nama_direktur') ? $this->input->post('nama_direktur') : $belanja['nama_direktur']); ?>" class="form-control" id="nama_direktur" placeholder="" />
                               <?php echo form_error('nama_direktur'); ?>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="alamat_peny" class="col-md-2 control-label">Alamat Penyedia</label>
                           <div class="col-md-10">
                               <input type="text" name="alamat_peny" value="<?php echo ($this->input->post('alamat_peny') ? $this->input->post('alamat_peny') : $belanja['alamat_peny']); ?>" class="form-control" id="alamat_peny" placeholder="" />
                               <?php echo form_error('alamat_peny'); ?>
                           </div>
                      </div>

                      <div class="form-group">
                        <label for="kualifikasi_peny" class="col-md-2 control-label">Kualifikasi Penyedia</label>
                        <div class="col-md-3">
                          <?php 
                              $pilihan_kualifikasi_peny = array(
                                                           '' => 'Pilihan kualifikasi penyedia...', 
                                                           'Kecil' => 'Kecil', 
                                                           'Non-kecil' => 'Non-kecil', );
                              echo form_dropdown('kualifikasi_peny', $pilihan_kualifikasi_peny,($this->input->post('kualifikasi_peny') ? $this->input->post('kualifikasi_peny') : $belanja['kualifikasi_peny']),'class="form-control"'); 
                          ?>
                        </div>
                      </div>

                      <div class="form-group">
                           <label for="nomor_kontrak" class="col-md-2 control-label">Nomor Kontrak</label>
                           <div class="col-md-3">
                               <input type="text" name="nomor_kontrak" value="<?php echo ($this->input->post('nomor_kontrak') ? $this->input->post('nomor_kontrak') : $belanja['nomor_kontrak']); ?>" class="form-control" id="nomor_kontrak" placeholder="" />
                               <?php echo form_error('nomor_kontrak'); ?>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="tanggal_kontrak" class="col-md-2 control-label">Tanggal Kontrak</label>
                           <div class="col-md-3">
                              <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               <input type="text" name="tanggal_kontrak" value="<?php echo ($this->input->post('tanggal_kontrak') ? $this->input->post('tanggal_kontrak') : $belanja['tanggal_kontrak']); ?>" class="form-control date" placeholder=""/>
                               <?php echo form_error('tanggal_kontrak'); ?>
                              </div>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="jangka_waktu_kontrak" class="col-md-2 control-label">Jangka Waktu Kontrak</label>
                           <div class="col-md-2">
                               <input type="text" name="jangka_waktu_kontrak" value="<?php echo ($this->input->post('jangka_waktu_kontrak') ? $this->input->post('jangka_waktu_kontrak') : $belanja['jangka_waktu_kontrak']); ?>" class="form-control integer" id="jangka_waktu_kontrak" placeholder="Hari" /> 
                               <?php echo form_error('jangka_waktu_kontrak'); ?>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="tanggal_mulai_kontrak" class="col-md-2 control-label">Tanggal Mulai Kontrak</label>
                           <div class="col-md-3">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               <input type="text" name="tanggal_mulai_kontrak" value="<?php echo ($this->input->post('tanggal_mulai_kontrak') ? $this->input->post('tanggal_mulai_kontrak') : $belanja['tanggal_mulai_kontrak']); ?>" class="form-control date" id="tanggal_mulai_kontrak" placeholder="" />
                               <?php echo form_error('tanggal_mulai_kontrak'); ?>
                               </div>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="tanggal_selesai_kontrak" class="col-md-2 control-label">Tanggal Selesai Kontrak</label>
                           <div class="col-md-3">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               <input type="text" name="tanggal_selesai_kontrak" value="<?php echo ($this->input->post('tanggal_selesai_kontrak') ? $this->input->post('tanggal_selesai_kontrak') : $belanja['tanggal_selesai_kontrak']); ?>" class="form-control date" id="tanggal_selesai_kontrak" placeholder="dd/mm/yyy" />
                               <?php echo form_error('tanggal_selesai_kontrak'); ?>
                               </div>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="nilai_kontrak" class="col-md-2 control-label">Nilai Kontrak</label>
                           <div class="col-md-3">
                              <div class="input-group">
                                 <span class="input-group-addon">Rp.</span>                   
                                 <input type="text" name="nilai_kontrak" value="<?php echo ($this->input->post('nilai_kontrak') ? $this->input->post('nilai_kontrak') : $belanja['nilai_kontrak']); ?>" class="form-control integer" id="nilai_kontrak" placeholder="" />
                                 <?php echo form_error('nilai_kontrak'); ?>
                              </div>
                           </div>
                      </div> 

                      <div class="form-group">
                        <label for="file_dokumen_kontrak" class="col-md-2 control-label">File Dokumen Kontrak</label>
                        <div class="col-md-5">
                          <input type="file" name="file_dokumen_kontrak" value="<?php echo ($this->input->post('file_dokumen_kontrak') ? $this->input->post('file_dokumen_kontrak') : $belanja['file_dokumen_kontrak']); ?>" class="form-control" id="file_dokumen_kontrak" />
                          <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
                          <?php
                            if(!$belanja['file_dokumen_kontrak']=='') {
                              echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['file_dokumen_kontrak']).'" class="view-pdf">'.$belanja['file_dokumen_kontrak'].'</a>'; 
                            }                              
                          ?>                 
                        </div>
                      </div>
                  </div>  <!-- /.tab-pane -->  


                  <div <?php echo (isset($tab_menu) && $tab_menu == "kemajuan" ? 'class="tab-pane active" ' : 'class="tab-pane"'); ?> id="tab_3">
                    <br>
                    <div class="box-body">
                      <table class="table table-bordered table-striped">
                        <tr>                          
                          <th width="150px">Bulan</th>
                          <th width="320px">Realisasi</th>
                          <th>Foto</th>
                        </tr>                       



                        <tr>
                          <td align="center">
                            <font size="5"><b>Januari</b></font><br>
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_2" value="<?php echo ($this->input->post('kk_2') ? $this->input->post('kk_2') : $belanja['kk_2']); ?>" class="form-control integer" id="kk_2" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_2'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_2" value="<?php echo ($this->input->post('persen_kk_2') ? $this->input->post('persen_kk_2') : $belanja['persen_kk_2']); ?>" class="form-control floating" id="persen_kk_2" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_3" value="<?php echo ($this->input->post('kk_3') ? $this->input->post('kk_3') : $belanja['kk_3']); ?>" class="form-control integer" id="kk_3" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_3'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_3" value="<?php echo ($this->input->post('persen_kk_3') ? $this->input->post('persen_kk_3') : $belanja['persen_kk_3']); ?>" class="form-control floating" id="persen_kk_3" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_4" value="<?php echo ($this->input->post('kk_4') ? $this->input->post('kk_4') : $belanja['kk_4']); ?>" class="form-control integer" id="kk_4" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_4'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_4" value="<?php echo ($this->input->post('persen_kk_4') ? $this->input->post('persen_kk_4') : $belanja['persen_kk_4']); ?>" class="form-control floating" id="persen_kk_4" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_5" value="<?php echo ($this->input->post('kk_5') ? $this->input->post('kk_5') : $belanja['kk_5']); ?>" class="form-control integer" id="kk_5" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_5'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_5" value="<?php echo ($this->input->post('persen_kk_5') ? $this->input->post('persen_kk_5') : $belanja['persen_kk_5']); ?>" class="form-control floating" id="persen_kk_5" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_6" value="<?php echo ($this->input->post('kk_6') ? $this->input->post('kk_6') : $belanja['kk_6']); ?>" class="form-control integer" id="kk_6" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_6'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_6" value="<?php echo ($this->input->post('persen_kk_6') ? $this->input->post('persen_kk_6') : $belanja['persen_kk_6']); ?>" class="form-control floating" id="persen_kk_6" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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

                        <tr>
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
                                <input type="text" name="kk_7" value="<?php echo ($this->input->post('kk_7') ? $this->input->post('kk_7') : $belanja['kk_7']); ?>" class="form-control integer" id="kk_7" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_7'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_7" value="<?php echo ($this->input->post('persen_kk_7') ? $this->input->post('persen_kk_7') : $belanja['persen_kk_7']); ?>" class="form-control floating" id="persen_kk_7" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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

                        <tr>
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
                                <input type="text" name="kk_8" value="<?php echo ($this->input->post('kk_8') ? $this->input->post('kk_8') : $belanja['kk_8']); ?>" class="form-control integer" id="kk_8" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_8'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_8" value="<?php echo ($this->input->post('persen_kk_8') ? $this->input->post('persen_kk_8') : $belanja['persen_kk_8']); ?>" class="form-control floating" id="persen_kk_8" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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

                        <tr>
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
                                <input type="text" name="kk_9" value="<?php echo ($this->input->post('kk_9') ? $this->input->post('kk_9') : $belanja['kk_9']); ?>" class="form-control integer" id="kk_9" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_9'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_9" value="<?php echo ($this->input->post('persen_kk_9') ? $this->input->post('persen_kk_9') : $belanja['persen_kk_9']); ?>" class="form-control floating" id="persen_kk_9" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_10" value="<?php echo ($this->input->post('kk_10') ? $this->input->post('kk_10') : $belanja['kk_10']); ?>" class="form-control integer" id="kk_10" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_10'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_10" value="<?php echo ($this->input->post('persen_kk_10') ? $this->input->post('persen_kk_10') : $belanja['persen_kk_10']); ?>" class="form-control floating" id="persen_kk_10" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_11" value="<?php echo ($this->input->post('kk_11') ? $this->input->post('kk_11') : $belanja['kk_11']); ?>" class="form-control integer" id="kk_11" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_11'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_11" value="<?php echo ($this->input->post('persen_kk_11') ? $this->input->post('persen_kk_11') : $belanja['persen_kk_11']); ?>" class="form-control floating" id="persen_kk_11" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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
                                <input type="text" name="kk_12" value="<?php echo ($this->input->post('kk_12') ? $this->input->post('kk_12') : $belanja['kk_12']); ?>" class="form-control integer" id="kk_12" placeholder="Rp." onkeyup="hitungPersenDariPagu(this.value,this.name,<?php echo $belanja['pagu_giat_12'];?>)" />
                            </div>
                            <br><br>
                            <div class="col-md-7">
                              Persen dari pagu (%):
                            </div>
                            <div class="col-md-5" align="left">
                                <input type="text" name="persen_kk_12" value="<?php echo ($this->input->post('persen_kk_12') ? $this->input->post('persen_kk_12') : $belanja['persen_kk_12']); ?>" class="form-control floating" id="persen_kk_12" placeholder="%" readonly />
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
                                        echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'"><img src="'.site_url('uploads/belanja/pengadaan/'.$foto['file_foto_realisasi']).'" width="100%" style="border:1px solid black"></a><br>';
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


                  <div <?php echo (isset($tab_menu) && $tab_menu == "pemeriksaan" ? 'class="tab-pane active" ' : 'class="tab-pane"'); ?> id="tab_4">                                       
                      <br>
                      <div class="form-group">
                           <label for="nomor_pphp" class="col-md-2 control-label">Nomor PPHP/PHO</label>
                           <div class="col-md-5">
                               <input type="text" name="nomor_pphp" value="<?php echo ($this->input->post('nomor_pphp') ? $this->input->post('nomor_pphp') : $belanja['nomor_pphp']); ?>" class="form-control" id="nomor_pphp" placeholder="" />
                               <?php echo form_error('nomor_pphp'); ?>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="tanggal_pphp" class="col-md-2 control-label">Tanggal PPHP/PHO</label>
                           <div class="col-md-3">
                              <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               <input type="text" name="tanggal_pphp" value="<?php echo ($this->input->post('tanggal_pphp') ? $this->input->post('tanggal_pphp') : $belanja['tanggal_pphp']); ?>" class="form-control date" />
                               <?php echo form_error('tanggal_pphp'); ?>
                              </div>
                           </div>
                      </div>

                      <div class="form-group">
                           <label for="tim_pphp" class="col-md-2 control-label">Tim PPHP/PHO</label>
                           <div class="col-md-8">
                            <div class="attachment-block clearfix">
                              <table class="table table-bordered">
                                  <tr>
                                      <th width="10px" align="center">No.</th>
                                      <th align="center">NIP</th>
                                      <th align="center">Nama</th>
                                      <th align="center">Perangkat Daerah</th>
                                      <th align="center">Aksi</th>
                                  </tr>
                                  <?php $no=0 ; ?>
                                  <?php foreach($pphp as $p){ ?>
                                  <tr>
                                      <?php $no++; ?>
                                      <td align="center">
                                          <?php echo $no; ?>
                                      </td>
                                      <td align="center">
                                          <?php echo $p['nip_pphp']; ?>
                                      </td>
                                      <td>
                                          <?php echo $p['nama_p']; ?>
                                      </td>
                                      <td>
                                          <?php echo $p['nama_pd']; ?>
                                      </td>                                               
                                      <td align="center">
                                          <a href="<?php echo site_url('belanja/edit_pengadaan/'.$belanja['kode_rek_belanja'].'/tambah_nip_pphp/'.$p['nip_pphp'] ); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                                      </td>
                                  </tr>
                                  <?php } ?>                                  
                              </table>    
                              Klik isian "Pilihan pegawai" di bawah ini, ketikkan NIP atau nama untuk memilih pegawai, dan klik tombol "Tambahkan" untuk menambahkan data ke tabel Tim PPHP/PHO di atas: <br><br>                     
                               <div class="col-md-8">
                                <div class="input-group pull-right">
                                <select name="pilihan_nip_pphp" align="right" class="js-example-basic-single" style="width: 350px;">
                                <?php 
                                    echo '<option value="">Pilihan pegawai...</option>';
                                    foreach ($pejabat_pphp as $q) {
                                      echo '<option value="'.$q["nip_p"].'">NIP: '.$q["nip_p"].', Nama: '.$q["nama_p"].'</option>';
                                    }
                                ?>
                                </select>
                                </div>   
                                </div>       
                                <div class="col-md-4" align="right">
                                    <button type="submit" class="btn" name="tambah_nip_pphp">
                                        Tambahkan
                                    </button>                         
                               </div>
                               <br><br>  
                               </div>   

                           </div>
                      </div>
                      <br>

                      <div class="form-group">
                           <label for="tanggal_pphp" class="col-md-2 control-label">Hasil Pemeriksaan PPHP/PHO</label>
                           <div class="col-md-8">

                            <div class="attachment-block clearfix">
                              <table class="table table-bordered">
                                  <tr>
                                      <th width="10px">No.</th>
                                      <th>Tanggal</th>
                                      <th >Hasil/Keterangan</th>
                                      <th>Aksi</th>
                                  </tr>
                                  <?php $no=0 ; ?>
                                  <?php foreach($hasil_pemeriksaan as $p){ ?>
                                  <tr>
                                      <?php $no++; ?>
                                      <td align="center">
                                          <?php echo $no; ?>
                                      </td>
                                      <td align="center">
                                          <?php echo $p['tanggal_pemeriksaan']; ?>
                                      </td>
                                      <td>
                                          <?php 
                                              echo 'Hasil: '.$p['hasil_pemeriksaan'].'<br>'.
                                                   'Nomor BAP: '.$p['nomor_berita_acara_pemeriksaan'].'<br>'.
                                                   'File BAP: '; 
                                              if (!empty($p['file_berita_acara_pemeriksaan'])) {
                                                echo '<a href="'.site_url('uploads/belanja/pengadaan/'.$p['file_berita_acara_pemeriksaan']).'" class="view-pdf">'.$p['file_berita_acara_pemeriksaan'].'</a>'; 
                                              }
                                          ?>
                                      </td>                                             
                                      <td align="center">
                                          <a href="<?php echo site_url('belanja/edit_pengadaan/'.$belanja['kode_rek_belanja'].'/hapus_hasil_pemeriksaan/'.$p['id_hasil_pemeriksaan'] ); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?');"><span class="fa fa-trash"></span> Hapus</a>
                                      </td>
                                  </tr>
                                  <?php } ?>
                              </table>                       

                              Isi isian-isian di bawah ini dan klik tombol "Tambahkan" untuk menambahkan data ke tabel Hasil Pemeriksaan PPHP/PHO di atas: <br><br>       


                                <div class="form-group">
                                     <label for="tanggal_pemeriksaan" class="col-md-4 control-label">Tanggal Pemeriksaan</label>
                                     <div class="col-md-4">
                                        <div class="input-group">
                                         <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                         <input type="text" name="tanggal_pemeriksaan" class="form-control date" />
                                         <?php echo form_error('tanggal_pemeriksaan'); ?>
                                        </div>
                                     </div>
                                </div>      

                                <div class="form-group">
                                     <label for="hasil_pemeriksaan" class="col-md-4 control-label">Hasil Pemeriksaan</label>
                                     <div class="col-md-8">
                                         <textarea rows="6" name="hasil_pemeriksaan" class="form-control" id="hasil_pemeriksaan" placeholder=""></textarea>
                                         <?php echo form_error('hasil_pemeriksaan'); ?>
                                     </div>
                                </div>            


                                <div class="form-group">
                                     <label for="nomor_berita_acara_pemeriksaan" class="col-md-4 control-label">Nomor Berita Acara Pemeriksaan</label>
                                     <div class="col-md-5">
                                         <input type="text" name="nomor_berita_acara_pemeriksaan" class="form-control" id="nomor_berita_acara_pemeriksaan" placeholder="" />
                                         <?php echo form_error('nomor_berita_acara_pemeriksaan'); ?>
                                     </div>
                                </div> 

                                <div class="form-group">
                                  <label for="file_berita_acara_pemeriksaan" class="col-md-4 control-label">Unggah File Berita Acara Pemeriksaan</label>
                                  <div class="col-md-8">
                                    <input type="file" name="file_berita_acara_pemeriksaan" class="form-control" id="file_berita_acara_pemeriksaan"/>
                                    <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>               
                                  </div>                                 
                                </div>                                                    

                                <div align="right">
                                    <button type="submit" class="btn" name="btn_tambah_hasil_pemeriksaan">
                                        Tambahkan
                                    </button>                         
                               </div>  
                               <br>

                           </div>
                         </div>
                      </div>
                  </div>  <!-- /.tab-pane -->  


                  <div <?php echo (isset($tab_menu) && $tab_menu == "pengawasan" ? 'class="tab-pane active" ' : 'class="tab-pane" '); ?> id="tab_5">
                    <h3>Konsultan/Tim Perencanaan</h3>
                    <hr>

                    <div class="form-group">
                         <label for="konsultan_perencanaan_nama_paket" class="col-md-2 control-label">Nama Paket/ Kegiatan Perencanaan</label>
                         <div class="col-md-10">
                             <input type="text" name="konsultan_perencanaan_nama_paket" value="<?php echo ($this->input->post('konsultan_perencanaan_nama_paket') ? $this->input->post('konsultan_perencanaan_nama_paket') : $belanja['konsultan_perencanaan_nama_paket']); ?>" class="form-control" id="konsultan_perencanaan_nama_paket" placeholder=""/>
                             <?php echo form_error('konsultan_perencanaan_nama_paket'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="konsultan_perencanaan_nama_penyedia" class="col-md-2 control-label">Nama Penyedia/ Tim/Perorangan</label>
                         <div class="col-md-5">             
                               <input type="text" name="konsultan_perencanaan_nama_penyedia" value="<?php echo ($this->input->post('konsultan_perencanaan_nama_penyedia') ? $this->input->post('konsultan_perencanaan_nama_penyedia') : $belanja['konsultan_perencanaan_nama_penyedia']); ?>" class="form-control" id="konsultan_perencanaan_nama_penyedia" placeholder="" />
                               <?php echo form_error('konsultan_perencanaan_nama_penyedia'); ?>
                         </div>
                    </div>                    

                    <div class="form-group">
                         <label for="konsultan_perencanaan_alamat" class="col-md-2 control-label">Alamat</label>
                         <div class="col-md-10">
                               <input type="text" name="konsultan_perencanaan_alamat" value="<?php echo ($this->input->post('konsultan_perencanaan_alamat') ? $this->input->post('konsultan_perencanaan_alamat') : $belanja['konsultan_perencanaan_alamat']); ?>" class="form-control" id="konsultan_perencanaan_alamat" placeholder="" />
                               <?php echo form_error('konsultan_perencanaan_alamat'); ?>
                         </div>
                    </div>                     

                    <div class="form-group">
                         <label for="konsultan_perencanaan_nama_pimpinan" class="col-md-2 control-label">Nama Pimpinan</label>
                         <div class="col-md-5">                  
                               <input type="text" name="konsultan_perencanaan_nama_pimpinan" value="<?php echo ($this->input->post('konsultan_perencanaan_nama_pimpinan') ? $this->input->post('konsultan_perencanaan_nama_pimpinan') : $belanja['konsultan_perencanaan_nama_pimpinan']); ?>" class="form-control" id="konsultan_perencanaan_nama_pimpinan" placeholder="" />
                               <?php echo form_error('konsultan_perencanaan_nama_pimpinan'); ?>
                         </div>
                    </div>    

                    <div class="form-group">
                         <label for="konsultan_perencanaan_alamat_pimpinan" class="col-md-2 control-label">Alamat Pimpinan</label>
                         <div class="col-md-10">
                               <input type="text" name="konsultan_perencanaan_alamat_pimpinan" value="<?php echo ($this->input->post('konsultan_perencanaan_alamat_pimpinan') ? $this->input->post('konsultan_perencanaan_alamat_pimpinan') : $belanja['konsultan_perencanaan_alamat_pimpinan']); ?>" class="form-control" id="konsultan_perencanaan_alamat_pimpinan" placeholder="" />
                               <?php echo form_error('konsultan_perencanaan_alamat_pimpinan'); ?>
                         </div>
                    </div>   

                    <div class="form-group">
                         <label for="konsultan_perencanaan_nilai_kontrak" class="col-md-2 control-label">Nilai Kontrak</label>
                         <div class="col-md-3">
                            <div class="input-group">
                               <span class="input-group-addon">Rp.</span>                   
                               <input type="text" name="konsultan_perencanaan_nilai_kontrak" value="<?php echo ($this->input->post('konsultan_perencanaan_nilai_kontrak') ? $this->input->post('konsultan_perencanaan_nilai_kontrak') : $belanja['konsultan_perencanaan_nilai_kontrak']); ?>" class="form-control integer" id="konsultan_perencanaan_nilai_kontrak" placeholder="" />
                               <?php echo form_error('konsultan_perencanaan_nilai_kontrak'); ?>
                            </div>
                         </div>
                    </div>  

                    <div class="form-group">
                      <label for="konsultan_perencanaan_file_dokumen_kontrak" class="col-md-2 control-label">File Dokumen Kontrak Perencanaan</label>
                      <div class="col-md-5">
                        <input type="file" name="konsultan_perencanaan_file_dokumen_kontrak" value="<?php echo ($this->input->post('konsultan_perencanaan_file_dokumen_kontrak') ? $this->input->post('konsultan_perencanaan_file_dokumen_kontrak') : $belanja['konsultan_perencanaan_file_dokumen_kontrak']); ?>" class="form-control" id="konsultan_perencanaan_file_dokumen_kontrak" />
                        <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
                        <?php
                          if(!$belanja['konsultan_perencanaan_file_dokumen_kontrak']=='') {
                            echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['konsultan_perencanaan_file_dokumen_kontrak']).'" class="view-pdf">'.$belanja['konsultan_perencanaan_file_dokumen_kontrak'].'</a>'; 
                          }                              
                        ?>                 
                      </div>
                    </div>

                    <h3>Konsultan/Tim Pengawasan</h3>
                    <hr>
                    <div class="form-group">
                         <label for="konsultan_pengawasan_nama_paket" class="col-md-2 control-label">Nama Paket/ Kegiatan Pengawasan</label>
                         <div class="col-md-10">
                             <input type="text" name="konsultan_pengawasan_nama_paket" value="<?php echo ($this->input->post('konsultan_pengawasan_nama_paket') ? $this->input->post('konsultan_pengawasan_nama_paket') : $belanja['konsultan_pengawasan_nama_paket']); ?>" class="form-control" id="konsultan_pengawasan_nama_paket" placeholder=""/>
                             <?php echo form_error('konsultan_pengawasan_nama_paket'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="konsultan_pengawasan_nama_penyedia" class="col-md-2 control-label">Nama Penyedia/ Tim/Perorangan</label>
                         <div class="col-md-5">           
                               <input type="text" name="konsultan_pengawasan_nama_penyedia" value="<?php echo ($this->input->post('konsultan_pengawasan_nama_penyedia') ? $this->input->post('konsultan_pengawasan_nama_penyedia') : $belanja['konsultan_pengawasan_nama_penyedia']); ?>" class="form-control" id="konsultan_pengawasan_nama_penyedia" placeholder="" />
                               <?php echo form_error('konsultan_pengawasan_nama_penyedia'); ?>
                         </div>
                    </div>                    

                    <div class="form-group">
                         <label for="konsultan_pengawasan_alamat" class="col-md-2 control-label">Alamat</label>
                         <div class="col-md-10">              
                               <input type="text" name="konsultan_pengawasan_alamat" value="<?php echo ($this->input->post('konsultan_pengawasan_alamat') ? $this->input->post('konsultan_pengawasan_alamat') : $belanja['konsultan_pengawasan_alamat']); ?>" class="form-control" id="konsultan_pengawasan_alamat" placeholder="" />
                               <?php echo form_error('konsultan_pengawasan_alamat'); ?>
                         </div>
                    </div>                     

                    <div class="form-group">
                         <label for="konsultan_pengawasan_nama_pimpinan" class="col-md-2 control-label">Nama Pimpinan</label>
                         <div class="col-md-5">                
                               <input type="text" name="konsultan_pengawasan_nama_pimpinan" value="<?php echo ($this->input->post('konsultan_pengawasan_nama_pimpinan') ? $this->input->post('konsultan_pengawasan_nama_pimpinan') : $belanja['konsultan_pengawasan_nama_pimpinan']); ?>" class="form-control" id="konsultan_pengawasan_nama_pimpinan" placeholder="" />
                               <?php echo form_error('konsultan_pengawasan_nama_pimpinan'); ?>
                         </div>
                    </div>    

                    <div class="form-group">
                         <label for="konsultan_pengawasan_alamat_pimpinan" class="col-md-2 control-label">Alamat Pimpinan</label>
                         <div class="col-md-10">
                               <input type="text" name="konsultan_pengawasan_alamat_pimpinan" value="<?php echo ($this->input->post('konsultan_pengawasan_alamat_pimpinan') ? $this->input->post('konsultan_pengawasan_alamat_pimpinan') : $belanja['konsultan_pengawasan_alamat_pimpinan']); ?>" class="form-control" id="konsultan_pengawasan_alamat_pimpinan" placeholder="" />
                               <?php echo form_error('konsultan_pengawasan_alamat_pimpinan'); ?>
                         </div>
                    </div>   

                    <div class="form-group">
                         <label for="konsultan_pengawasan_nilai_kontrak" class="col-md-2 control-label">Nilai Kontrak</label>
                         <div class="col-md-3">
                            <div class="input-group">
                               <span class="input-group-addon">Rp.</span>                   
                               <input type="text" name="konsultan_pengawasan_nilai_kontrak" value="<?php echo ($this->input->post('konsultan_pengawasan_nilai_kontrak') ? $this->input->post('konsultan_pengawasan_nilai_kontrak') : $belanja['konsultan_pengawasan_nilai_kontrak']); ?>" class="form-control integer" id="konsultan_pengawasan_nilai_kontrak" placeholder="" />
                               <?php echo form_error('konsultan_pengawasan_nilai_kontrak'); ?>
                            </div>
                         </div>
                    </div>  

                    <div class="form-group">
                      <label for="konsultan_pengawasan_file_dokumen_kontrak" class="col-md-2 control-label">File Dokumen Kontrak Pengawasan</label>
                      <div class="col-md-5">
                        <input type="file" name="konsultan_pengawasan_file_dokumen_kontrak" class="form-control" id="konsultan_pengawasan_file_dokumen_kontrak" />
                        <p class="help-block">File dokumen harus dalam format DOC atau PDF</p>
                        <?php
                          if(!$belanja['konsultan_pengawasan_file_dokumen_kontrak']=='') {
                            echo 'File yang telah terunggah: <a href="'.site_url('uploads/belanja/pengadaan/'.$belanja['konsultan_pengawasan_file_dokumen_kontrak']).'" class="view-pdf">'.$belanja['konsultan_pengawasan_file_dokumen_kontrak'].'</a>'; 
                          }                            
                        ?>                 
                      </div>
                    </div>


                  </div>  <!-- /.tab-pane -->  

                  <div <?php echo (isset($tab_menu) && $tab_menu == "penggunaan" ? 'class="tab-pane active" ' : 'class="tab-pane" '); ?> id="tab_6">
                    <br>
                    <div class="form-group">
                         <label for="pengguna_penerima" class="col-md-2 control-label">Pengguna/Penerima</label>
                         <div class="col-md-10">
                               <input type="text" name="pengguna_penerima" value="<?php echo ($this->input->post('pengguna_penerima') ? $this->input->post('pengguna_penerima') : $belanja['pengguna_penerima']); ?>" class="form-control" id="pengguna_penerima" placeholder="" />
                               <?php echo form_error('pengguna_penerima'); ?>
                         </div>
                    </div>                     
                    
                    <div class="form-group">
                         <label for="alamat_pengguna_penerima" class="col-md-2 control-label">Alamat Pengguna/ Penerima</label>
                         <div class="col-md-10">
                               <input type="text" name="alamat_pengguna_penerima" value="<?php echo ($this->input->post('alamat_pengguna_penerima') ? $this->input->post('alamat_pengguna_penerima') : $belanja['alamat_pengguna_penerima']); ?>" class="form-control" id="alamat_pengguna_penerima" placeholder="" />
                               <?php echo form_error('alamat_pengguna_penerima'); ?>
                         </div>
                    </div>

                    <div class="form-group">
                         <label for="sudah_dimanfaatkan" class="col-md-2 control-label">Sudah dimanfaatkan?</label>
                          <div class="col-md-10">
                            <div class="input-group">
                              <div class="input-group-addon" style="width: 150px; text-align: left;">
                                <input name="pilihan_sudah_dimanfaatkan" type="radio" value="sudah" 
                                <?php echo ($belanja['pilihan_sudah_dimanfaatkan'] == "sudah" ? "checked" : ""); ?>>
                                Sudah, sejak:
                              </div>
                               <input type="text" name="sudah_dimanfaatkan_sejak" value="<?php echo ($this->input->post('sudah_dimanfaatkan_sejak') ? $this->input->post('sudah_dimanfaatkan_sejak') : $belanja['sudah_dimanfaatkan_sejak']); ?>" class="form-control date" id="sudah_dimanfaatkan_sejak" placeholder="" />
                               <?php echo form_error('sudah_dimanfaatkan_sejak'); ?>
                            </div><!-- /input-group -->
                            <br>
                            <div class="input-group"  style="width: 100%;">
                              <div class="input-group-addon" style="width: 150px; text-align: left;">
                                <input name="pilihan_sudah_dimanfaatkan" type="radio" value="belum" 
                                <?php echo ($belanja['pilihan_sudah_dimanfaatkan'] == "belum" ? "checked" : ""); ?>> 
                                Belum, karena:
                              </div>
                               <input type="text" name="belum_dimanfaatkan_karena" value="<?php echo ($this->input->post('belum_dimanfaatkan_karena') ? $this->input->post('belum_dimanfaatkan_karena') : $belanja['belum_dimanfaatkan_karena']); ?>" class="form-control" id="belum_dimanfaatkan_karena"/>
                               <?php echo form_error('belum_dimanfaatkan_karena'); ?>  
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-10 -->
                    </div>                    
                  </div>  <!-- /.tab-pane -->  

               </div> <!-- /.tab-content -->

            </div> <!-- /.nav-tab-custom -->

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
<script type="text/javascript">
function hitungPersenDariPagu(nilai,pengirim,pagu) {    
    var persenDariPagu = Number((nilai / pagu) * 100).toFixed(2);
    document.getElementById("persen_"+pengirim).value = persenDariPagu.toString();
};
</script>
<script type="text/javascript">
function isiPaguSisa(keterangan,bulan) {   
  var bulan_int = parseInt(bulan);     
  for (i = bulan_int+1; i <= 12; i++) {
    document.getElementById(i.toString()).value = keterangan;
  }    
};
</script>