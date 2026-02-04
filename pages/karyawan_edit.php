<?php
include "../config/koneksi.php";
include "../assets/header.php";
$d = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_karyawan='$_GET[id]'"));
?>

<h4>Edit Karyawan</h4>

<form method="post">
  <input type="hidden" name="id" value="<?= $d['id_karyawan'] ?>">
  <div class="mb-3">
    <label>Nama Karyawan</label>
    <input type="text" name="nama" value="<?= $d['nama_karyawan'] ?>" class="form-control">
  </div>
  <button name="update" class="btn btn-warning">Update</button>
  <a href="karyawan.php" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['update'])){
  mysqli_query($koneksi,"UPDATE karyawan SET nama_karyawan='$_POST[nama]' WHERE id_karyawan='$_POST[id]'");
  header("Location:karyawan.php");
}
include "../assets/footer.php";
?>
