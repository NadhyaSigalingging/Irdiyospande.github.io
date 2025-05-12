<?php
  require('../../../config/database.php');
  include('../../../config/app.php');
  include('../../../component/com-transaksi.php');

  // Function to clean the data for Excel
  function cleanData(&$str)
  {
    // Replace tabs with \t and newlines with \n
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);

    // Escape double quotes by replacing them with two double quotes
    if (strstr($str, '"')) {
      $str = '"' . str_replace('"', '""', $str) . '"';
    }
  }

  // Set filename for download
  $filename = "Transaksi_Checkout.xls";

  // Set headers to prompt Excel to recognize the file type
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  // Fetch transaction data from the database
  $data = $database->select('transaksi_kamar', '*');
  $flag = false;

  // Loop through the data and export it to Excel
  foreach ($data as $row) {
    if (!$flag) {
      // Display column names in the first row (only once)
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }

    // Clean each row's data before outputting
    array_walk($row, __NAMESPACE__ . '\cleanData');

    // Output the row data
    echo implode("\t", array_values($row)) . "\r\n";
  }

  exit;
?>
