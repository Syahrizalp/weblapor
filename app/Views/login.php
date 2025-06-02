<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Pak - Login</title>
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
                <h2>Laporkan keluhan 
                    <br>anda disini!!</h2>

                <?php if (session()->getFlashdata('error')) : ?>
                    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>

                <form action="<?= base_url('login/auth') ?>" method="post">
                    <label for="email">Login</label>
                    <input type="text" name="email" id="email" placeholder="Email and phone number" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>

                    <div class="checkbox">
                        <input type="checkbox" id="showPassword" onclick="togglePassword()">
                        <label for="showPassword">Show Password</label>
                    </div>

                    <div class="options">
                        <a href="<?= base_url('register') ?>">Belum punya akun?</a>
                    </div>

                    <button type="submit">Sign in</button>
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
        const password = document.getElementById("password");
        password.type = password.type === "password" ? "text" : "password";
    }
    </script>
</body>
</html>
