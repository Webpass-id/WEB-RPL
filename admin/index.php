<?php
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

// Check if the user is logged in as admin
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
include "../boots.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

</head>

<body>
    <?php include "components/nav.php"; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="absen/style/index.css">
    <link rel="stylesheet" href="mapel/style/index.css">
    <link rel="stylesheet" href="murid/style/index.css">
    <title>Document</title>
    </head>

    <body>
        <h1>hallo <?php echo ($_SESSION['admin']) ?></h1>
        <H1>Jadwal piket</H1>
        <?php  
include "../conn.php";
include "../boots.php";


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
                        <td data-label="NISN"><?php echo htmlspecialchars($row["nisn"]); ?></td>
                        <!-- Display NISN -->
                        <td data-label="Jam Masuk"><?php echo htmlspecialchars($row["JamMasuk"]); ?>
                            <?php echo htmlspecialchars($row["Tanggal"]); ?></td>
                        <td data-label="Keterangan"><?php echo htmlspecialchars($row["Keterangan"]); ?></td>
                        <td data-label="Foto"><img src="<?php echo htmlspecialchars($row["Foto"]); ?>" alt="Foto">
                        </td>
                        <td data-label="Username"><?php echo htmlspecialchars($row["Username"]); ?></td>
                        <td data-label="Action">
                            <form method="post">
                                <input type="hidden" name="delete_id"
                                    value="<?php echo htmlspecialchars($row['ID']); ?>">
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

        <?php


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





            <?php


// Function to get subjects for a specific day using PDO
function getSubjectsByDay($conn, $day) {
    try {
        $query = "SELECT nama_pelajaran, nama_guru, jam, tingkat, deskripsi FROM matapelajaran WHERE hari = :day";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':day', $day);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Ambil data mata pelajaran dari database
$sql = "SELECT * FROM MataPelajaran";
$result = $conn->query($sql);

// Ambil data dari form jika ada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelajaran = $_POST["nama_pelajaran"];
    $nama_guru = $_POST["nama_guru"];
    $jam = $_POST["jam"];
    $tingkat = $_POST["tingkat"];
    $deskripsi = $_POST["deskripsi"];
    $hari = $_POST["hari"];
    $id_pelajaran = $_POST["id_pelajaran"];

    // Logika untuk menyimpan atau mengedit data ke database
    if (!empty($nama_pelajaran) && isset($jam) && !empty($tingkat) && !empty($deskripsi) && !empty($hari)) {
        try {
            if (empty($id_pelajaran)) {
                // Operasi tambah
                $sql = "INSERT INTO MataPelajaran (nama_pelajaran, nama_guru, jam, tingkat, deskripsi, hari) VALUES (:nama_pelajaran, :nama_guru, :jam, :tingkat, :deskripsi, :hari)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nama_pelajaran', $nama_pelajaran);
                $stmt->bindParam(':nama_guru', $nama_guru);
                $stmt->bindParam(':jam', $jam);
                $stmt->bindParam(':tingkat', $tingkat);
                $stmt->bindParam(':deskripsi', $deskripsi);
                $stmt->bindParam(':hari', $hari);
            } else {
                // Operasi edit
                $sql = "UPDATE MataPelajaran SET nama_pelajaran=:nama_pelajaran, nama_guru=:nama_guru, jam=:jam, tingkat=:tingkat, deskripsi=:deskripsi, hari=:hari WHERE id_pelajaran=:id_pelajaran";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nama_pelajaran', $nama_pelajaran);
                $stmt->bindParam(':nama_guru', $nama_guru);
                $stmt->bindParam(':jam', $jam);
                $stmt->bindParam(':tingkat', $tingkat);
                $stmt->bindParam(':deskripsi', $deskripsi);
                $stmt->bindParam(':hari', $hari);
                $stmt->bindParam(':id_pelajaran', $id_pelajaran);
            }

            $stmt->execute();

            echo "<p>Data berhasil disimpan</p>";

            // Refresh halaman setelah operasi berhasil
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "<p>Semua kolom harus diisi</p>";
    }
}

// Ambil data untuk edit jika ada ID
if (isset($_GET['id'])) {
    $id_pelajaran = $_GET['id'];
    $sql = "SELECT * FROM MataPelajaran WHERE id_pelajaran = :id_pelajaran";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_pelajaran', $id_pelajaran, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $nama_pelajaran = $row['nama_pelajaran'];
        $nama_guru = $row['nama_guru'];
        $jam = $row['jam'];
        $tingkat = $row['tingkat'];
        $deskripsi = $row['deskripsi'];
        $hari = $row['hari'];
    }
}
?>



            <div class="container">
                <h2>CRUD Mata Pelajaran</h2>

                <!-- Formulir untuk menambah atau mengedit mata pelajaran -->
                <h3>Tambah/Edit Mata Pelajaran</h3>
                <form action="" method="POST">
                    <label for="nama_pelajaran">Nama Pelajaran:</label>
                    <input type="text" id="nama_pelajaran" name="nama_pelajaran"
                        value="<?php echo isset($nama_pelajaran) ? htmlspecialchars($nama_pelajaran) : ''; ?>">

                    <label for="nama_guru">Nama Guru:</label>
                    <input type="text" id="nama_guru" name="nama_guru"
                        value="<?php echo isset($nama_guru) ? htmlspecialchars($nama_guru) : ''; ?>">

                    <label for="jam">Jam:</label>
                    <input type="number" id="jam" name="jam"
                        value="<?php echo isset($jam) ? htmlspecialchars($jam) : ''; ?>">

                    <label for="tingkat">Tingkat:</label>
                    <input type="text" id="tingkat" name="tingkat"
                        value="<?php echo isset($tingkat) ? htmlspecialchars($tingkat) : ''; ?>">

                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi"
                        name="deskripsi"><?php echo isset($deskripsi) ? htmlspecialchars($deskripsi) : ''; ?></textarea>

                    <label for="hari">Hari:</label>
                    <select id="hari" name="hari">
                        <option value="Senin" <?php echo (isset($hari) && $hari == 'Senin') ? 'selected' : ''; ?>>Senin
                        </option>
                        <option value="Selasa" <?php echo (isset($hari) && $hari == 'Selasa') ? 'selected' : ''; ?>>
                            Selasa
                        </option>
                        <option value="Rabu" <?php echo (isset($hari) && $hari == 'Rabu') ? 'selected' : ''; ?>>Rabu
                        </option>
                        <option value="Kamis" <?php echo (isset($hari) && $hari == 'Kamis') ? 'selected' : ''; ?>>Kamis
                        </option>
                        <option value="Jumat" <?php echo (isset($hari) && $hari == 'Jumat') ? 'selected' : ''; ?>>Jumat
                        </option>
                    </select>

                    <input type="hidden" name="id_pelajaran"
                        value="<?php echo isset($id_pelajaran) ? htmlspecialchars($id_pelajaran) : ''; ?>">
                    <input type="submit" name="submit" value="Simpan">
                </form>

                <hr>

                <!-- Daftar Mata Pelajaran -->
                <h3>Daftar Mata Pelajaran</h3>
                <table>
                    <tr>
                        <th>ID Pelajaran</th>
                        <th>Nama Pelajaran</th>
                        <th>Nama Guru</th>
                        <th>Jam</th>
                        <th>Tingkat</th>
                        <th>Deskripsi</th>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td data-label='ID Pelajaran'>" . htmlspecialchars($row["id_pelajaran"]) . "</td>";
                    echo "<td data-label='Nama Pelajaran'>" . htmlspecialchars($row["nama_pelajaran"]) . "</td>";
                    echo "<td data-label='Nama Guru'>" . htmlspecialchars($row["nama_guru"]) . "</td>";
                    echo "<td data-label='Jam'>" . htmlspecialchars($row["jam"]) . "</td>";
                    echo "<td data-label='Tingkat'>" . htmlspecialchars($row["tingkat"]) . "</td>";
                    echo "<td data-label='Deskripsi'>" . htmlspecialchars($row["deskripsi"]) . "</td>";
                    echo "<td data-label='Hari'>" . htmlspecialchars($row["hari"]) . "</td>";
                    echo "<td data-label='Aksi'><a href='index.php?id=" . $row["id_pelajaran"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id_pelajaran"] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data mata pelajaran</td></tr>";
            }
            ?>
                </table>
            </div>




            <div class="container">
                <h2>Create New Task</h2>
                <form action="update.php" method="post">
                    <label for="tanggal">Tanggal:</label><br>
                    <input type="date" id="tanggal" name="tanggal" required><br><br>

                    <label for="hari">Hari:</label><br>
                    <select id="hari" name="hari" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select><br><br>

                    <label for="tugas">Nama Tugas:</label><br>
                    <input type="text" id="tugas" name="tugas" required><br><br>

                    <label for="guru">Guru:</label><br>
                    <input type="text" id="guru" name="guru" required><br><br>

                    <label for="tenggat">Tenggat:</label><br>
                    <input type="date" id="tenggat" name="tenggat" required><br><br>

                    <input type="submit" value="Create Task">
                </form>
            </div>
            <!-- Display notifications -->
            <?php if (isset($_GET['error']) && $_GET['error'] == 'duplicate'): ?>
            <div class="alert alert-danger" style="background-color: #88c1d0;">NISN already exists. Please use a
                different NISN.</div>
            <?php elseif (isset($_GET['success']) && $_GET['success'] == 'updated'): ?>
            <div class="alert alert-success" style="background-color: #88c1d0;">User updated successfully.</div>
            <?php elseif (isset($error)): ?>
            <div class="alert alert-danger" style="background-color: #88c1d0;"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if (count($murids) > 0): ?>
            <table class="table table-bordered">
                <h1>user</h1>
                <thead>
                    <style></style>
                    <tr style="background-color: #88c1d0; color: white;">
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
                                <button type="submit" class="btn btn-success"
                                    style="background-color: #88c1d0;">Update</button>
                            </form>
                            <form method="POST" action="delete_user.php" style="display:inline;">
                                <input type="hidden" name="nisn"
                                    value="<?php echo htmlspecialchars($murid['nisn'] ?? ''); ?>">
                                <button type="submit" class="btn btn-danger"
                                    style="background-color: #88c1d0;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p style="color: #88c1d0;">Tidak ada data murid.</p>
            <?php endif; ?>

    </body>

</html>