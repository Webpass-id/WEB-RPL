<?php
// Start session
session_start();    

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen</title>
</head>

<body>
    <h1>Welcome <?php echo $_SESSION['user'];  ?></h1>
    <H1>jadwal mata pelajaran</H1>

</body>

</html>