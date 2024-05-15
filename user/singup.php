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

// Process Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Login Process
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
    } elseif (isset($_POST["signup"])) {
        // Signup Process
        $username = sanitize_input($_POST["username"]);
        $password = password_hash(sanitize_input($_POST["password"]), PASSWORD_DEFAULT); // Hash the password
        $nisn = sanitize_input($_POST["nisn"]);

        try {
            // Insert the username, password, and NISN into the database
            $stmt = $conn->prepare("INSERT INTO user (Username, Password, nisn) VALUES (:username, :password, :nisn)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':nisn', $nisn);
            $stmt->execute();

            echo "<script>alert('Signup berhasil! Silahkan login.'); window.location.href='login.php';</script>";
            exit(); // Stop further execution
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login & Signup</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Signup</h3>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="nisn">NISN:</label><br>
        <input type="text" id="nisn" name="nisn" required><br><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>

</html>