<?php
// data.php - data produk, konfigurasi, dan fungsi PHP

// Data produk disimpan dalam array PHP
$produk = [
    ["nama" => "Monitor 24 Inch",     "kategori" => "Monitor",   "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "Laptop",    "harga" => 8500000, "stok" => 3],
    ["nama" => "Mechanical Keyboard", "kategori" => "Aksesoris", "harga" => 650000,  "stok" => 12],
    ["nama" => "Wireless Mouse",      "kategori" => "Aksesoris", "harga" => 175000,  "stok" => 25],
    ["nama" => "Headset Gaming",      "kategori" => "Audio",     "harga" => 450000,  "stok" => 0],
    ["nama" => "Webcam Full HD",      "kategori" => "Kamera",    "harga" => 320000,  "stok" => 7],
];

// Konfigurasi diskon (Challenge)
const BATAS_DISKON  = 1000000; // harga minimal untuk dapat diskon
const PERSEN_DISKON = 10;      // persentase diskon

// Fungsi format Rupiah
function formatRupiah($angka)
{
    return "Rp" . number_format($angka, 0, ",", ".");
}

// Fungsi hitung harga setelah diskon
function hitungHargaDiskon($harga, $persen)
{
    return $harga - ($harga * $persen / 100);
}
