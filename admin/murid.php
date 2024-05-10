<?php
// Include the database connection file
include "../conn.php";

try {
    // Select data from the "murid" table
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $murids = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($murids) > 0) {
        // Display the data in a table
        echo "<h2>Data Murid</h2>";
        echo "<table border='1'>";
        echo "<tr><th>NISN</th><th>Username</th></tr>";
        foreach ($murids as $murid) {
            echo "<tr><td>".$murid['nisn']."</td><td>".$murid['Username']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data murid.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>