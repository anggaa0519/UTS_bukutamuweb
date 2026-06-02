<?php

$host     = "localhost";    // host server MySQL (default XAMPP)
$user     = "root";          // username MySQL (default XAMPP)
$password = "";              // password MySQL (default XAMPP kosong)
$database = "db_bukutamu";   // nama database

// Membuat koneksi menggunakan mysqli
$koneksi = new mysqli($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Set charset agar mendukung karakter Indonesia dengan benar
$koneksi->set_charset("utf8mb4");
?>
