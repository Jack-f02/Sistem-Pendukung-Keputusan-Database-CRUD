<?php
include "../config/koneksi.php";
include "../assets/header.php";
$search = $_GET['search'] ?? '';

$data = mysqli_query($koneksi,"
  SELECT * FROM karyawan
  WHERE nama_karyawan LIKE '%$search%'
");

?>

<h3 class="mb-3">📋 Data Karyawan</h3>

<a href="karyawan_tambah.php" class="btn btn-primary mb-3">+ Tambah Karyawan</a>

<form method="get" class="row mb-3">
  <div class="col-md-4">
    <input type="text" name="search" class="form-control"
           placeholder="Cari nama karyawan..."
           value="<?= $_GET['search'] ?? '' ?>">
  </div>
  <div class="col-md-2">
    <button class="btn btn-dark">Cari</button>
    <a href="karyawan.php" class="btn btn-secondary">Reset</a>
  </div>
</form>


<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
  <th>No</th>
  <th>Nama Karyawan</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $no=1; while($r=mysqli_fetch_assoc($data)){ ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $r['nama_karyawan'] ?></td>
  <td>
    <a href="karyawan_edit.php?id=<?= $r['id_karyawan'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="karyawan_hapus.php?id=<?= $r['id_karyawan'] ?>" 
       onclick="return confirm('Hapus data?')" 
       class="btn btn-danger btn-sm">Hapus</a>
  </td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include "../assets/footer.php"; ?>
