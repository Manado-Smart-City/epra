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
                            <i class="fa fa-pie-chart"></i> <span>Laporan Kota</span> <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="<?php echo ($submenu=='2019' ? 'active treeview-menu' : 'treeview-menu'); ?>">
                            <li class="<?php echo ($submenu=='2019' ? 'active treeview' : 'treeview'); ?>">
                                <a href="#">
                                    <i class="fa fa-bar-chart"></i> <span>Tahun 2023</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class='<?php echo ($submenu=="2023" ? "active treeview-menu" : "treeview-menu"); ?>'>
                                    <li <?php echo (isset($submenu2) && $submenu2=="Total Anggaran Kota" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_kota/index/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Total Anggaran Kota</span>
                                        </a>
                                    </li>
                                                                        
                                </ul>
                            </li>                            
                          </ul>
                        </li>


                        <li class="<?php echo ($menu=='Laporan PD' ? 'active treeview' : 'treeview'); ?>">
                          <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Laporan Perangkat Daerah</span> <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="<?php echo ($submenu=='2019' ? 'active treeview-menu' : 'treeview-menu'); ?>">
                            <li class="<?php echo ($submenu=='2019' ? 'active treeview' : 'treeview'); ?>">
                                <a href="#">
                                    <i class="fa fa-bar-chart"></i> <span>Tahun 2023</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class='<?php echo ($submenu=="2019" ? "active treeview-menu" : "treeview-menu"); ?>'>
                                    <li <?php echo (isset($submenu2) && $submenu2=="Daftar PD" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/daftar_pd/2023');?>">
                                            <i class="fa fa-area-chart"></i> <span>Daftar PD</span>
                                        </a>
                                    </li>     
                                <?php if (isset($kode_pd)) { ?>                               
                                    <li <?php echo (isset($submenu2) && $submenu2=="Total Anggaran PD" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Total Anggaran PD</span>
                                        </a>
                                    </li>
<!--                                    <li <?php echo (isset($submenu2) && $submenu2=="Belanja Tidak Langsung" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index_btl/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Belanja Tidak Langsung</span>
                                        </a>
                                    </li> -->
                                    <li <?php echo (isset($submenu2) && $submenu2=="Belanja Langsung" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index_bl/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Belanja Perangkat Daerah</span>
                                        </a>
                                    </li>     
                                    <li <?php echo (isset($submenu2) && $submenu2=="Kinerja PPTK" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index_pptk/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Kinerja PPTK</span>
                                        </a>
                                    </li>                                  
                                    <li <?php echo (isset($submenu2) && $submenu2=="Jenis Pengadaan" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index_jenis_pengadaan/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Jenis Pengadaan</span>
                                        </a>
                                    </li>     
                                    <li <?php echo (isset($submenu2) && $submenu2=="Metode Pemilihan Penyedia" ? "class='active'" : ""); ?>>
                                        <a href="<?php echo site_url('laporan_pd/index_metode_pemilihan_penyedia/'.$tahun_anggaran.'/'.$kode_pd);?>">
                                            <i class="fa fa-area-chart"></i> <span>Metode Pemilihan Penyedia</span>
                                        </a>
                                    </li>
                                <?php } ?>            
                                </ul>
                            </li>                            
                          </ul>
                        </li>


                    </ul>

                    <ul class="sidebar-menu">
                        <br>
                        <li class="header">LOGIN OPERATOR:</li>
                        <div style="padding-left: 10px; padding-right: 10px;">
                            <form action="<?php echo base_url('login/user_login_process'); ?>" method="post">
                              <div class="form-group has-feedback">
                                <input name="user_id" type="text" class="form-control" placeholder="UserID">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                <input name="user_password" type="password" class="form-control" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="row">
                                <div class="col-xs-7">

                                </div><!-- /.col -->
                                <div class="col-xs-5">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat">Log in</button>
                                </div><!-- /.col -->
                              </div>
                            </form>      
                        </div>                                  
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
                            echo "Tahun Anggaran: ".$tahun_anggaran;
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
                <!-- <strong>Copyright:</strong> Pemerintah Kota Manado, 2017 -->
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
            $('.tabel-data-pd').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "dom": 'frltip'
            });                              
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
