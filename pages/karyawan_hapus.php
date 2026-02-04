<?php
include "../config/koneksi.php";
mysqli_query($koneksi,"DELETE FROM karyawan WHERE id_karyawan='$_GET[id]'");
header("Location:karyawan.php");
