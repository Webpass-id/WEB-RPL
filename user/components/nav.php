<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:rgb(103, 131, 159) !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hi, <?php echo htmlspecialchars($_SESSION['user']); ?> !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/user">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/absen">Absen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/logout.php">Log Out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>