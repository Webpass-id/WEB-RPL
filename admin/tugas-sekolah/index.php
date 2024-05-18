<!DOCTYPE html>
<html lang="en">
<?php 

require "../../boots.php";
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php"); // Redirect to login page if not logged in
    exit();
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Create New Task</h2>
        <form action="update.php" method="post">
            <label for="tanggal">Tanggal:</label><br>
            <input type="date" id="tanggal" name="tanggal" required><br><br>

            <label for="hari">Hari:</label><br>
            <select id="hari" name="hari" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select><br><br>

            <label for="tugas">Nama Tugas:</label><br>
            <input type="text" id="tugas" name="tugas" required><br><br>

            <label for="guru">Guru:</label><br>
            <input type="text" id="guru" name="guru" required><br><br>

            <label for="tenggat">Tenggat:</label><br>
            <input type="date" id="tenggat" name="tenggat" required><br><br>

            <input type="submit" value="Create Task">
        </form>
    </div>
</body>

</html>