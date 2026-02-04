<?php
include "../config/koneksi.php";

/* =========================
   AMBIL DATA (JOIN)
========================= */
$query = mysqli_query($koneksi, "
    SELECT 
        p.id_karyawan,
        k.nama_karyawan,
        kr.id_kriteria,
        kr.bobot,
        kr.jenis,
        p.nilai
    FROM penilaian p
    JOIN karyawan k ON p.id_karyawan = k.id_karyawan
    JOIN kriteria kr ON p.id_kriteria = kr.id_kriteria
");

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['id_karyawan'];
    $data[$id]['nama'] = $row['nama_karyawan'];
    $data[$id]['nilai'][$row['id_kriteria']] = [
        'nilai' => $row['nilai'],
        'bobot' => $row['bobot'],
        'jenis' => $row['jenis']
    ];
}

/* =========================
   HITUNG WP
========================= */
$S = [];
foreach ($data as $id => $d) {
    $S[$id] = 1;
    foreach ($d['nilai'] as $k) {
        $bobot = $k['bobot'];
        if ($k['jenis'] == 'cost') {
            $bobot *= -1;
        }
        $S[$id] *= pow($k['nilai'], $bobot);
    }
}

$totalS = array_sum($S);
$V = [];
foreach ($S as $id => $val) {
    $V[$id] = $val / $totalS;
}
