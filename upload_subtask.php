<?php
include 'db_config.php';

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);
$sheetData = $spreadsheet->getActiveSheet()->toArray();

foreach ($sheetData as $row) {
  $code = trim($row[0]);
  $name = trim($row[1]);
  $task = trim($row[2]);

  $check = $conn->prepare("SELECT task_code FROM tasks WHERE task_code=?");
  $check->bind_param("s", $task);
  $check->execute();
  if ($check->get_result()->num_rows > 0) {
    $stmt = $conn->prepare("INSERT INTO subtasks (subtask_code, subtask_name, task_code, completion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $code, $name, $task);
    $stmt->execute();
  }
}
echo "Subtasks uploaded.";
?>