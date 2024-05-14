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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Murid</title>
    <link rel="stylesheet" href="path_to_bootstrap.css"> <!-- Adjust the path accordingly -->
</head>

<body>

    <h2>Data Murid</h2>

    <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
    <?php elseif (count($murids) > 0): ?>
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
                    <form method="POST" action="update_user.php" style="display:inline;">
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