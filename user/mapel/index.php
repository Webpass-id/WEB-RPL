<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Pelajaran</title>
</head>

<body>
    <?php 
    include "../components/nav.php";
    ?>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Mata Pelajaran</h1>
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Nama Mata Pelajaran</th>
                    <th>Nama Guru</th>
                    <th>Jam</th>
                    <th>Tingkat</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include "../../boots.php";
                include "../../conn.php";

                try {
                    // Buat koneksi menggunakan PDO
                    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Query untuk mengambil data mata pelajaran
                    $stmt = $pdo->query("SELECT id_pelajaran, nama_pelajaran, nama_guru, jam, tingkat, deskripsi FROM matapelajaran");

                    // Loop melalui hasil query dan tampilkan dalam tabel
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["nama_pelajaran"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nama_guru"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["jam"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["tingkat"]) . "</td>";
                        echo "</tr>";
                    }

                } catch (PDOException $e) {
                    echo "<tr><td colspan='6' class='text-center'>Terjadi kesalahan: " . $e->getMessage() . "</td></tr>";
                }

                // Tutup koneksi database
                $pdo = null;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>