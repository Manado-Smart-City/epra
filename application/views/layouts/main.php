<?php
    if (isset($this->session->userdata['logged_in'])) {
      $user_id = ($this->session->userdata['logged_in']['user_id']);
      $user_name = ($this->session->userdata['logged_in']['user_name']);
      $user_email = ($this->session->userdata['logged_in']['user_email']);
      $user_role = ($this->session->userdata['logged_in']['user_role']);
      $user_photo = ($this->session->userdata['logged_in']['user_photo']);
      $user_pd = ($this->session->userdata['logged_in']['user_pd']);
      $user_nama_pd = ($this->session->userdata['logged_in']['user_nama_pd']);
    } else {
      header("Location:" .base_url("login"));
    }

    if (!isset($judul)){
        $judul = "";
    }
    if (!isset($subjudul)){
        $subjudul = "";
    }
    if (!isset($menu)){
        $menu = "";
    }
    if (!isset($submenu)){
        $submenu = "";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EPRAOnline :: Evaluasi dan Pengawasan Realisasi Anggaran Kota Manado</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Plugin-->
        <link href="<?php echo site_url('resources/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" />
        <link href="<?php echo site_url('resources/plugins/datatables/jquery.dataTables.css');?>" rel="stylesheet" />
        <link href="<?php echo site_url('resources/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />
      
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">        
    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <article>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><strong>EPRA</strong></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><strong>EPRA</strong><i>2023</i></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo site_url('resources/img/user_photos/'.$user_photo);?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $user_name;?></span>
                            </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/img/user_photos/'.$user_photo);?>" class="img-circle" alt="User Image">

                                    <p>
                                        <strong><?php echo $user_name;?></strong>
                                        <p><small><?php echo $user_role.' '.$user_nama_pd;?></small></p>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url('profil');?>" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('login/logout');?>" class="btn btn-default btn-flat">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/img/logo.png');?>" alt="Logo Manado">
                        </div>
                        <div class="pull-left info">
                            <p>Pemerintah <br>Kota Manado</p>
                            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU UTAMA:</li>
                        <li class="<?php echo ($submenu=='Beranda' ? 'active' : ''); ?>">
                            <a href="<?php echo site_url('beranda');?>">
                                <i class="fa fa-home"></i> <span>Beranda</span>
                            </a>
                        </li>

                        <li class="<?php echo ($menu=='Laporan' ? 'active treeview' : 'treeview'); ?>">
                          <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="<?php echo ($submenu=='2020' ? 'active treeview-menu' : 'treeview-menu'); ?>">
                            <li class="<?php echo ($submenu=='2020' ? 'active treeview' : 'treeview'); ?>">
                                <a href="#">
                                    <i class="fa fa-bar-chart"></i> <span>Tahun 2023</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class='<?php echo ($submenu=="2020" ? "active treeview-menu" : "treeview-menu"); ?>'>
                                    <li <?php echo (isset($submenu2) && $submenu2=="Total Anggaran PD" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Total Anggaran PD</span>
                                        </a>
                                    </li>
<!--                                     <li <?php echo (isset($submenu2) && $submenu2=="Belanja Tidak Langsung" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index_btl/2020');?>">
                                            <i class="fa fa-area-chart"></i> <span>Belanja Tidak Langsung</span>
                                        </a>
                                    </li> -->
                                    <li <?php echo (isset($submenu2) && $submenu2=="Belanja Daerah" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index_bl/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Belanja Perangkat Daerah</span>
                                        </a>
                                    </li>     
                                    <li <?php echo (isset($submenu2) && $submenu2=="Kinerja PPTK" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index_pptk/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Kinerja PPTK</span>
                                        </a>
                                    </li>                                  
                                    <li <?php echo (isset($submenu2) && $submenu2=="Jenis Pengadaan" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index_jenis_pengadaan/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Jenis Pengadaan</span>
                                        </a>
                                    </li>     
                                    <li <?php echo (isset($submenu2) && $submenu2=="Metode Pemilihan Penyedia" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan/index_metode_pemilihan_penyedia/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Metode Pemilihan Penyedia</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                          </ul>
                        </li>
                        <?php if ($user_role == "Operator") { ?>
                        <li class="<?php echo ($menu=='Perangkat Daerah' ? 'active treeview' : 'treeview'); ?>">
                          <a href="#">                            
                            <i class="fa fa-institution"></i> <span>Perangkat Daerah</span> <i class="fa fa-angle-left pull-right"></i>
                          </a>

                          <ul class="treeview-menu">

                            <li <?php echo ($submenu=="Daftar Pegawai" ||
                                            $submenu=="Tambah Pegawai" ||
                                            $submenu=="Edit Pegawai"   ||
                                            $submenu=="Tampil Pegawai"  
                                            ? "class='active'" : ""); ?>>
                                <a href="<?php echo site_url('pejabat/index');?>">
                                    <i class="fa fa-black-tie"></i> <span>Pegawai</span>
                                </a>
                            </li>  

                            <li class="<?php echo ($submenu=='Belanja Langsung' ? 'active treeview' : 'treeview'); ?>">
                              <a href="#">
                                <i class="fa fa-calculator"></i> <span>Belanja</span> <i class="fa fa-angle-left pull-right"></i>
                              </a>

                              <ul class="treeview-menu">
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Target BL" ||
                                                $submenu2=="Edit Target BL")
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('target/index');?>">
                                        <i class="fa fa-bullseye"></i> <span>Target</span>
                                    </a>
                                </li>
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Program" ||
                                                $submenu2=="Tambah Program" ||
                                                $submenu2=="Edit Program" ||
                                                $submenu2=="Tampil Program")
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('program/index');?>">
                                        <i class="fa fa-cube"></i> <span>Program</span>
                                    </a>
                                </li>       
                                <?php if (isset($program['kode_prog']) || (isset($kegiatan['kode_giat']) && $kegiatan['kode_giat'] <> $this->session->userdata['logged_in']['user_kode_giat_btl'])) { ?>
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Kegiatan" ||
                                                $submenu2=="Tambah Kegiatan" ||
                                                $submenu2=="Edit Kegiatan" ||
                                                $submenu2=="Tampil Kegiatan")
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('program/index');?>">
                                        <i class="fa fa-cubes"></i> <span>Kegiatan</span>
                                    </a>
                                </li>                      
                                <?php } ?>        
                                <?php if (isset($kegiatan['kode_giat']) && $kegiatan['kode_giat'] <> $this->session->userdata['logged_in']['user_kode_giat_btl']) { ?>         
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Belanja" ||
                                                $submenu2=="Tambah Kegiatan Swakelola" ||
                                                $submenu2=="Tambah Paket Pengadaan" ||
                                                $submenu2=="Edit Swakelola" ||
                                                $submenu2=="Edit Pengadaan" ||
                                                $submenu2=="Tampil Swakelola" || 
                                                $submenu2=="Tampil Pengadaan"
                                            )
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('program/index');?>">
                                        <i class="fa fa-money"></i> <span>Belanja</span>
                                    </a>
                                </li> 
                                <?php } ?>                                                   
                              </ul>
                            </li>

<!--                             <li class="<?php echo ($submenu=='Belanja Tidak Langsung' ? 'active treeview' : 'treeview'); ?>">
                              <a href="#">
                                <i class="fa fa-calculator"></i> <span>Belanja Tidak Langsung</span> <i class="fa fa-angle-left pull-right"></i>
                              </a>

                              <ul class="treeview-menu">
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Target BTL" ||
                                                $submenu2=="Edit Target BTL")
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('targetbtl/index');?>">
                                        <i class="fa fa-bullseye"></i> <span>Target</span>
                                    </a>
                                </li>    

                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Belanja" ||
                                                $submenu2=="Edit Belanja" ||
                                                $submenu2=="Tampil Belanja" )
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('belanjabtl/index');?>">
                                        <i class="fa fa-money"></i> <span>Belanja</span>
                                    </a>
                                </li>                                
                                <li <?php 
                                        echo (isset($submenu2) && (
                                                $submenu2=="Daftar Realisasi BTL" ||
                                                $submenu2=="Edit Realisasi BTL")
                                             ? "class='active'" : ""); ?>>
                                    <a href="<?php echo site_url('realisasibtl/index');?>">
                                        <i class="fa fa-calculator"></i> <span>Realisasi</span>
                                    </a>
                                </li>                               
                              </ul>
                            </li> -->


                          </ul>
                        </li>
                        <?php } ?>

                        <?php if ($user_role == "Admin") { ?>
                       <li class="<?php echo ($menu=='Pengaturan' ? 'active treeview' : 'treeview'); ?>">
                          <a href="#">
                            <i class="fa fa-gear"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i>
                          </a>

                          <ul class="treeview-menu">
                            <li <?php 
                                    echo (isset($submenu2) && (
                                            $submenu2=="Daftar PD" ||
                                            $submenu2=="Tambah PD" ||
                                            $submenu2=="Edit PD" ||
                                            $submenu2=="Tampil PD" )
                                         ? "class='active'" : ""); ?>>
                                <a href="<?php echo site_url('pd/index');?>">
                                    <i class="fa fa-institution"></i> <span>Data Perangkat Daerah</span>
                                </a>
                            </li>
                            <li <?php 
                                    echo (isset($submenu2) && (
                                            $submenu2=="Daftar Akun" ||
                                            $submenu2=="Tambah Akun" ||
                                            $submenu2=="Edit Akun" ||
                                            $submenu2=="Tampil Akun" )
                                         ? "class='active'" : ""); ?>>
                                <a href="<?php echo site_url('user/index');?>">
                                    <i class="fa fa-users"></i> <span>Akun Pengguna</span>
                                </a>
                            </li>
                            <li <?php 
                                    echo (isset($submenu2) && (
                                            $submenu2=="Daftar Akun" ||
                                            $submenu2=="Tambah Akun" ||
                                            $submenu2=="Edit Akun" ||
                                            $submenu2=="Tampil Akun" )
                                         ? "class='active'" : ""); ?>>
                                <a href="<?php echo site_url('config/index');?>">
                                    <i class="fa fa-sliders"></i> <span>Konfigurasi Aplikasi</span>
                                </a>
                                <a href="<?php echo site_url('pengumuman/index');?>">
                                    <i class="fa fa-bullhorn"></i> <span>Pengumuman</span>
                                </a>                                
                            </li>                            
                          </ul>                          
                        </li>
                        <?php } ?>
                    </ul>  

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $judul; ?>
                        <?php if ($judul == "Beranda") { ?>
                        <small>
                            <?php 
                            //echo $subjudul; 
                            echo "Selamat Datang di Aplikasi EPRA Online Kota Manado";
                            ?>
                        </small>                        
                        <?php } else { ?>
                        <small>
                            <?php 
                            //echo $subjudul; 
                            echo "Tahun Anggaran: ".$this->session->userdata['logged_in']['tahun_anggaran'];
                            ?>
                        </small>
                        <?php } ?>
                    </h1>
                    <ol class="breadcrumb">                        
                        <li><?php echo $menu; ?></li>
                        <?php
                            if ($submenu <> "Beranda"){
                                if (!isset($submenu2)){
                                    echo '<li class="active">';
                                    echo $submenu;
                                    echo '</li>';
                                } elseif (!isset($submenu3)) {
                                    echo '<li>';
                                    echo $submenu;
                                    echo '</li>';
                                    echo '<li class="active">';
                                    echo $submenu2;
                                    echo '</li>';
                                } else {
                                    echo '<li>';
                                    echo $submenu;
                                    echo '</li>';
                                    echo '<li>';
                                    echo $submenu2;
                                    echo '</li>';                                    
                                    echo '<li class="active">';
                                    echo $submenu3;
                                    echo '</li>';
                                }
                            }
                        ?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright:</strong> Pemerintah Kota Manado, 2017
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->

                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>        
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- For data table -->
        <script src="<?php echo site_url('resources/plugins/datatables/jquery.dataTables.min.js');?>"></script>               
        <script src="<?php echo site_url('resources/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>        
        <!-- select2 -->
        <script src="<?php echo site_url('resources/plugins/select2/select2.min.js'); ?>"></script>  
        <!-- InputMask -->
        <script src="<?php echo site_url('resources/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
        <script src="<?php echo site_url('resources/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
        <script src="<?php echo site_url('resources/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo site_url('resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>                

        <script>
          $(function () {
            $('.tabel-data-full').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "dom": 'frltip'
            });
            $('.tabel-data-pptk').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": false,
              "ordering": true,
              //"order": [[ 3, "asc" ]],
              "info": true,
              "autoWidth": false,
              "dom": 'frltip',
            });            
            $('.tabel-data').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": false,
              "autoWidth": false,
              "dom": 'frltip'
            });      
            $('.tabel-data2').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "dom": 'frltip'
            });                   
            $('.tabel-data-limited').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": false,
              "ordering": false,
              "info": true,
              "autoWidth": false,
              "dom": 'frltip'
            });                       
          });
        </script>       

        <script type="text/javascript">
            $('.textarea').wysihtml5({
                  toolbar: {
                    "fa": true
                  }
            });
        </script> 

        <script type="text/javascript">
            $(document).ready(function(){
                //Datemask dd/mm/yyyy
                $(".date").inputmask("dd/mm/yyyy", 
                    {
                        "placeholder": "dd/mm/yyyy",
                        clearMaskOnLostFocus: false,
                        showMaskOnHover: false,
                        showMaskOnFocus: false                        
                    });
                //Bilangan bulat
                $(".integer").inputmask("99999999999999999999", 
                    {
                        "placeholder": "",
                        clearMaskOnLostFocus: true,
                        showMaskOnHover: false,
                        showMaskOnFocus: false  
                    });
                //Bilangan desimal
                //$(".floating2").inputmask("alias": "decimal",
                //$(".floating2").inputmask('decimal', { rightAlign: true });
                //$(".floating2").inputmask('regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
                $(".floating").inputmask("[9][9][9][.999]", 
                    {
                        "placeholder": "",
                        clearMaskOnLostFocus: true,
                        showMaskOnHover: false,
                        showMaskOnFocus: false  
                    });                
                //Money Euro
                $("[data-mask]").inputmask();
            }); 
        </script>

        <script type="text/javascript">
                $(document).ready(function() {
                    $(".js-example-basic-single").select2();
                });            
        </script>

        <script type="text/javascript">
        /*
        * This is the plugin
        */
        (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

        /*
        * Here is how you use it
        */
        $(function(){    
            $('.view-pdf').on('click',function(){
                var pdf_link = $(this).attr('href');
                var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
                $.createModal({
                title:'Preview',
                message: iframe,
                closeButton:true,
                scrollable:false
                });
                return false;        
            });    
        })        
        </script>



        <?php
        if (isset($included_script)){
            foreach ($included_script as $script) {
                require_once(APPPATH."views/layouts/includes/".$script);
            }
        }
        ?>

        </article>
    </body>
</html>
