# Buku Tamu Digital Sekolah

Aplikasi web sederhana buku tamu digital untuk sekolah dengan tema Green Emerland. Tamu mengisi formulir, data disimpan ke database MySQL, dan daftar tamu ditampilkan dalam tabel ber-styling Bootstrap.

UTS Pemrograman Web II (IF405) — Universitas Siber Asia
**Nama:** Angga Anggieanie | **NIM:** 250401020172

## Struktur File

| File | Keterangan |
|------|-----------|
| `koneksi.php` | Konfigurasi koneksi MySQL (mysqli) |
| `index.php` | Halaman formulir tamu (Bootstrap) |
| `simpan.php` | Memproses & menyimpan data form ke database |
| `daftar.php` | Menampilkan daftar tamu + fitur pencarian |
| `db_bukutamu.sql` | Struktur database & tabel `buku_tamu` |

## Fitur

- Formulir tamu: Nama Lengkap, Instansi, Tujuan Kedatangan.
- Tanggal & waktu kedatangan dicatat **otomatis** oleh server (zona WIB).
- Penyimpanan menggunakan **prepared statement** (aman dari SQL Injection).
- Daftar tamu dengan tabel `table-striped table-hover`.
- Pencarian berdasarkan nama atau instansi.

## Struktur Tabel `buku_tamu`

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| id | INT, AUTO_INCREMENT | Primary key |
| nama | VARCHAR(100) | Nama lengkap tamu |
| instansi | VARCHAR(100) | Asal instansi |
| tujuan | TEXT | Tujuan kedatangan |
| tanggal | DATE | Tanggal kedatangan (otomatis) |
| waktu | TIME | Waktu kedatangan (otomatis) |
