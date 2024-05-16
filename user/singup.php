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

// Initialize variables to store error messages
$signup_error = "";
$signup_success = "";

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
            // Check if the username or NISN already exists
            $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE Username = :username OR nisn = :nisn");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':nisn', $nisn);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                // Set error message for duplicate entry
                $signup_error = "Username or NISN already exists. Please use a different one.";
            } else {
                // Insert the username, password, and NISN into the database
                $stmt = $conn->prepare("INSERT INTO user (Username, Password, nisn) VALUES (:username, :password, :nisn)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':nisn', $nisn);
                $stmt->execute();

                // Set success message
                $signup_success = "Signup berhasil! Silahkan login.";
            }
        } catch (PDOException $e) {
            $signup_error = "Error: " . $e->getMessage();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Adjust the path accordingly -->
</head>

<body>
    <div class="container mt-4">
        <?php if (!empty($signup_error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $signup_error; ?>
        </div>
        <?php elseif (!empty($signup_success)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $signup_success; ?>
        </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3>Signup</h3>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" class="form-control" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Signup</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>