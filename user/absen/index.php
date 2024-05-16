<?php
session_start(); // Start the session if not already started

// Include the database connection file
include "../../conn.php";

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    // Redirect user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Absen Process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nama = sanitize_input($_POST["nama"]);
    $keterangan = sanitize_input($_POST["keterangan"]);

    // Set tanggal otomatis
    $tanggal = date('Y-m-d');

    // Set waktu otomatis
    $jam_masuk = date('H:i:s');

    // Proses upload foto
    $target_dir = "../../admin/uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file was uploaded successfully
    if (!empty($_FILES["foto"]["tmp_name"])) {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            // Allow only specific image file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto"]["size"] > 5000000000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }

    // Insert absen data into the database
    try {
        $username = $_SESSION["user"]; // Get the username from the session
        $stmt = $conn->prepare("INSERT INTO absen (Nama, Tanggal, JamMasuk, Keterangan, Foto, Username) VALUES (:nama, :tanggal, :jam_masuk, :keterangan, :foto, :username)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':jam_masuk', $jam_masuk);
        $stmt->bindParam(':keterangan', $keterangan);
        $stmt->bindParam(':foto', $target_file);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        echo "<script>alert('Absen berhasil!');</script>";
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
    <title>Absen</title>
</head>

<body>
    <h2>Absen</h2>
    <form id="absenForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="keterangan">Keterangan:</label><br>
        <input type="text" id="keterangan" name="keterangan"><br><br>
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <script>
    document.getElementById("absenForm").addEventListener("submit", function(event) {
        var fileInput = document.getElementById("foto");
        // Check if a file is selected
        if (fileInput.files.length === 0) {
            // Prevent form submission
            event.preventDefault();
            // Inform the user that they need to select a file
            alert("Please select a file.");
        }
    });
    </script>
</body>

</html>