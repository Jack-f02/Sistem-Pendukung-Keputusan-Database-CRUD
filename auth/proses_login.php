<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// LOGIN DUMMY (AMAN BUAT TUGAS)
if ($username == "admin" && $password == "admin123") {
    $_SESSION['login'] = true;
    header("Location: ../dashboard.php");
} else {
    echo "<script>
        alert('Username atau Password salah!');
        window.location='login.php';
    </script>";
}
