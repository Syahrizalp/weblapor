<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Lapor Pak</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
        }
        .header {
            position: relative;
            height: 300px;
            background-image: url('<?= base_url('assets/images/dashboard-bg.jpg') ?>');
            background-size: cover;
            background-position: center;
            color: white;
        }
       .header-text {
    position: absolute;
    top: 50%;
    left: 30px; /* tetap agak kiri */
    transform: translateY(-50%); /* untuk vertikal centering */
    font-size: 24px;
    font-weight: bold;
    line-height: 1.4;
}

        .nav {
            display: flex;
            justify-content: center;
            padding: 15px 0;
            background-color: #fff;
            border-bottom: 2px solid #eee;
        }
        .nav a {
            margin: 0 25px;
            text-decoration: none;
            color: black;
            font-weight: 500;
            font-size: 16px;
            position: relative;
        }
        .nav a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: black;
        }
        .profile {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-text">
        WEBSITE LAPOR PAK <br>
        MEMBERIKAN LAYANAN KELUH <br>
        KESAH MASYARAKAT
    </div>
    <div class="profile">
        <img src="<?= base_url('assets/images/profile.png') ?>" alt="Profile">
    </div>
</div>

<div class="nav">
    <a href="<?= base_url('dashboard') ?>" class="active">Home</a>
    <a href="#">Laporan keluhan</a>
    <a href="#">Laporan Warga</a>
    <a href="#">Jawaban</a>
    <a href="#">About</a>
</div>

<!-- Konten utama bisa ditambahkan di sini -->
<div class="content" style="padding: 20px;">
    <h2>Selamat datang di Dashboard Lapor Pak!</h2>
    <p>Silakan pilih menu di atas untuk melanjutkan.</p>
    <p>Dibuat oleh: A'an Abdul Nidhom & Syahrizal Prhastia T.A</p>

    <!-- Tombol untuk membuka popup -->
    <button onclick="openPopup()" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Lapor Keluhan
    </button>
</div>

<!-- Popup Form Modal -->
<div id="popupOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: relative; width: 90%; max-width: 500px; margin: 100px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.4);">

        <!-- Tombol Close (X) -->
        <button onclick="closePopup()" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 20px; font-weight: bold; cursor: pointer; color: #333;">
            &times;
        </button>

        <h3 style="margin-top: 0;">Form Lapor</h3>
        <form action="<?= base_url('/lapor/kirim') ?>" method="post" enctype="multipart/form-data" style="font-size: 14px;">
            <label for="name">Nama</label><br>
            <input type="text" id="name" name="name" placeholder="Masukkan nama" style="width: 100%; margin-bottom: 0px; padding: 6px;"><br>

            <label for="keluhan">Keluhan</label><br>
            <textarea id="keluhan" name="keluhan" placeholder="Masukkan keluhan" rows="3" style="width: 100%; margin-bottom: 0px; padding: 6px;"></textarea><br>

            <label for="lokasi">Lokasi</label><br>
            <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan alamat lokasi" style="width: 100%; margin-bottom: 0px; padding: 6px;"><br>

            <label for="bukti">Unggah Bukti</label><br>
            <input type="file" id="bukti" name="bukti" style="margin-bottom: 8px;"><br>

            <button type="submit" style="padding: 8px 16px; background-color: green; color: white; border: none; border-radius: 5px;">
                Kirim
            </button>
        </form>

    </div>
</div>

<script>
function openPopup() {
    document.getElementById('popupOverlay').style.display = 'block';
}
function closePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
}
</script>

<?php if (session()->getFlashdata('popup_message')) : ?>
<script>
    alert("<?= session()->getFlashdata('popup_message') ?>");
</script>
<?php endif; ?>

</body>
</html>
