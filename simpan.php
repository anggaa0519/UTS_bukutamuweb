<?php
require_once 'koneksi.php';

// Pastikan diakses melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil dan bersihkan input dari form
    $nama     = trim($_POST['nama']);
    $instansi = trim($_POST['instansi']);
    $tujuan   = trim($_POST['tujuan']);

    // Tanggal & waktu otomatis (zona waktu WIB)
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $waktu   = date('H:i:s');

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare(
        "INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssss", $nama, $instansi, $tujuan, $tanggal, $waktu);

    if ($stmt->execute()) {
        $stmt->close();
        $koneksi->close();
        header("Location: index.php?status=sukses");
        exit;
    } else {
        $stmt->close();
        $koneksi->close();
        header("Location: index.php?status=gagal");
        exit;
    }

} else {
    // Jika diakses langsung tanpa submit form
    header("Location: index.php");
    exit;
}
?>
