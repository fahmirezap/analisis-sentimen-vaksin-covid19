<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Analisis Sentimen Vaksin Covid-19</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url_for('static', filename='dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url_for('static', filename='plugins/summernote/summernote-bs4.min.css') }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- DataTables -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="static/dist/img/vaccine_icon.png" alt="Vaccine Icons" height="250" width="250">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     <!-- <img src="static/dist/img/vaccine_icon.png" alt="Vaccine Icons" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light" style="margin-left: 5px; font-size: 15px;">Analisis Sentimen Vaksin Covid-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item-open">
            <a href="/menu_dataset" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Dataset
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/menu_preprocessing" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Hasil Preprocessing Data
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Analisis Sentimen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Grafik
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="height:100px;">
              <div class="inner">
                <h3 style="color: white;">XX</h3>
                <p style="font-size:30px; color: white;">Positif</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-smile"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="height:100px;">
              <div class="inner">
                <h3 style="color: white;">XX</h3>
                <p style="font-size:30px; color: white;">Netral</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-meh"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="height:100px;">
              <div class="inner">
                <h3 style="color: white;">XX</h3>
                <p style="font-size:30px; color: white;">Negatif</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-frown"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="container">
        <div class="row">
            <div class="col-md-12" style="height:5px;">
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Data Komentar Masyarakat Vaksin Covid-19</h1>
                </div>
                <div class="panel-body table-responsive">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="data-table">
                     <thead>
                      <tr>
                       <th>Username</th>
                       <th>Comment</th>
                       <th>Label</th>
                      </tr>
                     </thead>
                    </table>
                  </div>
                </div>
            <!--    <section id="data-section">
                  <div id="data"/>
                </section> -->
              </div>
            </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<!-- jQuery -->
<script src="{{ url_for('static', filename='plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url_for('static', filename='plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url_for('static', filename='plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url_for('static', filename='plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url_for('static', filename='plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url_for('static', filename='plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url_for('static', filename='plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url_for('static', filename='plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url_for('static', filename='plugins/moment/moment.min.js') }}"></script>
<script src="{{ url_for('static', filename='plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url_for('static', filename='plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url_for('static', filename='plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url_for('static', filename='plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url_for('static', filename='dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url_for('static', filename='dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url_for('static', filename='dist/js/pages/dashboard.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.19/js/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.11.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $.ajax({
    url_for:"dataset",
    method:"POST",
    data:new FormData(),
    dataType:'json',
    contentType:false,
    cache:false,
    processData:false,
    success:function(jsonData)
        {
            $('#csv_file').val('');
            $('#data-table').DataTable({
            data : jsonData,
            columns : [
              { data : "Username" },
              { data : "Comment" },
              { data : "Label" }
                ]
            });
        }
    });
});
</script>
</body>
</html>
