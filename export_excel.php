<?php
require 'vendor/autoload.php'; // Pastikan ini sesuai path Composer kamu
include 'db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Buat spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set judul kolom
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nama Lengkap');
$sheet->setCellValue('C1', 'Check-In');
$sheet->setCellValue('D1', 'Created At');

// Ambil data dari database
$query = "SELECT id, nama_lengkap, checkin, create_at FROM tamu ORDER BY id ASC";
$result = $conn->query($query);

if (!$result) {
    die("Query error: " . $conn->error);
}

$rowNum = 2; // Mulai dari baris ke-2
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowNum, $row['id']);
    $sheet->setCellValue('B' . $rowNum, $row['nama_lengkap']);
    $sheet->setCellValue('C' . $rowNum, $row['checkin']);
    $sheet->setCellValue('D' . $rowNum, $row['create_at']);
    $rowNum++;
}

// Set header untuk download
$filename = "undangan_" . date('Y-m-d_H-i-s') . ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

// Tulis file ke output
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

$conn->close();
exit;
?>
