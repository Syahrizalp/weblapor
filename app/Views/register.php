<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Pak - Buat Akun</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="image-side">
            <img src="<?= base_url('assets/images/background.jpg') ?>" class="bg-image" alt="Lapangan">
        </div>
        <div class="form-side">
            <div class="form-box">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="logo">
                <h2>Buat Akun</h2>

                <?php if (session()->getFlashdata('error')) : ?>
                    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <p style="color:green"><?= session()->getFlashdata('success') ?></p>
                <?php endif; ?>

                <form action="<?= base_url('register/save') ?>" method="post">
                    <label for="nama">Name</label>
                    <input type="text" name="nama" id="nama" placeholder="Enter name" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" required>

                    <label for="confirm">Confirm Password</label>
                    <input type="password" name="confirm" id="confirm" placeholder="Confirm password" required>

                    <div class="checkbox">
                        <input type="checkbox" id="showPassword" onclick="togglePassword()">
                        <label for="showPassword">Show Password</label>
                    </div>

                    <div class="options">
                        <a href="<?= base_url('login') ?>">Sudah punya akun?</a>
                    </div>

                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (session()->getFlashdata('popup_message')) : ?>
    <script>
        alert("<?= session()->getFlashdata('popup_message') ?>");
    </script>
    <?php endif; ?>

    <script>
    function togglePassword() {
        const pw1 = document.getElementById("password");
        const pw2 = document.getElementById("confirm");
        const type = pw1.type === "password" ? "text" : "password";
        pw1.type = pw2.type = type;
    }
    </script>
</body>
</html>
