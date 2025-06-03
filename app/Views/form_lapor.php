<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Lapor</title>
    <style>
        body {
            background: url('<?= base_url('images/bg.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .logo {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="logo">
            <img src="<?= base_url('images/logo.png') ?>" width="60" alt="Logo">
            <h2>Lapor Pak</h2>
            <strong>Form Lapor</strong>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <ul style="color:red;">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="<?= base_url('/lapor/kirim') ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Enter name" value="<?= old('name') ?>">
            <textarea name="keluhan" placeholder="Enter Keluhan"><?= old('keluhan') ?></textarea>
            <input type="text" name="lokasi" placeholder="Enter Lokasi" value="<?= old('lokasi') ?>">
            <input type="file" id="bukti" name="bukti">
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
