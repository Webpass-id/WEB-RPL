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