CREATE DATABASE IF NOT EXISTS db_toko_umkm
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE db_toko_umkm;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
);

INSERT INTO produk (nama_produk, harga, stok) VALUES
    ('Kopi UMKM', 15000, 20),
    ('Keripik Pisang', 12000, 30),
    ('Kerajinan Lokal', 50000, 10);
