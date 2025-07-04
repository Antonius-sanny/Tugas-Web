<?php
// Konfigurasi database
$host     = "localhost";    // biasanya "localhost"
$user     = "root";         // username database
$password = "";             // password database (kosongkan jika tidak ada)
$database = "bukutamu";     // nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
