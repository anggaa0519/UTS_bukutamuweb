<?php
require_once 'koneksi.php';

// Fitur pencarian berdasarkan nama atau instansi
$cari = isset($_GET['cari']) ? trim($_GET['cari']) : '';

if ($cari !== '') {
    $stmt = $koneksi->prepare(
        "SELECT * FROM buku_tamu WHERE nama LIKE ? OR instansi LIKE ? ORDER BY id DESC"
    );
    $key = "%" . $cari . "%";
    $stmt->bind_param("ss", $key, $key);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $koneksi->query("SELECT * FROM buku_tamu ORDER BY id DESC");
}

// Hitung total tamu
$total = $koneksi->query("SELECT COUNT(*) AS jml FROM buku_tamu")->fetch_assoc()['jml'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu &mdash; Buku Tamu Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-emerald sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
            <span class="brand-badge"><i class="bi bi-journal-bookmark-fill"></i></span>
            Buku Tamu Digital
        </a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php"><i class="bi bi-pencil-square me-1"></i>Form Tamu</a>
            <a class="nav-link active" href="daftar.php"><i class="bi bi-people-fill me-1"></i>Daftar Tamu</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="glass-card">
        <div class="card-banner d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h2 class="h3"><i class="bi bi-people-fill me-2"></i>Daftar Tamu</h2>
                <p>Seluruh tamu yang telah mengisi buku tamu.</p>
            </div>
            <span class="stat-pill"><i class="bi bi-person-check-fill me-1"></i><?= $total ?> Tamu Terdaftar</span>
        </div>
        <div class="card-pad">

            <!-- Form pencarian -->
            <form class="row g-2 mb-4" method="GET" action="daftar.php">
                <div class="col-sm-8 col-md-9">
                    <div class="input-icon search-modern">
                        <i class="bi bi-search icon"></i>
                        <input type="text" class="form-control" name="cari" placeholder="Cari nama atau instansi..." value="<?= htmlspecialchars($cari) ?>">
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 d-grid">
                    <button type="submit" class="btn btn-emerald"><i class="bi bi-search me-1"></i>Cari</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['instansi']) ?></td>
                                    <td><?= htmlspecialchars($row['tujuan']) ?></td>
                                    <td><i class="bi bi-calendar3 text-success me-1"></i><?= htmlspecialchars($row['tanggal']) ?></td>
                                    <td><span class="badge-time"><?= htmlspecialchars(substr($row['waktu'], 0, 5)) ?></span></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">
                                    <div class="text-center empty-state">
                                        <div class="big"><i class="bi bi-inbox"></i></div>
                                        Belum ada data tamu<?= $cari !== '' ? ' untuk pencarian "'.htmlspecialchars($cari).'"' : '' ?>.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-2">
                <a href="index.php" class="btn btn-emerald"><i class="bi bi-plus-lg me-1"></i>Tambah Tamu Baru</a>
            </div>

        </div>
    </div>
    <p class="text-center footer-note mt-4">Buku Tamu Digital &mdash; Pemrograman Web II &middot; AnggaAnggieanie | 250401020172 |</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $koneksi->close(); ?>
