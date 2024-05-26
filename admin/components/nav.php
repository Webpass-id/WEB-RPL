<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:rgb(103, 131, 159) !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hallo <?php echo ($_SESSION['admin']) ?>!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/absen">Absen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/murid">Murid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/mapel">Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/tugas-sekolah/">Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/logout.php">LogOut</a>
                </li>
            </ul>
        </div>
    </div>
</nav>