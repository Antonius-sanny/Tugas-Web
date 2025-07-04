<?php
// --- koneksi database ---
include "koneksi.php";

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// --- proses simpan data ---
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $instansi = mysqli_real_escape_string($koneksi, $_POST['instansi']);
    $tujuan = mysqli_real_escape_string($koneksi, $_POST['tujuan']);

    $sql = "INSERT INTO tamu (id, nama, instansi, tujuan, tanggal, jam) VALUES ('','$nama', '$instansi', '$tujuan',now(),now())";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data berhasil disimpan');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Buku Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .container {
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    width: 350px;
    z-index: 1;
    transform: translateY(-130px); /* Geser ke atas sekitar 10 cm */
}


        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #1d72b8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #155d8b;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
        }

        @media (max-width: 400px) {
            .container {
                width: 90%;
            }

            .footer {
                font-size: 13px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Buku Tamu</h2>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="instansi">Instansi:</label>
            <input type="text" name="instansi" id="instansi" required>

            <label for="tujuan">Tujuan:</label>
            <input type="text" name="tujuan" id="tujuan" required>

            <input type="submit" name="simpan" value="Simpan">
        </form>
    </div>

    <div class="footer">
        SMA N 1 AMBARAWA
    </div>
</body>
</html>
