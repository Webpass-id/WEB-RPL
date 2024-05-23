<?php
<<<<<<< HEAD
require 'vendor/autoload.php';

// Memuat variabel lingkungan dari file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVERNAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Mengatur mode kesalahan PDO ke mode exception
=======
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rpl";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
>>>>>>> 4bc0a2fbf3b3fc9b607389d0c57cf1e1bf7658a2
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>