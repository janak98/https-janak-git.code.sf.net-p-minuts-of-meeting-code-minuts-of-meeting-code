<?php
include 'db_config.php';

$code = $_POST['level_code'];
$name = $_POST['level_name'];
$building = $_POST['building_code'];

$stmt = $conn->prepare("INSERT INTO levels (level_code, level_name, building_code) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $code, $name, $building);
$stmt->execute();

echo "Level saved.";
?>
