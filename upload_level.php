<?php
include 'db_config.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);
$rows = $spreadsheet->getActiveSheet()->toArray();


  for ($i = 1; $i < count($rows); $i++) {
            $level_code = trim($rows[$i][0]);
            $level_name= trim($rows[$i][1]);
            $building = trim($rows[$i][2]);

  $check = $conn->prepare("SELECT building_code FROM buildings WHERE building_code=?");
  $check->bind_param("s", $building);
  $check->execute();
  if ($check->get_result()->num_rows > 0) {
    $stmt = $conn->prepare("INSERT INTO levels (level_code, level_name, building_code) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE level_code=VALUES(level_code)");
    $stmt->bind_param("sss", $level_code, $level_name, $building);
    $stmt->execute();
  }
}
echo "Levels uploaded.";
?>