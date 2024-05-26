<?php 
include "../../boots.php";
include "../../conn.php";

if(isset($_GET['id'])) {
    $id_pelajaran = $_GET['id'];
    try{
        $sql= "DELETE FROM matapelajaran WHERE id_pelajaran = :id_pelajaran";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_pelajaran', $id_pelajaran, PDO::PARAM_INT);
        
        
        $stmt->execute();
        
        header("location: index.php");
        exit;
    } catch (PDOException $e){
        echo "Error" . $e->getMessage();
    }
} else{
    echo "id tidak ada";
}

?>