<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sewa Mobil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url('assets/dist/img/icon.png') ?>">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/ionicons.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?php echo base_url('assets') ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url('assets') ?>/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url('assets') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?php echo base_url('assets') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets') ?>/dist/js/demo.js"></script>
  <!-- jquery-validation -->
  <script src="<?php echo base_url('assets') ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script src="<?php echo base_url('assets') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/image-upload-resizer/jquery-image-upload-resizer.js"></script>
  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <style type="text/css">
    .tps {
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
      padding: 0.25rem;
      text-align: center;
    }
    .brand-link{
      padding: 0.7rem 1.5rem;
      height: 57px;
    }
    #preview{
     width:500px;
     height: 500px;
     margin:0px auto;
   }

   @media only screen and (max-width: 600px) {
    .text-nominal-dash{
      font-size: 1.2rem;
    }
  }

</style>
<script type="text/javascript">
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
  }, 3500);
</script>     

</body>
</html>


</head>
<body class="hold-transition sidebar-mini">
  <!-- <body class="sidebar-mini sidebar-collapse"> -->
    <div class="wrapper">
      <!-- Navbar -->

      <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('index.php/logout') ?>">
              <i class="fa fa fa-sign-out"></i> Keluar
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar elevation-4 sidebar-dark-primary">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Sewa Mobil</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-2 mb-2 text-center">

            <div class="info">
              <a href="#" class="d-block"><?=$this->pengguna->nama?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
            <a href="<?=base_url('index.php/manajemen_mobil/index?merek=&model=&status=SEMUA')?>" class="<?php if($this->uri->segment(1)=="manajemen_mobil"){ echo "active"; }?> nav-link">
              <i class="nav-icon fa fa-car"></i>
              <p>
                Manajemen Mobil
              </p>
            </a>
          </li>
          <li class="nav-item menu-is-opening <?php if($this->uri->segment(1)=="peminjaman_mobil"){ echo "menu-open"; }?>">
           <a href="#" class="<?php if($this->uri->segment(1)=="peminjaman_mobil"){ echo "active"; }?> nav-link">
            <i class="nav-icon fa fa-retweet"></i>
            <p>
              Peminjaman Mobil
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('index.php/peminjaman_mobil/index')?>" class="<?php if($this->uri->segment(2)=="index"){ echo "active"; }?> nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Pilih Mobil</p>
              </a>
              <li class="nav-item">
                <a href="<?=base_url('index.php/peminjaman_mobil/data_sewa')?>" class="<?php if($this->uri->segment(2)=="data_sewa"){ echo "active"; }?> nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Data Sewa Mobil</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
            <a href="<?=base_url('index.php/pengembalian_mobil/index')?>" class="<?php if($this->uri->segment(1)=="pengembalian_mobil"){ echo "active"; }?> nav-link">
              <i class="nav-icon fa fa-mail-forward"></i>
              <p>
                Pengembalian Mobil
              </p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


