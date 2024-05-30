<?php
// Database connection
$host = "localhost";
$db   = "sistem_absensi";
$user = "root";
$pass = "";
// $charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the 'dosen' parameter from the query string
$dosen = $_GET['dosen'];

// Prepare and execute the SQL query
$stmt = $pdo->prepare("SELECT id, nama FROM matakuliah WHERE nip = ?");
$stmt->execute([$dosen]);

// Fetch all the results
$matakuliah = $stmt->fetchAll();

// Return the results as a JSON string
echo json_encode($matakuliah);
?>