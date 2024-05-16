<!DOCTYPE html>
<html>

<head>
    <title>CRUD Mata Pelajaran</title>
</head>

<body>
    <?php include "../components/nav.php"; ?>
    <h2>CRUD Mata Pelajaran</h2>

    <!-- Formulir untuk menambah atau mengedit mata pelajaran -->
    <h3>Tambah/Edit Mata Pelajaran</h3>
    <form action="" method="POST">
        Nama Pelajaran: <input type="text" name="nama_pelajaran"
            value="<?php echo isset($nama_pelajaran) ? htmlspecialchars($nama_pelajaran) : ''; ?>"><br>
        Nama Guru: <input type="text" name="nama_guru"
            value="<?php echo isset($nama_guru) ? htmlspecialchars($nama_guru) : ''; ?>"><br>
        Jam: <input type="number" name="jam" value="<?php echo isset($jam) ? htmlspecialchars($jam) : ''; ?>"><br>
        Tingkat: <input type="text" name="tingkat"
            value="<?php echo isset($tingkat) ? htmlspecialchars($tingkat) : ''; ?>"><br>
        Deskripsi: <textarea
            name="deskripsi"><?php echo isset($deskripsi) ? htmlspecialchars($deskripsi) : ''; ?></textarea><br>
        <input type="hidden" name="id_pelajaran"
            value="<?php echo isset($id_pelajaran) ? htmlspecialchars($id_pelajaran) : ''; ?>">
        <input type="submit" name="submit" value="Simpan">
    </form>

    <hr>

    <!-- Daftar Mata Pelajaran -->
    <h3>Daftar Mata Pelajaran</h3>
    <table border="1">
        <tr>
            <th>ID Pelajaran</th>
            <th>Nama Pelajaran</th>
            <th>Nama Guru</th>
            <th>Jam</th>
            <th>Tingkat</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Koneksi ke database
        include "../../conn.php";
        include "../../boots.php";

        // Ambil data mata pelajaran dari database
        $sql = "SELECT * FROM MataPelajaran";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id_pelajaran"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nama_pelajaran"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nama_guru"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["jam"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tingkat"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["deskripsi"]) . "</td>";
                echo "<td><a href='index.php?id=" . $row["id_pelajaran"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id_pelajaran"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data mata pelajaran</td></tr>";
        }

        // Ambil data dari form jika ada
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pelajaran = $_POST["nama_pelajaran"];
            $nama_guru = $_POST["nama_guru"];
            $jam = $_POST["jam"];
            $tingkat = isset($_POST["tingkat"]) ? $_POST["tingkat"] : '';
            $deskripsi = $_POST["deskripsi"];
            $id_pelajaran = $_POST["id_pelajaran"];

            // Logika untuk menyimpan atau mengedit data ke database
            if (!empty($nama_pelajaran) && isset($jam) && !empty($tingkat) && !empty($deskripsi)) {
                try {
                    if (empty($id_pelajaran)) {
                        // Operasi tambah
                        $sql = "INSERT INTO MataPelajaran (nama_pelajaran, nama_guru, jam, tingkat, deskripsi) VALUES (:nama_pelajaran, :nama_guru, :jam, :tingkat, :deskripsi)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':nama_pelajaran', $nama_pelajaran);
                        $stmt->bindParam(':nama_guru', $nama_guru);
                        $stmt->bindParam(':jam', $jam);
                        $stmt->bindParam(':tingkat', $tingkat);
                        $stmt->bindParam(':deskripsi', $deskripsi);
                    } else {
                        // Operasi edit
                        $sql = "UPDATE MataPelajaran SET nama_pelajaran=:nama_pelajaran, nama_guru=:nama_guru, jam=:jam, tingkat=:tingkat, deskripsi=:deskripsi WHERE id_pelajaran=:id_pelajaran";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':nama_pelajaran', $nama_pelajaran);
                        $stmt->bindParam(':nama_guru', $nama_guru);
                        $stmt->bindParam(':jam', $jam);
                        $stmt->bindParam(':tingkat', $tingkat);
                        $stmt->bindParam(':deskripsi', $deskripsi);
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
            }
        }
        ?>
    </table>
</body>

</html>