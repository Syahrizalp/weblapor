<!-- app/Views/layout/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Lapor Pak' ?></title>
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
            left: 30px;
            transform: translateY(-50%);
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
    <a href="<?= base_url('dashboard') ?>" class="<?= uri_string() === 'dashboard' ? 'active' : '' ?>">Home</a>
    <a href="<?= base_url('laporan-keluhan') ?>" class="<?= uri_string() === 'laporan-keluhan' ? 'active' : '' ?>">Laporan keluhan</a>
    <a href="#">Laporan Warga</a>
    <a href="#">Jawaban</a>
    <a href="#">About</a>
</div>
