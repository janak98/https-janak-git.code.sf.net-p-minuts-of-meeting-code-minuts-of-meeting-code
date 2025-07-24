<?php
include 'db_config.php';

$code = $_POST['activity_code'];
$name = $_POST['activity_name'];
$level = $_POST['level_code'];

$stmt = $conn->prepare("INSERT INTO activities (activity_code, activity_name, level_code) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $code, $name, $level);
$stmt->execute();

echo "Activity saved.";
?>
