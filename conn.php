<?php
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rpl";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Mengatur mode kesalahan PDO ke mode exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>