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

// Login Process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    try {
        // Retrieve the hashed password from the database based on the provided username
        $stmt = $conn->prepare("SELECT Password FROM admin WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the username exists in the database
        if ($row) {
            // Verify the password
            if (password_verify($password, $row['Password'])) {
                // Password matches, login successful
                session_start();
                $_SESSION["admin"] = $username; // Set session variable for logged in admin
                echo "<script>alert('Login berhasil!'); window.location.href='index.php';</script>";
                exit(); // Stop further execution
            } else {
                // Password does not match
                echo "<script>alert('Password salah.');</script>";
            }
        } else {
            // Username not found
            echo "<script>alert('Username tidak ditemukan.');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>