<?php

include "../conn.php";

try {
    $stmt = $conn->prepare("SELECT * FROM matapelajaran ");
    $stmt->execute();

    //fetch hasil 
    $hasil = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "eror: " . $e->getMessage();
}


?>