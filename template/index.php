<?php
// Aktifkan error reporting untuk melihat masalah
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
  <?php include(__DIR__ . '/module/header.php'); ?>
  
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php include(__DIR__ . '/module/topbar.php'); ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <?php include(__DIR__ . '/module/sidebar.php'); ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php 
        // Cek apakah ada parameter 'module' di URL
        if (!empty($_GET['module'])) {
          // Ambil nama module dari parameter URL
          $module = $_GET['module'];

          // Hindari directory traversal attack
          $module = str_replace(['..', './', '//'], '', $module);

          // Buat path file modul
          $filepath = __DIR__ . '/module/' . $module . '.php';

          // Debugging: Menampilkan path yang akan dicoba untuk dimuat
          // echo "<div style='background:#f4f4f4;padding:10px;'>Trying to load: <code>$filepath</code></div>";

          // Cek apakah file modul ada
          if (file_exists($filepath)) {
            // Jika ada, masukkan file tersebut
            include($filepath);
          } else {
            // Jika tidak ada, tampilkan pesan error
            echo "<div style='padding:20px; color:red; font-weight:bold;'>❌ Module <code>$module</code> tidak ditemukan di path: <code>$filepath</code></div>";
          }

        } else {
          // Jika tidak ada parameter 'module', tampilkan halaman dashboard
          include(__DIR__ . '/module/dashboard.php');
        }
        ?>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include(__DIR__ . '/module/footer.php'); ?>

      <!-- Control Sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery -->
    <?php include(__DIR__ . '/module/script.php'); ?>
    
  </body>
</html>
