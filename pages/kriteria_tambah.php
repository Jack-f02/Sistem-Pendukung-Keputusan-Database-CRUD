<?php include "../assets/header.php"; ?>

<h4>Tambah Kriteria</h4>

<form method="post">
<input type="text" name="kode" class="form-control mb-2" placeholder="Kode">
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
<input type="number" step="0.01" name="bobot" class="form-control mb-2" placeholder="Bobot">
<select name="jenis" class="form-control mb-3">
  <option value="benefit">Benefit</option>
  <option value="cost">Cost</option>
</select>
<button name="simpan" class="btn btn-success">Simpan</button>
<a href="kriteria.php" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['simpan'])){
  include "../config/koneksi.php";
  mysqli_query($koneksi,"INSERT INTO kriteria VALUES(NULL,'$_POST[kode]','$_POST[nama]','$_POST[bobot]','$_POST[jenis]')");
  header("Location:kriteria.php");
}
include "../assets/footer.php";
?>
