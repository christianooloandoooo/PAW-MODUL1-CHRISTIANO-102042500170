<?php
// index.php - tampilan (HTML). Data dan fungsi ada di data.php
require_once "data.php";

// Jumlah seluruh produk dihitung otomatis
$totalProduk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar / Header -->
    <header>
        <div class="container navbar">
            <div class="logo">Cia Store</div>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#produk">Products</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">

        <!-- Hero / Bagian pembuka -->
        <section class="hero" id="home">
            <small>Cia Store</small>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a class="btn-hero" href="#produk">Lihat Produk</a>
        </section>

        <!-- Informasi jumlah produk -->
        <section id="produk">
            <div class="section-head">
                <div>
                    <small>Our Products</small>
                    <h2>Katalog Produk</h2>
                </div>
                <div class="total">Total Produk: <strong><?= $totalProduk; ?></strong></div>
            </div>

            <!-- Katalog produk: perulangan PHP -->
            <div class="katalog">
                <?php foreach ($produk as $item): ?>
                    <?php
                    // Percabangan: diskon berdasarkan harga
                    $dapatDiskon = $item["harga"] >= BATAS_DISKON;
                    $hargaAkhir  = $dapatDiskon
                        ? hitungHargaDiskon($item["harga"], PERSEN_DISKON)
                        : $item["harga"];

                    // Percabangan: status berdasarkan stok
                    $tersedia = $item["stok"] > 0;
                    ?>
                    <article class="card">
                        <div class="kategori">
                            <?= htmlspecialchars($item["kategori"]); ?>
                            <?php if ($dapatDiskon): ?>
                                <span class="badge-diskon">DISKON <?= PERSEN_DISKON; ?>%</span>
                            <?php endif; ?>
                        </div>

                        <h3><?= htmlspecialchars($item["nama"]); ?></h3>

                        <div class="harga-normal">
                            <?= $dapatDiskon ? formatRupiah($item["harga"]) : ""; ?>
                        </div>
                        <div class="harga"><?= formatRupiah($hargaAkhir); ?></div>

                        <div class="info-stok">
                            <span>Stok: <?= $item["stok"]; ?></span>
                            <?php if ($tersedia): ?>
                                <span class="status tersedia">Tersedia</span>
                            <?php else: ?>
                                <span class="status habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($tersedia): ?>
                            <button class="btn-beli" type="button">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-beli" type="button" disabled>Beli Sekarang</button>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer id="about">
        <div class="container">
            &copy; <?= date("Y"); ?> Cia Store. Dibuat dengan HTML, CSS, dan PHP Native.
        </div>
    </footer>

</body>
</html>