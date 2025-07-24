<?php
include 'db_config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);
$rows = $spreadsheet->getActiveSheet()->toArray();


 for ($i = 1; $i < count($rows); $i++) {
            $building_code = trim($rows[$i][0]);
            $building_name= trim($rows[$i][1]);


  if ($building_code && $building_name) {
    $stmt = $conn->prepare("INSERT INTO buildings (building_code, building_name) VALUES (?, ?)ON DUPLICATE KEY UPDATE building_code=VALUES(building_code)");
    $stmt->bind_param("ss", $building_code, $building_name);
    $stmt->execute();
  }
}
echo "<script>
            window.onload=function(){
            showsuccessPopup()
            };
            </script>";
            include 'index.php'; 
?>