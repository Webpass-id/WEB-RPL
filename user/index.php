<?php
// Start session
session_start();
include "../conn.php";
include "../boots.php";
include "info.php";

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit(); // Stop further execution
}

// Function to get subjects for a specific day using PDO
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

// Get subjects for each day
$days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
$subjects = [];
foreach ($days as $day) {
    $subjects[$day] = getSubjectsByDay($conn, $day);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>      
    <?php include "components/nav.php"; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>JADWAL PELAJARAN</h1>
                <?php foreach ($days as $day) : ?>
                    <button type="button" class="btn btn-outline-secondary m-2" data-bs-toggle="modal" data-bs-target="#modal<?php echo $day; ?>">
                        <?php echo $day; ?>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $day; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $day; ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
    </div>

    <div class="container mt-4">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="mt-5">JADWAL PIKET</h1>
                <?php include "components/carosel.php"; ?>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row text-center">
            <div class="col-12">
                <h1>CALENDER</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="February Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="March Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="April Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="May Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="June Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="July Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="August Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="September Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="October Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="November Calendar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card calendar-card">
                    <img src="./assets/image/calender/JANUARI.jpg" class="card-img-top" alt="December Calendar">
                </div>
            </div>
        </div>
    </div>

     

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
