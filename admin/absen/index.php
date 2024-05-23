<?php
include "../../conn.php";
include "../../boots.php";
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php"); // Redirect to login page if not logged in
    exit();
}

// Handle delete request
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    try {
        // Retrieve photo path
        $stmt = $conn->prepare("SELECT Foto FROM absen WHERE ID = :id");
        $stmt->bindParam(':id', $delete_id);
        $stmt->execute();
        $photoPath = $stmt->fetchColumn();

        // Delete attendance data
        $stmt = $conn->prepare("DELETE FROM absen WHERE ID = :id");
        $stmt->bindParam(':id', $delete_id);
        $stmt->execute();

        // Delete photo file
        if ($photoPath) {
            unlink($photoPath);
        }

        // Redirect to avoid form resubmission
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Retrieve attendance data using PDO
try {
    $sql = "SELECT * FROM absen";
    $stmt = $conn->query($sql);
    $attendanceData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Data</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Responsive table styles */
    @media screen and (max-width: 600px) {

        /* Adjust table header cells to stack on smaller screens */
        th {
            display: block;
        }

        /* Hide table header cells on smaller screens */
        th:not(:first-child) {
            display: none;
        }

        /* Stack table cells vertically on smaller screens */
        td {
            display: block;
            text-align: left;
        }

        /* Add padding to each table cell */
        td {
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        /* Style the last table cell (Username) differently */
        td:last-child {
            border-bottom: none;
        }
    }
    </style>
</head>

<body>
    <?php include "../components/nav.php"; ?>
    <h2>Attendance Data</h2>
    <?php if (!empty($attendanceData)): ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Nama</th>
                <th>Jam Masuk</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Username</th>
                <th>Action</th> <!-- Add this column for delete action -->
            </tr>
            <?php foreach ($attendanceData as $row): ?>
            <tr>
                <td><?php echo $row["Nama"]; ?></td>
                <td><?php echo $row["JamMasuk"]; ?> <?php echo $row["Tanggal"]; ?></td>
                <td><?php echo $row["Keterangan"]; ?></td>
                <td><img src="<?php echo $row["Foto"]; ?>" alt="Foto" style="max-width: 100px; height: auto;"></td>
                <td><?php echo $row["Username"]; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <p>No attendance data found.</p>
    <?php endif; ?>
</body>

</html>