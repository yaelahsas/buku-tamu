<?php
include 'db.php';

$total = $checkin = 0;
$result = $conn->query("SELECT COUNT(*) as total FROM tamu");
if ($result) $total = $result->fetch_assoc()['total'];

$result = $conn->query("SELECT COUNT(*) as checkin FROM tamu WHERE checkin IS NOT NULL");
if ($result) $checkin = $result->fetch_assoc()['checkin'];

// Ambil data tamu
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
  <title>Dashboard Undangan</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@8.1.2/dist/style.css" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-4xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Dashboard Undangan</h1>
    
    <div class="grid grid-cols-2 gap-6 text-center mb-6">
      <div class="bg-green-100 p-4 rounded-xl">
        <p class="text-xl font-semibold text-green-700">Total Undangan</p>
        <p class="text-2xl font-bold text-green-900"><?= $total ?></p>
      </div>
      <div class="bg-blue-100 p-4 rounded-xl">
        <p class="text-xl font-semibold text-blue-700">Sudah Check-In</p>
        <p class="text-2xl font-bold text-blue-900"><?= $checkin ?></p>
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
      <table id="guestTable" class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left font-medium">Nama Tamu</th>
            <th class="px-6 py-3 text-left font-medium">Status Check-In</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach ($tamuList as $tamu): ?>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($tamu['nama_lengkap']) ?></td>
            <td class="px-6 py-4">
              <?php if ($tamu['checkin']): ?>
                <span class="text-green-600 font-semibold">Sudah Check-In</span>
              <?php else: ?>
                <span class="text-red-600 font-semibold">Belum Check-In</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Script untuk Chart -->
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Check-In', 'Belum Check-In'],
        datasets: [{
          label: 'Check-In Stats',
          data: [<?= $checkin ?>, <?= $total - $checkin ?>],
          backgroundColor: ['#16a34a', '#ef4444']
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

  <!-- DataTable JS -->
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@8.1.2/dist/umd/simple-datatables.min.js"></script>
  <script>
    const dataTable = new simpleDatatables.DataTable("#guestTable", {
      searchable: true,
      fixedHeight: true,
      perPage: 5,
      labels: {
        placeholder: "Cari...",
        perPage: "{select} data per halaman",
        noRows: "Tidak ada data ditemukan",
        info: "Menampilkan {start} - {end} dari {rows} data"
      }
    });
  </script>
</body>
</html>
