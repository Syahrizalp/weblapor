<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keluhan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<!-- Kopi dari header dan nav dashboard jika ingin tampil konsisten -->
<?php include('header.php'); ?>

<div class="content" style="padding: 20px;">
    <h2>Daftar Laporan Keluhan</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Keluhan</th>
                <th>Lokasi</th>
                <th>Tanggal Lapor</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $row): ?>
                <tr>
                    <td><?= esc($row['nama_pelapor']) ?></td>
                    <td><?= esc($row['keluhan']) ?></td>
                    <td><?= esc($row['lokasi']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td> 
                    <td>
                        <?php if (!empty($row['bukti'])): ?>
                            <button onclick="openImagePopup('<?= base_url('uploads/' . $row['bukti']) ?>')"
                                style="padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                Lihat
                            </button>
                        <?php else: ?>
                            Tidak ada
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
<!-- Popup Gambar Bukti -->
<!-- Popup Gambar Bukti -->
<div id="imagePopupOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1000;">
    <div style="position:relative; width:90%; max-width:600px; margin:80px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.3);">
        
        <!-- Tombol Close -->
        <button onclick="closeImagePopup()" 
            style="
                position: absolute; 
                top: 0px; 
                right: 0px; 
                background:#fff;
                color: #000; 
                width: 35px; 
                height: 35px; 
                font-size: 20px; 
                font-weight: bold; 
                cursor: pointer;
            ">
            &times;
        </button>

        <img id="popupImage" src="" alt="Bukti Keluhan" style="width:100%; max-height:400px; object-fit:contain;">
    </div>
</div>


<script>
function openImagePopup(imageUrl) {
    document.getElementById('popupImage').src = imageUrl;
    document.getElementById('imagePopupOverlay').style.display = 'block';
}

function closeImagePopup() {
    document.getElementById('popupImage').src = ''; // reset gambar
    document.getElementById('imagePopupOverlay').style.display = 'none';
}
</script>

</html>
