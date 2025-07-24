<?php
include 'db_config.php';

$code = $_POST['subtask_code'];
$name = $_POST['subtask_name'];
$task = $_POST['task_code'];

$stmt = $conn->prepare("INSERT INTO subtasks (subtask_code, subtask_name, task_code, completion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $code, $name, $task);
$stmt->execute();

echo "Subtask saved.";
?>