<?php
// Start session
session_start();

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
        // Retrieve the hashed password and other user data from the database based on the provided username
        $stmt = $conn->prepare("SELECT * FROM user WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the username exists in the database
        if ($row) {
            // Verify the password
            if (password_verify($password, $row['Password'])) {
                // Password matches, login successful
                $_SESSION["user"] = $username; // Set session variable for logged in user
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
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/login.css">

<style>

    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">User Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
        </form>
    </div>
</body>

</html>