<?php
// Konfigurasi dibaca dari environment, bukan ditulis langsung di repository.
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'db_toko_umkm';
$user = getenv('DB_USER') ?: 'umkm_app';
$pass = getenv('DB_PASS') ?: '';

if ($pass === '') {
    http_response_code(500);
    exit('DB_PASS belum dikonfigurasi pada lingkungan server.');
}

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$db};charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    $stmt = $pdo->query(
        'SELECT id, nama_produk, harga, stok FROM produk ORDER BY id'
    );
    $produk = $stmt->fetchAll();
} catch (PDOException $e) {
    http_response_code(500);
    // Detail error tidak ditampilkan ke pengunjung.
    error_log('Koneksi katalog gagal: ' . $e->getMessage());
    exit('Katalog belum dapat diakses. Periksa konfigurasi database.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk UMKM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #f4f7f6;
            color: #263238;
        }
        h1 { color: #176b45; }
        .kartu {
            background: white;
            padding: 16px;
            margin: 12px 0;
            border-radius: 8px;
            box-shadow: 0 2px 6px #00000015;
        }
        .harga { color: #176b45; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Katalog Produk UMKM</h1>
    <p>Contoh layanan digital untuk menampilkan produk UMKM.</p>

    <?php foreach ($produk as $item): ?>
        <div class="kartu">
            <h2><?= htmlspecialchars($item['nama_produk'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="harga">
                Harga: Rp<?= number_format((int) $item['harga'], 0, ',', '.') ?>
            </p>
            <p>Stok: <?= (int) $item['stok'] ?> unit</p>
        </div>
    <?php endforeach; ?>
</body>
</html>
