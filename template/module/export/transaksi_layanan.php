<?php
  require('../../../config/database.php');
  include('../../../config/app.php');
  include('../../../component/com-transaksi.php');

  // Function to clean data for Excel formatting
  function cleanData(&$str)
  {
    // Replace tab characters with \t
    $str = preg_replace("/\t/", "\\t", $str);
    
    // Replace newline characters with \n
    $str = preg_replace("/\r?\n/", "\\n", $str);
    
    // If the string contains double quotes, escape them
    if (strstr($str, '"')) {
      $str = '"' . str_replace('"', '""', $str) . '"';
    }
  }

  // Set the filename for download
  $filename = "Transaksi_Layanan.xls";

  // Set headers for downloading the file and specifying its content type
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  // Fetch all data from the transaksi_layanan table
  $data = $database->select('transaksi_layanan', '*');
  $flag = false;

  // Loop through the fetched data and output it in tab-separated format
  foreach ($data as $row) {
    if (!$flag) {
      // Display column names (header row) only once
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }

    // Clean data before output
    array_walk($row, __NAMESPACE__ . '\cleanData');
    
    // Output the cleaned row values
    echo implode("\t", array_values($row)) . "\r\n";
  }

  exit;
?>
