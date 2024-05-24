<?php
// Include the database connection file
include "../../conn.php";
include "../../boots.php";

try {
    // Select data from the "user" table
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $murids = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
}
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Murid</title>
    <script>
    function validateForm(event) {
        event.preventDefault();
        const newNisn = event.target.new_nisn.value;
        const currentNisn = event.target.current_nisn.value;
        const username = event.target.username.value;
        const murids = <?php echo json_encode($murids); ?>;
        const duplicateNisn = murids.some(murid => murid.nisn == newNisn && murid.nisn != currentNisn);

        if (duplicateNisn) {
            alert('NISN already exists. Please use a different NISN.');
        } else {
            event.target.submit();
        }
    }
    </script>
</head>
<style>
.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    border-bottom: 2px solid #88c1d0;
    padding-bottom: 10px;
    margin-bottom: 20px;
    color: #88c1d0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #88c1d0;
    color: #88c1d0;
}

td {
    background-color: #f9f9f9;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    color: #fff;
    background-color: #88c1d0;
    /* Warna latar belakang tombol */
}

.btn-success {
    background-color: #88c1d0;
}

.btn-danger {
    background-color: #e74c3c;
}

.btn:hover {
    opacity: 0.8;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #e74c3c;
    color: white;
}

.alert-success {
    background-color: #2ecc71;
    color: white;
}

@media (max-width: 600px) {
    .container {
        padding: 10px;
    }

    h2 {
        font-size: 22px;
    }

    th,
    td {
        padding: 8px;
    }

    .btn {
        padding: 6px 12px;
        font-size: 14px;
    }
}
</style>

<body>
    <?php include "../components/nav.php"; ?>
    <h2>Data Murid</h2>

    <!-- Display notifications -->
    <?php if (isset($_GET['error']) && $_GET['error'] == 'duplicate'): ?>
    <div class="alert alert-danger">NISN already exists. Please use a different NISN.</div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 'updated'): ?>
    <div class="alert alert-success">User updated successfully.</div>
    <?php elseif (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (count($murids) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($murids as $murid): ?>
            <tr>
                <td><?php echo htmlspecialchars($murid['nisn'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($murid['Username'] ?? ''); ?></td>
                <td>
                    <form method="POST" action="update_user.php" style="display:inline;"
                        onsubmit="validateForm(event);">
                        <input type="hidden" name="current_nisn"
                            value="<?php echo htmlspecialchars($murid['nisn'] ?? ''); ?>">
                        <input type="text" name="new_nisn" placeholder="New NISN" required
                            value="<?php echo htmlspecialchars($murid['nisn'] ?? ''); ?>">
                        <input type="text" name="username" placeholder="New Username" required
                            value="<?php echo htmlspecialchars($murid['Username'] ?? ''); ?>">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    <form method="POST" action="delete_user.php" style="display:inline;">
                        <input type="hidden" name="nisn" value="<?php echo htmlspecialchars($murid['nisn'] ?? ''); ?>">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Tidak ada data murid.</p>
    <?php endif; ?>

</body>

</html>