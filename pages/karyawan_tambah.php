<?php include "../assets/header.php"; ?>
<h4>Tambah Karyawan</h4>

<form method="post">
  <div class="mb-3">
    <label>Nama Karyawan</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <button name="simpan" class="btn btn-success">Simpan</button>
  <a href="karyawan.php" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['simpan'])){
  include "../config/koneksi.php";

  // 1. Simpan karyawan
  mysqli_query($koneksi,"INSERT INTO karyawan VALUES(NULL,'$_POST[nama]')");
  $id_karyawan = mysqli_insert_id($koneksi);

  // 2. Ambil semua kriteria
  $kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria");

  // 3. Buat nilai default (misal 3)
  while($k = mysqli_fetch_assoc($kriteria)){
    mysqli_query($koneksi,"
      INSERT INTO penilaian 
      VALUES (NULL,'$id_karyawan','$k[id_kriteria]',3)
    ");
  }

  header("Location:karyawan.php");
}
?>
