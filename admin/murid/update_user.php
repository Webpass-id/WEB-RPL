<?php
include "../../conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_nisn = $_POST['current_nisn'];
    $new_nisn = $_POST['new_nisn'];
    $username = $_POST['username'];

    // Validate input
    if (!empty($current_nisn) && !empty($new_nisn) && !empty($username)) {
        try {
            $stmt = $conn->prepare("UPDATE user SET nisn = :new_nisn, Username = :username WHERE nisn = :current_nisn");
            $stmt->bindParam(':new_nisn', $new_nisn, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':current_nisn', $current_nisn, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: index.php"); // Redirect to the main page after updating
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