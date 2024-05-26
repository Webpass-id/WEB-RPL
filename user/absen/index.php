<?php
session_start();

include "../../conn.php";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_ip_address()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nama = sanitize_input($_POST["nama"]);
    $keterangan = sanitize_input($_POST["keterangan"]);
    $tanggal = date('Y-m-d');
    $jam_masuk = date('H:i:s');
    $ip_address = get_ip_address();
    $target_dir = "../../admin/uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!empty($_FILES["foto"]["tmp_name"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
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

    try {
        $username = $_SESSION["user"];
        $stmt = $conn->prepare("SELECT nisn FROM user WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $nisn = $result['nisn'];

            $stmt = $conn->prepare("INSERT INTO absen (Nama, Tanggal, JamMasuk, Keterangan, Foto, Username, nisn, ip_address) VALUES (:nama, :tanggal, :jam_masuk, :keterangan, :foto, :username, :nisn, :ip_address)");
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':tanggal', $tanggal);
            $stmt->bindParam(':jam_masuk', $jam_masuk);
            $stmt->bindParam(':keterangan', $keterangan);
            $stmt->bindParam(':foto', $target_file);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':nisn', $nisn);
            $stmt->bindParam(':ip_address', $ip_address);
            $stmt->execute();

            echo "<script>alert('Absen berhasil!');</script>";
        } else {
            echo "Error: nisn not found for the current user.";
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
    <title>Absen</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php 
    include "../components/nav.php";
    include "../../boots.php";
    ?>
    <form class="container" id="absenForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data">
        <h2>ABSEN</h2>
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
        if (fileInput.files.length === 0) {
            event.preventDefault();
            alert("Please select a file.");
        }
    });
    </script>
</body>

</html>