<?php
include "../config/koneksi.php";
include "../assets/header.php";

$search = $_GET['search'] ?? '';

$data = mysqli_query($koneksi,"
  SELECT p.id_penilaian, k.nama_karyawan, kr.nama_kriteria, p.nilai
  FROM penilaian p
  JOIN karyawan k ON p.id_karyawan = k.id_karyawan
  JOIN kriteria kr ON p.id_kriteria = kr.id_kriteria
  WHERE k.nama_karyawan LIKE '%$search%'
     OR kr.nama_kriteria LIKE '%$search%'
  ORDER BY k.nama_karyawan
");

?>

<h3 class="mb-3">📝 Data Penilaian</h3>
<a href="penilaian_tambah.php" class="btn btn-primary mb-3">+ Tambah Penilaian</a>

<form method="get" class="row mb-3">
  <div class="col-md-4">
    <input type="text" name="search" class="form-control"
           placeholder="Cari karyawan / kriteria..."
           value="<?= $_GET['search'] ?? '' ?>">
  </div>
  <div class="col-md-2">
    <button class="btn btn-dark">Cari</button>
    <a href="penilaian.php" class="btn btn-secondary">Reset</a>
  </div>
</form>


<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
  <th>No</th>
  <th>Karyawan</th>
  <th>Kriteria</th>
  <th>Nilai</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $no=1; while($r=mysqli_fetch_assoc($data)){ ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $r['nama_karyawan'] ?></td>
  <td><?= $r['nama_kriteria'] ?></td>
  <td class="fw-bold text-center"><?= $r['nilai'] ?></td>
  <td>
    <a href="penilaian_edit.php?id=<?= $r['id_penilaian'] ?>" 
       class="btn btn-warning btn-sm">
       Edit
    </a>
  </td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include "../assets/footer.php"; ?>
