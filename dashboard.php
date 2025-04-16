<?php
include 'db.php';

$total = $checkin = 0;
$result = $conn->query("SELECT COUNT(*) as total FROM tamu");
if ($result) $total = $result->fetch_assoc()['total'];

$result = $conn->query("SELECT COUNT(*) as checkin FROM tamu WHERE checkin IS NOT NULL");
if ($result) $checkin = $result->fetch_assoc()['checkin'];

$tamuList = [];
$result = $conn->query("SELECT nama_lengkap, checkin FROM tamu ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    $tamuList[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Valinka & Adi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@10.0.0/dist/umd/simple-datatables.min.js"></script>
    <style>
        h1,
        h2 {
            font-family: 'Dancing Script', cursive;
        }

        .fall-flowers .flower {
            position: absolute;
            width: 30px;
            height: 30px;
            background-image: url('sakura.png');
            background-size: contain;
            background-repeat: no-repeat;
            animation: fall 12s linear infinite;
            opacity: 0.8;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="bg-pink-50 min-h-screen p-6 relative overflow-y-auto">

    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-3xl p-8 border-4 border-pink-200 relative z-20">

            <h1 class="text-4xl text-center text-rose-600 mb-8">Dashboard Tamu Valinka & Adi 💕</h1>

            <div class="grid grid-cols-2 gap-6 text-center mb-8">
                <div class="bg-rose-100 p-6 rounded-2xl shadow-md">
                    <p class="text-xl font-semibold text-rose-700">Total Undangan</p>
                    <p class="text-3xl font-bold text-rose-900"><?= $total ?> 💌</p>
                </div>
                <div class="bg-pink-100 p-6 rounded-2xl shadow-md">
                    <p class="text-xl font-semibold text-pink-700">Sudah Check-In</p>
                    <p class="text-3xl font-bold text-pink-900"><?= $checkin ?> ✅</p>
                </div>
            </div>


            <canvas id="myChart" class="mx-auto mb-6" width="300" height="300"></canvas>

            <div class="text-center mb-6">
                <a href="export_excel.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                    Export Excel
                </a>
            </div>

            <!-- Data Table -->
            <div class="overflow-x-auto">
                <table id="guestTable" class="min-w-full divide-y divide-rose-200 text-sm text-gray-700 rounded-xl">
                    <thead class="bg-pink-100 text-rose-700">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">Nama Tamu</th>
                            <th class="px-6 py-3 text-left font-semibold">Status Check-In</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-pink-100">
                        <?php foreach ($tamuList as $tamu): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($tamu['nama_lengkap']) ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($tamu['checkin']): ?>
                                        <span class="text-green-600 font-semibold">✅ Sudah Check-In</span>
                                    <?php else: ?>
                                        <span class="text-red-500 font-semibold">❌ Belum Check-In</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Check-In', 'Belum Check-In'],
                datasets: [{
                    label: 'Check-In Stats',
                    data: [<?= $checkin ?>, <?= $total - $checkin ?>],
                    backgroundColor: ['#ec4899', '#f87171']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@10.0.0/dist/style.min.css">
    <script>
        const dataTable = new simpleDatatables.DataTable("#guestTable", {
            searchable: true,
            fixedHeight: true,
            perPage: 5,
            labels: {
                placeholder: "Cari tamu...",
                perPage: " tamu per halaman",
                noRows: "Tidak ada data ditemukan",
                info: "Menampilkan {start} - {end} dari {rows} tamu"
            }
        });
    </script>

    <!-- Musik romantis -->
    <!-- <audio autoplay loop hidden>
    <source src="musik_romantis.mp3" type="audio/mpeg">
  </audio> -->

</body>

</html>