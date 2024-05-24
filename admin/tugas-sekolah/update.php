<?php
require "../../conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $tanggal = isset($_POST['tanggal']) ? htmlspecialchars($_POST['tanggal'], ENT_QUOTES, 'UTF-8') : null;
    $hari = isset($_POST['hari']) ? htmlspecialchars($_POST['hari'], ENT_QUOTES, 'UTF-8') : null;
    $tugas = isset($_POST['tugas']) ? htmlspecialchars($_POST['tugas'], ENT_QUOTES, 'UTF-8') : null;
    $guru = isset($_POST['guru']) ? htmlspecialchars($_POST['guru'], ENT_QUOTES, 'UTF-8') : null;
    $tenggat = isset($_POST['tenggat']) ? htmlspecialchars($_POST['tenggat'], ENT_QUOTES, 'UTF-8') : null;

    if ($tanggal && $hari && $tugas && $guru && $tenggat) {
        // Prepare the SQL statement
        $sql = "INSERT INTO tugas_sekolah (tanggal, hari, tugas, guru, tenggat) VALUES (:tanggal, :hari, :tugas, :guru, :tenggat)";
        $stmt = $conn->prepare($sql);
        
        // Execute the query with parameter binding
        $stmt->execute(array(
            ':tanggal' => $tanggal,
            ':hari' => $hari,
            ':tugas' => $tugas,
            ':guru' => $guru,
            ':tenggat' => $tenggat
        ));

        if ($stmt->rowCount() > 0) {
            header('location: ../index.php');
        } else {
            echo "Gagal membuat tugas. Silakan periksa kembali data yang Anda masukkan.";
        }
    } else {
        echo "Data tidak valid. Silakan periksa kembali.";
    }
}
?>