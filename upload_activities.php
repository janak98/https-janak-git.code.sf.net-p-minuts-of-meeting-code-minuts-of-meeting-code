<?php
include 'db_config.php';

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);
$rows = $spreadsheet->getActiveSheet()->toArray();


   for ($i = 1; $i < count($rows); $i++) {
            $code = trim($rows[$i][0]);
            $name= trim($rows[$i][1]);
            $level = trim($rows[$i][2]);

  $check = $conn->prepare("SELECT level_code FROM levels WHERE level_code=?");
  $check->bind_param("s", $level);
  $check->execute();
  if ($check->get_result()->num_rows > 0) {
    $stmt = $conn->prepare("INSERT INTO activities (activity_code, activity_name, level_code) VALUES (?, ?, ?)ON DUPLICATE KEY UPDATE activity_code=VALUES(activity_code)");
    $stmt->bind_param("sss", $code, $name, $level);
    $stmt->execute();
  }
}
echo "Activities uploaded.";
?>