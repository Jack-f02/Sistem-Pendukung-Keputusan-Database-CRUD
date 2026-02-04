<?php
include "../config/koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT k.nama_karyawan, kr.kode_kriteria, p.nilai
    FROM penilaian p
    JOIN karyawan k ON p.id_karyawan = k.id_karyawan
    JOIN kriteria kr ON p.id_kriteria = kr.id_kriteria
");

while ($row = mysqli_fetch_assoc($query)) {
    echo $row['nama_karyawan']." - ".$row['kode_kriteria']." = ".$row['nilai']."<br>";
}
