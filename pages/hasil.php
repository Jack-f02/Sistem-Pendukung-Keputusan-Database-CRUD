<?php
include "../config/koneksi.php";
include "perhitungan_wp.php";
include "../assets/header.php";

arsort($V); // urutkan ranking
?>

<h3 class="mb-4">📊 Hasil Perhitungan Metode Weighted Product (WP)</h3>

<!-- TABEL NILAI V -->
<div class="card mb-4 shadow-sm">
  <div class="card-header bg-dark text-white">
    Nilai Preferensi (V)
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-secondary">
        <tr>
          <th>No</th>
          <th>Nama Karyawan</th>
          <th>Nilai V</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($V as $id => $nilai): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data[$id]['nama']; ?></td>
          <td class="fw-bold"><?= round($nilai, 4); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- RANKING -->
<div class="card shadow-sm">
  <div class="card-header bg-success text-white">
    🏆 Ranking Karyawan Terbaik
  </div>
  <div class="card-body">
    <ol class="fs-5">
      <?php foreach ($V as $id => $nilai): ?>
        <li class="mb-2">
          <b><?= $data[$id]['nama']; ?></b>
          <span class="text-muted">(<?= round($nilai,4); ?>)</span>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</div>

<?php include "../assets/footer.php"; ?>
