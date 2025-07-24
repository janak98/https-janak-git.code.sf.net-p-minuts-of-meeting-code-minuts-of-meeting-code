<?php
include 'db_config.php';

$code = $_POST['building_code'];
$name = $_POST['building_name'];

$query = "INSERT INTO buildings (building_code, building_name) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $code, $name);
$stmt->execute();

echo "Building saved successfully.";
?>