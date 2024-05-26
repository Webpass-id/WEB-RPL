<?php
include "../conn.php";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_username($username)
{
    return preg_match('/^[a-zA-Z0-9]+$/', $username);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    if (!validate_username($username)) {
        echo "<script>alert('Username hanya boleh berisi karakter alfanumerik.');</script>";
    } else {
        try {
            $stmt = $conn->prepare("SELECT Password FROM admin WHERE Username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if (password_verify($password, $row['Password'])) {
                    session_start();
                    $_SESSION["admin"] = $username;
                    echo "<script>alert('Login berhasil!'); window.location.href='index.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Password salah.');</script>";
                }
            } else {
                echo "<script>alert('Username tidak ditemukan.');</script>";
            }
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>

</html>