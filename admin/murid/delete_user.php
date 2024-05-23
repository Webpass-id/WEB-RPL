<?php
include "../../conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn = $_POST['nisn'];

    // Validate input
    if (!empty($nisn)) {
        try {
            $stmt = $conn->prepare("DELETE FROM user WHERE nisn = :nisn");
            $stmt->bindParam(':nisn', $nisn, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: index.php"); // Redirect to the main page after deleting
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid input.";
    }
} else {
    echo "Invalid request.";
}
?>