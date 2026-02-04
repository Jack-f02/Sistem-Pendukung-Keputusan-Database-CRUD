<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
}
include "assets/header.php";
?>

<div class="row">
    <div class="col-md-12 mb-3">
        <div class="alert alert-success">
            👋 Selamat datang di <b>Sistem Pendukung Keputusan</b><br>
            Metode <b>Weighted Product (WP)</b>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>👥 Karyawan</h5>
                <a href="pages/karyawan.php" class="btn btn-outline-dark btn-sm mt-2">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>📊 Kriteria</h5>
                <a href="pages/kriteria.php" class="btn btn-outline-dark btn-sm mt-2">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>📝 Penilaian</h5>
                <a href="pages/penilaian.php" class="btn btn-outline-dark btn-sm mt-2">Lihat</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>🏆 Ranking</h5>
                <a href="pages/hasil.php" class="btn btn-outline-success btn-sm mt-2">Lihat</a>
            </div>
        </div>
    </div>
</div>

<?php include "assets/footer.php"; ?>
