<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include "../conn.php";
include "../boots.php";
include "info.php";

// cek user login atau belum

    if (!isset($_SESSION['user'])){
        header("location: login.php");
        exit();
    }

    //ngambil data berdasarkan hari 
function getSubjectsByDay($conn, $day) {
    try {
        $query = "SELECT nama_pelajaran, nama_guru, jam, tingkat FROM matapelajaran WHERE hari = :day";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':day', $day);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}
    // nyarisubjek per hari 
    $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
    $subjek =[];
        foreach ($days as $day){
            $subjek[$day] = getSubjectsByDay($conn,$day);
        }
        
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <?php include "components/nav.php"; ?>

    <h1>Welcome <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <div class="container mt-4">
        <!-- jadwal -->
        <h1>jadwal pelajaran</h1>
        <?php foreach ($days as $day) : ?>
        <!-- tombol triger -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $day; ?>">
            <?php echo $day; ?>
        </button>

        <!-- modal -->
        <div class="modal fade" id+"modal" <?php echo $day; ?>tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $day; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Mata pelajaran
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Jam</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($subjects[$day])) : ?>
                            <?php foreach ($subjects[$day] as $row) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['nama_pelajaran']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
                                <td><?php echo htmlspecialchars($row['jam']); ?></td>
                                <td><?php echo htmlspecialchars($row['tingkat']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="4">Tidak ada data</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>

    </div>

</body>

</html>