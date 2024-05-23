<?php 
require "../../boots.php";
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Subject</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php include "../components/nav.php"; ?>
    <div class="container">
        <h2>Create New Subject</h2>
        <form action="update.php" method="post">
            <label for="subject_name">Subject Name:</label>
            <input type="text" id="subject_name" name="subject_name" required>

            <label for="teacher_name">Teacher Name:</label>
            <input type="text" id="teacher_name" name="teacher_name" required>

            <label for="class_level">Class Level:</label>
            <select id="class_level" name="class_level" required>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="High School">High School</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <input type="submit" value="Create Subject">
        </form>
    </div>
</body>

</html>