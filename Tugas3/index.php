<?php
// Fungsi untuk menentukan status AC berdasarkan suhu dan kelembaban
function statusAC($suhu, $kelembaban)
{
    if ($suhu < 18) {
        return "AC mati";
    } elseif ($suhu >= 18 && $suhu < 22) {
        if ($kelembaban < 40) {
            return "AC menyala rendah";
        } else {
            return "AC menyala sedang";
        }
    } elseif ($suhu >= 22 && $suhu < 26) {
        if ($kelembaban < 50) {
            return "AC menyala sedang";
        } elseif ($kelembaban >= 50 && $kelembaban <= 70) {
            return "AC menyala tinggi";
        } else {
            return "AC menyala berat";
        }
    } elseif ($suhu >= 26 && $suhu < 30) {
        if ($kelembaban < 60) {
            return "AC menyala tinggi";
        } else {
            return "AC menyala berat";
        }
    } else { // Suhu >= 30
        return "AC menyala berat";
    }
}

// Cek apakah form telah disubmit menggunakan metode POST
$status = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mendapatkan input dari pengguna
    $suhu = isset($_POST['suhu']) ? $_POST['suhu'] : 0;
    $kelembaban = isset($_POST['kelembaban']) ? $_POST['kelembaban'] : 0;

    // Memanggil fungsi statusAC dan menampilkan hasilnya
    $status = statusAC($suhu, $kelembaban);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status AC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .status {
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cek Status AC</h1>
        <form method="post" action="">
            <label for="suhu">Suhu (°C):</label>
            <input type="number" id="suhu" name="suhu" required>

            <label for="kelembaban">Kelembaban (%):</label>
            <input type="number" id="kelembaban" name="kelembaban" required>

            <input type="submit" value="Cek Status">
        </form>
        <?php if ($status): ?>
            <div class="status">Status AC: <?php echo $status; ?></div>
        <?php endif; ?>
    </div>
</body>

</html>
