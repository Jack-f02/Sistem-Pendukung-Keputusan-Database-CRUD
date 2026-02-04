<?php
include "../config/koneksi.php";
include "../assets/header.php";

$data = mysqli_fetch_assoc(
  mysqli_query($koneksi,"
    SELECT p.id_penilaian, k.nama_karyawan, kr.nama_kriteria, p.nilai
    FROM penilaian p
    JOIN karyawan k ON p.id_karyawan = k.id_karyawan
    JOIN kriteria kr ON p.id_kriteria = kr.id_kriteria
    WHERE p.id_penilaian='$_GET[id]'
  ")
);
?>

<h4>Edit Penilaian</h4>

<form method="post">
  <input type="hidden" name="id" value="<?= $data['id_penilaian'] ?>">

  <div class="mb-3">
    <label>Karyawan</label>
    <input type="text" class="form-control" value="<?= $data['nama_karyawan'] ?>" readonly>
  </div>

  <div class="mb-3">
    <label>Kriteria</label>
    <input type="text" class="form-control" value="<?= $data['nama_kriteria'] ?>" readonly>
  </div>

  <div class="mb-3">
    <label>Nilai (1–5)</label>
    <input type="number" name="nilai" class="form-control"
           min="1" max="5" value="<?= $data['nilai'] ?>" required>
  </div>

  <button name="update" class="btn btn-success">Simpan</button>
  <a href="penilaian.php" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['update'])){
  mysqli_query($koneksi,"
    UPDATE penilaian 
    SET nilai='$_POST[nilai]' 
    WHERE id_penilaian='$_POST[id]'
  ");
  header("Location:penilaian.php");
}
include "../assets/footer.php";
?>
