# I-3 Observasi Proses dan Thread

## Deskripsi
Repository ini berisi dokumentasi praktikum Sistem Operasi mengenai observasi proses,
thread, dan context switch pada Debian 13 (Trixie), disertai simulasi layanan katalog
produk UMKM menggunakan Nginx, PHP, dan MariaDB.

## Lingkungan Praktikum
- Sistem operasi: Debian 13 (Trixie)
- Virtualisasi: VMware Workstation Pro 17
- Web server: Nginx
- PHP: PHP 8.4 (PHP-FPM)
- Database: MariaDB 11.8
- Browser: Firefox

## Aktivitas Praktikum
- Mengamati status layanan Nginx, PHP-FPM, dan MariaDB.
- Mengamati hubungan parent-child process menggunakan `pstree`.
- Mengamati informasi proses menggunakan `ps`.
- Mengamati jumlah thread MariaDB melalui `/proc`.
- Mengamati statistik sistem dan context switch menggunakan `vmstat` serta `/proc/PID/status`.
- Membuat katalog produk UMKM yang mengambil data dari MariaDB melalui PHP.

## Struktur Repository
```text
.
├── 01-Bukti-Observasi/
├── 02-Source-Code/
├── 03-Database/
├── 04-Diagram/
└── 05-Laporan/
```

## Menjalankan Simulasi Katalog
1. Siapkan Nginx, PHP-FPM, ekstensi PDO MySQL, dan MariaDB.
2. Buat database dan tabel dengan menjalankan `03-Database/db_toko_umkm.sql`.
3. Salin `02-Source-Code/katalog.php` dan `02-Source-Code/info.php` ke document root Nginx.
4. Atur variabel lingkungan database sesuai contoh pada `02-Source-Code/.env.example`.
5. Pastikan PHP-FPM dan Nginx aktif, lalu buka `http://localhost/katalog.php`.

> Catatan: kredensial database tidak disimpan di source code repository. File `.env.example`
> hanya berisi contoh placeholder. Atur kredensial lokal secara terpisah pada server praktikum.

## Bukti
Folder `01-Bukti-Observasi` memuat screenshot katalog yang benar-benar diambil dari browser
pada saat pengujian. Screenshot pengamatan terminal lainnya perlu ditambahkan dari hasil
praktikum asli sebelum repository dijadikan dokumentasi lengkap.

## Laporan
Folder `05-Laporan` disediakan untuk laporan PDF final. File laporan belum disertakan karena
dokumen final belum dibuat pada tahap ini.

## Batasan dan Kejujuran Data
Nilai PID, jumlah thread, dan context switch dapat berubah antar-sesi. Gunakan hasil pengukuran
aktual saat praktikum dan jangan menganggap contoh atau catatan dari sesi sebelumnya sebagai
hasil universal. Repository ini adalah dokumentasi pembelajaran, bukan konfigurasi produksi.
