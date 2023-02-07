<?php
session_start();
require '../../koneksi/koneksi.php';
if (!$_SESSION['admin']){
    echo "<script>
    alert('Anda Belum Login!');
    document.location.href='../index.php'
    </script>";
}
if (isset($_POST['submit'])){
  $nik = $_POST['NIK'];  
  $nama=$_POST['Nama'];
  $TTL = $_POST['TTL'];
  $Alamat= $_POST['Alamat'];
  $agama=$_POST['Agama'];
  $no=$_POST['No_HP'];
  $tanggal =$_POST['tanggal'];
  $img_tmp = $_FILES['Foto_KTP']['tmp_name'];
  $img_name = $_FILES['Foto_KTP']['name'];    
  $id =$_POST['id_level'];
  $admin = $_POST['id_admin'];

  move_uploaded_file($img_tmp, '../../pictures/' .$img_name);


  $sql = "INSERT INTO anggota VALUES('$nik','$nama','$TTL','$Alamat','$agama','$no','$img_name','$id','$admin')";
  $sql_insert_simpanan = "INSERT INTO simpanan VALUES('', '$nik', '$tanggal', 100000);";

  $query = mysqli_query($koneksi, $sql);
  $query_insert_simpanan = mysqli_query($koneksi, $sql_insert_simpanan);

    if($query){
        echo "<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href='../index.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koperasi Simpanan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    <img src="../../pictures/admin_mini.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Koperasi Simpanan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../../pictures/admin_mini.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin </a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
            
            <li class="nav-item">
            <a href="../simpanan.php" class="nav-link">
              <i class="nav-icon fas fa-piggy-bank"></i>
              <p>
                Data Simpanan                
              </p>
            </a>
          </li>            
          <li class="nav-item">
            <a href="../anggota.php" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Anggota                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../saldo.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Cek Saldo                
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="../penarikan_saldo.php" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Penarikan Saldo               
              </p>
            </a>
          </li>
          <a href="../logout.php" onclick="return confirm('Yakin?')" class="btn btn-danger">Logout</a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambahkan Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12">
          <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">                                                
                <div class="form-group">
                  <label>NIK</label>
                  <input type="number" name="NIK" class="form-control" required="">
                </div>    
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="Nama" class="form-control" required="">
                </div>    
                <div class="form-group">
                  <label>TTL</label>
                  <input type="date" name="TTL" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="Alamat" class="form-control" required="">
                </div>         
                <div class="form-group">
                  <label>Agama</label>
                  <input type="text" name="Agama" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>No HP/WA</label>
                  <input type="number" name="No_HP" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Tanggal Pendaftaran</label>
                  <input type="date" name="tanggal" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Foto KTP</label>
                  <input type="file" required="" name="Foto_KTP" class="form-control" required="">
                </div>
                <input type="hidden" name="id_level" value="member"> 
                <select name="id_admin" class="form-control" required="">
                  <option value="1">1. Rangga Muhammad Firdaus</option>
                  <option value="2">2. Niko Fauzan Sabriansyah</option>
                  <option value="3">3. Fransiska Damayanti</option>
                </select>          
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>              
              </form>                                            
              </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>          
          

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; Kelompok 10.</strong>
    All rights reserved.    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>


</body>
</html>
