<?php
include 'db_config.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);
$sheetData = $spreadsheet->getActiveSheet()->toArray();

foreach ($sheetData as $row) {
  $code = trim($row[0]);
  $name = trim($row[1]);
  $activity = trim($row[2]);
  $complition=trim($row[3]);

  $check = $conn->prepare("SELECT activity_code FROM activities WHERE activity_code=?");
  $check->bind_param("s", $activity);
  $check->execute();
  if ($check->get_result()->num_rows > 0) {
    $stmt = $conn->prepare("INSERT INTO tasks (task_code, task_name, activity_code, completion) VALUES (?, ?, ?, ?)ON DUPLICATE KEY UPDATE task_code=VALUES(task_code)");
    $stmt->bind_param("sssi", $code, $name, $activity, $complition);
    $stmt->execute();
  }
}
echo "Tasks uploaded.";
?>