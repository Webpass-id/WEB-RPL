<?php
// Start session
session_start();
include "../conn.php";
include "../boots.php";
include "info.php";
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
    <?php 
include "components/nav.php";

?>
    <h1>Welcome <?php echo $_SESSION['user'];  ?></h1>
    <div class="container mt-4">
        <!-- jadwal pelajaran -->
        <h1> jadwal matapelajaran</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>pelajaran</th>
                    <th>nama guru</th>
                    <th>jam</th>
                    <th>kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hasil)); ?>
                <?php foreach ($hasil as $row); ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($row['nama_pelajaran']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($row['nama_guru']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($row['jam']);   ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($row['tingkat']);   ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>


</body>

</html>