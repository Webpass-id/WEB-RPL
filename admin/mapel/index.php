<?php
// Start session
session_start();
include "../../conn.php";
include "../../boots.php";
include "../components/nav.php";

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit(); // Stop further execution
}

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mata Pelajaran</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>


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
            <input type="number" id="jam" name="jam" value="<?php echo isset($jam) ? htmlspecialchars($jam) : ''; ?>">

            <label for="tingkat">Tingkat:</label>
            <input type="text" id="tingkat" name="tingkat"
                value="<?php echo isset($tingkat) ? htmlspecialchars($tingkat) : ''; ?>">

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi"
                name="deskripsi"><?php echo isset($deskripsi) ? htmlspecialchars($deskripsi) : ''; ?></textarea>

            <label for="hari">Hari:</label>
            <select id="hari" name="hari">
                <option value="Senin" <?php echo (isset($hari) && $hari == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo (isset($hari) && $hari == 'Selasa') ? 'selected' : ''; ?>>Selasa
                </option>
                <option value="Rabu" <?php echo (isset($hari) && $hari == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo (isset($hari) && $hari == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo (isset($hari) && $hari == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
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
</body>

</html>