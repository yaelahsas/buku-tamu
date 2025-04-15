<?php
include 'db.php';
date_default_timezone_set('Asia/Jakarta');
// Ambil input JSON yang dikirim melalui POST
$data = json_decode(file_get_contents('php://input'), true);

$nama = $data['name'] ?? '';
$checkinTime = $data['checkinTime'] ?? '';
$keterangan = $data['keterangan'] ?? '';

if ($nama && $checkinTime) {
    $checkin = date('Y-m-d H:i:s'); // waktu check-in
    $now = date('Y-m-d H:i:s'); // waktu saat ini

    // Menyimpan data ke database
    $stmt = $conn->prepare("INSERT INTO tamu (nama_lengkap, checkin, keterangan, create_at) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $nama, $checkin,$keterangan, $now);
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Nama atau waktu check-in tidak valid"]);
}

$conn->close();
