<?php
include "../config/koneksi.php";
include "../assets/header.php";
?>

<h4>Tambah Penilaian</h4>

<form method="post">
<select name="id_karyawan" class="form-control mb-2">
<?php
$q=mysqli_query($koneksi,"SELECT * FROM karyawan");
while($r=mysqli_fetch_assoc($q)){
  echo "<option value='$r[id_karyawan]'>$r[nama_karyawan]</option>";
}
?>
</select>

<select name="id_kriteria" class="form-control mb-2">
<?php
$q=mysqli_query($koneksi,"SELECT * FROM kriteria");
while($r=mysqli_fetch_assoc($q)){
  echo "<option value='$r[id_kriteria]'>$r[nama_kriteria]</option>";
}
?>
</select>

<input type="number" name="nilai" min="1" max="5" class="form-control mb-3">

<button name="simpan" class="btn btn-success">Simpan</button>
<a href="penilaian.php" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['simpan'])){
  mysqli_query($koneksi,"INSERT INTO penilaian VALUES(NULL,'$_POST[id_karyawan]','$_POST[id_kriteria]','$_POST[nilai]')");
  header("Location:penilaian.php");
}
include "../assets/footer.php";
?>
