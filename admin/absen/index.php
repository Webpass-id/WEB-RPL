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
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <?php include "../components/nav.php"; ?>
    <div class="container">
        <h2>Attendance Data</h2>
        <?php if (!empty($attendanceData)): ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>NISN</th> <!-- Added NISN column -->
                    <th>Jam Masuk</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Action</th> <!-- Add this column for delete action -->
                </tr>
                <?php foreach ($attendanceData as $row): ?>
                <tr>
                    <td data-label="Nama"><?php echo htmlspecialchars($row["Nama"]); ?></td>
                    <td data-label="NISN"><?php echo htmlspecialchars($row["nisn"]); ?></td> <!-- Display NISN -->
                    <td data-label="Jam Masuk"><?php echo htmlspecialchars($row["JamMasuk"]); ?>
                        <?php echo htmlspecialchars($row["Tanggal"]); ?></td>
                    <td data-label="Keterangan"><?php echo htmlspecialchars($row["Keterangan"]); ?></td>
                    <td data-label="Foto"><img src="<?php echo htmlspecialchars($row["Foto"]); ?>" alt="Foto"></td>
                    <td data-label="Username"><?php echo htmlspecialchars($row["Username"]); ?></td>
                    <td data-label="Action">
                        <form method="post">
                            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['ID']); ?>">
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
    </div>
</body>

</html>