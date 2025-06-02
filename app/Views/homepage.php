<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporPak - Laporkan Keluhan Anda</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-color: #f0eecf;
        }
        header {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0eecf;
        }
        .logo, .menu {
            font-size: 1.5rem;
        }
        .button-lapor {
            background-color: #2b4b7c;
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin: 1rem;
        }
        .laporan-container {
            background-color: #f4eade;
            border-radius: 20px;
            margin: 1rem;
            padding: 1rem;
        }
        .laporan-container img {
            width: 100%;
            border-radius: 10px;
        }
        .user-info {
            font-weight: bold;
        }
        .icons {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        .icons span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .respon-box {
            background-color: white;
            padding: 0.5rem 1rem;
            border-radius: 15px;
            float: right;
        }
    </style>
</head>
<body>

<header>
    <div class="menu">☰</div>
    <div class="logo">laporpak.com</div>
</header>

<main>
    <h1 style="margin-left: 1rem;">Laporkan Keluhan Anda</h1>
    <a href="#" class="button-lapor">LAPOR DI SINI</a>

    <section>
        <h2 style="margin: 1rem;">Catatan Laporan Masyarakat</h2>

        <?php
        // Dummy data untuk tampilan awal
        $laporan = [
            [
                "nama" => "Rijalsukagoyounjung",
                "kota" => "Buduran",
                "foto" => "https://www.toyota.astra.co.id/sites/default/files/2023-03/TC%2010%20MARET%20-%20TIPS%20MENGHINDAR%20DARI%20LUBANG%20JALAN%20%28UMUM%29.jpg", // Gambar jalan rusak
                "isi" => "jalan rusak di area buduran dari 2023 hingga saat ini",
                "like" => 200,
                "dislike" => 43,
                "komentar" => 43,
                "respon" => 3
            ],
            [
                "nama" => "RusdiBabershop",
                "kota" => "Ngawi",
                "foto" => "https://i.imgur.com/XNyb0YA.jpg", // Gambar pembersihan lahan
                "isi" => "pembersihan lahan bekas tempat sampah di ngawi",
                "like" => 120,
                "dislike" => 8,
                "komentar" => 15,
                "respon" => 1
            ]
        ];

        foreach ($laporan as $lapor): ?>
            <div class="laporan-container">
                <div class="user-info">
                    <?= $lapor['nama']; ?> - Warga <?= $lapor['kota']; ?>
                    <div style="font-weight: normal; font-size: small;">mengirim laporan ini</div>
                </div>
                <img src="<?= $lapor['foto']; ?>" alt="gambar laporan">
                <p><?= $lapor['isi']; ?></p>
                <div class="icons">
                    <span>👍 <?= $lapor['like']; ?></span>
                    <span>👎 <?= $lapor['dislike']; ?></span>
                    <span>💬 <?= $lapor['komentar']; ?></span>
                </div>
                <div class="respon-box">🔄 <?= $lapor['respon']; ?> Respon pemerintah setempat</div>
            </div>
        <?php endforeach; ?>
    </section>
</main>

</body>
</html>
