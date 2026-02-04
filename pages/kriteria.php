<?php
include "../config/koneksi.php";
include "../assets/header.php";
$search = $_GET['search'] ?? '';

$data = mysqli_query($koneksi,"
  SELECT * FROM kriteria
  WHERE nama_kriteria LIKE '%$search%'
     OR kode_kriteria LIKE '%$search%'
");

?>

<h3 class="mb-3">📊 Data Kriteria</h3>
<a href="kriteria_tambah.php" class="btn btn-primary mb-3">+ Tambah Kriteria</a>

<form method="get" class="row mb-3">
  <div class="col-md-4">
    <input type="text" name="search" class="form-control"
           placeholder="Cari kriteria..."
           value="<?= $_GET['search'] ?? '' ?>">
  </div>
  <div class="col-md-2">
    <button class="btn btn-dark">Cari</button>
    <a href="kriteria.php" class="btn btn-secondary">Reset</a>
  </div>
</form>


<table class="table table-bordered">
<thead class="table-dark">
<tr>
  <th>No</th>
  <th>Kode</th>
  <th>Nama</th>
  <th>Bobot</th>
  <th>Jenis</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $no=1; while($r=mysqli_fetch_assoc($data)){ ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $r['kode_kriteria'] ?></td>
  <td><?= $r['nama_kriteria'] ?></td>
  <td><?= $r['bobot'] ?></td>
  <td><?= ucfirst($r['jenis']) ?></td>
  <td>
    <a href="kriteria_edit.php?id=<?= $r['id_kriteria'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="kriteria_hapus.php?id=<?= $r['id_kriteria'] ?>" 
       onclick="return confirm('Hapus?')" 
       class="btn btn-danger btn-sm">Hapus</a>
  </td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include "../assets/footer.php"; ?>
