<?php
include 'db_config.php';

$code = $_POST['task_code'];
$name = $_POST['task_name'];
$activity = $_POST['activity_code'];

$stmt = $conn->prepare("INSERT INTO tasks (task_code, task_name, activity_code) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $code, $name, $activity);
$stmt->execute();

echo "Task saved.";
?>
