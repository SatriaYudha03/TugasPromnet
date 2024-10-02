<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Daftar Siswa</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Rata-rata</th>
                    <th>Status</th>
                    <th>Mata Pelajaran Terendah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data siswa dalam array multidimensi
                $siswa = [
                    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
                    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
                    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
                    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
                    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
                ];

                // Inisialisasi variabel untuk menghitung jumlah siswa yang lulus dan tidak lulus
                $totalLulus = 0;
                $totalTidakLulus = 0;

                // Fungsi untuk menentukan mata pelajaran dengan nilai terendah
                function mataPelajaranTerendah($siswa)
                {
                    $nilaiMapel = [
                        "matematika" => $siswa["matematika"],
                        "bahasa_inggris" => $siswa["bahasa_inggris"],
                        "ipa" => $siswa["ipa"]
                    ];
                    $minMapel = array_keys($nilaiMapel, min($nilaiMapel));
                    return $minMapel[0];
                }

                // Proses perhitungan untuk setiap siswa
                foreach ($siswa as &$data) {
                    $rataRata = ($data["matematika"] + $data["bahasa_inggris"] + $data["ipa"]) / 3;
                    $data["rata_rata"] = $rataRata;

                    if ($rataRata >= 75) {
                        $data["status"] = "Lulus";
                        $totalLulus++;
                    } else {
                        $data["status"] = "Tidak Lulus";
                        $data["mapel_terendah"] = mataPelajaranTerendah($data);
                        $totalTidakLulus++;
                    }

                    echo "<tr>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>" . number_format($data['rata_rata'], 2) . "</td>";
                    echo "<td>{$data['status']}</td>";

                    if ($data['status'] === 'Tidak Lulus') {
                        echo "<td>{$data['mapel_terendah']}</td>";
                    } else {
                        echo "<td>-</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="summary">
            <p>Total Siswa Lulus: <?php echo $totalLulus; ?></p>
            <p>Total Siswa Tidak Lulus: <?php echo $totalTidakLulus; ?></p>
        </div>
    </div>
</body>

</html>
