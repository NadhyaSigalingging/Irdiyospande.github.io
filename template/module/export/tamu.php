<?php
  require('../../../config/database.php');
  include('../../../config/app.php');
  include('../../../component/com-transaksi.php');

  // Fungsi untuk membersihkan data
  function cleanData(&$str)
  {
    // Mengganti tab dengan \t dan newline dengan \n
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    
    // Jika ada tanda petik ganda (") dalam data, kita ganti dengan dua tanda petik ganda
    if (strstr($str, '"')) {
      $str = '"' . str_replace('"', '""', $str) . '"';
    }
  }

  // Nama file untuk unduhan
  $filename = "Tamu.xls";

  // Set header agar file dapat diunduh dan dikenali oleh Excel
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  // Mengambil data tamu dari database
  $data = $database->select('tamu', '*');
  $flag = false;

  // Loop untuk menampilkan data
  foreach ($data as $row) {
    // Menampilkan nama kolom di baris pertama (hanya sekali)
    if (!$flag) {
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }

    // Memproses data setiap baris menggunakan fungsi cleanData
    array_walk($row, __NAMESPACE__ . '\cleanData');
    
    // Menampilkan nilai kolom
    echo implode("\t", array_values($row)) . "\r\n";
  }

  exit;
?>
