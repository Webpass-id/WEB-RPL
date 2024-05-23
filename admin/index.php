<?php
// Include the database connection file
include "../conn.php";

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the user is logged in as admin
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
include "../boots.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   
</head>

<body>
    <?php include "components/nav.php"; ?>
    <h1>hallo <?php echo ($_SESSION['admin']) ?></h1>
    <H1>Jadwal piket</H1>
</body>

</html