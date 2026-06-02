<?php
// Menampilkan notifikasi hasil penyimpanan (jika ada)
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku Tamu &mdash; Buku Tamu Digital</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tema emerald -->
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-emerald sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
            <span class="brand-badge"><i class="bi bi-journal-bookmark-fill"></i></span>
            Buku Tamu Digital
        </a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="index.php"><i class="bi bi-pencil-square me-1"></i>Form Tamu</a>
            <a class="nav-link" href="daftar.php"><i class="bi bi-people-fill me-1"></i>Daftar Tamu</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <?php if ($status === 'sukses'): ?>
                <div class="alert alert-modern alert-ok alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>Data tamu berhasil disimpan. Terima kasih atas kunjungannya!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php elseif ($status === 'gagal'): ?>
                <div class="alert alert-modern alert-err alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Maaf, terjadi kesalahan saat menyimpan data. Silakan coba lagi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="glass-card">
                <div class="card-banner">
                    <h1 class="h3"><i class="bi bi-person-plus-fill me-2"></i>Formulir Tamu</h1>
                    <p>Selamat datang! Silakan isi data kunjungan Anda di bawah ini.</p>
                </div>
                <div class="card-pad">
                    <form action="simpan.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <div class="input-icon">
                                <i class="bi bi-person icon"></i>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="instansi" class="form-label">Instansi</label>
                            <div class="input-icon">
                                <i class="bi bi-building icon"></i>
                                <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Asal instansi / sekolah / perusahaan" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan Kedatangan</label>
                            <textarea class="form-control" id="tujuan" name="tujuan" rows="3" placeholder="Jelaskan tujuan kedatangan Anda" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label d-block">Tanggal &amp; Waktu Kedatangan</label>
                            <span class="auto-pill"><i class="bi bi-clock-history"></i> Dicatat otomatis oleh sistem saat data disimpan</span>
                        </div>
                        <div class="d-flex gap-2 justify-content-end flex-wrap">
                            <a href="daftar.php" class="btn btn-ghost"><i class="bi bi-list-ul me-1"></i>Lihat Daftar</a>
                            <button type="submit" class="btn btn-emerald"><i class="bi bi-send-fill me-1"></i>Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center footer-note mt-4">Buku Tamu Digital &mdash; Pemrograman Web II &middot; AnggaAnggieanie | 250401020172 | </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
