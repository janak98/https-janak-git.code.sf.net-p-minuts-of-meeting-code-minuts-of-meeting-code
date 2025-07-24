<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection
$host = 'localhost';
$dbname = 'login';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    try {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip header row
        for ($i = 1; $i < count($rows); $i++) {
            $username = trim($rows[$i][0]);
            $password = trim($rows[$i][1]);
            $name = trim($rows[$i][2]);

            if ($username && $password) {
                // Insert into database
                $stmt = $pdo->prepare("INSERT INTO credential (username, password, name) VALUES (?, ?, ?)");
                $stmt->execute([$username, $password, $name]);
            }
        }

        echo "Data uploaded successfully!";
    } catch (Exception $e) {
        echo "Error reading Excel file: " . $e->getMessage();
    }
} else {
    echo "No file uploaded.";
}
?>