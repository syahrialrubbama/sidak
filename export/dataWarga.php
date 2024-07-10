<?php
include "../inc/koneksi.php";
include '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

// Fetch and filter the data
function explodeTanggal($data)
{
    $data = explode('/', $data);
    return $data[2] . '-' . $data[1] . '-' . $data[0];
}

$dataGet = json_decode($_GET['filter'], true);
$startDate = explodeTanggal($dataGet['tanggalPeriode']['startDate']);
$endDate = explodeTanggal($dataGet['tanggalPeriode']['endDate']);
$jenisKelamin = $dataGet['jenisKelamin'];
$usia = $dataGet['usia'];

$sql = "SELECT p.*, a.id_kk, k.no_kk, k.kepala, DATE_FORMAT(p.tgl_lh, '%d/%m/%Y') as tgl_lh 
        FROM tb_pdd p 
        LEFT JOIN tb_anggota a ON p.id_pend = a.id_pend 
        LEFT JOIN tb_kk k ON a.id_kk = k.id_kk 
        WHERE status = 'Ada'";
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND DATE(p.updated_at) BETWEEN '$startDate' AND '$endDate'";
}

if (!empty($jenisKelamin)) {
    $sql .= " AND p.jekel = '$jenisKelamin'";
}

$querySelect = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_all($querySelect, MYSQLI_ASSOC);
$filterData = $data;

if (!empty($usia)) {
    $filterData = array_filter($data, function ($row) use ($usia) {
        $birthdate = DateTime::createFromFormat('d/m/Y', $row['tgl_lh']);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthdate)->y;
        return $age == $usia;
    });
}
$data = $filterData;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

// Define the header columns
$header = [
    'nik' => 'NIK',
    'nama' => 'Nama',
    'phone' => 'Phone',
    'tempat_lh' => 'Tempat Lahir',
    'tgl_lh' => 'Tanggal Lahir',
    'jekel' => 'Jenis Kelamin',
    'desa' => 'Desa',
    'blok' => 'Blok',
    'nomor_rumah' => 'Nomor Rumah',
    'rt' => 'RT',
    'rw' => 'RW',
    'status_kepemilikan' => 'Status Kepemilikan',
    'agama' => 'Agama',
    'pekerjaan' => 'Pekerjaan',
    'status_perkawinan' => 'Status Perkawinan',
    'kewarganegaraan' => 'Kewarganegaraan',
    'status' => 'Status',
    'no_kk' => 'No KK',
    'kepala' => 'Kepala Keluarga'
];

// Set the header columns in the worksheet
$column = 'A';
foreach ($header as $key => $heading) {
    $activeWorksheet->setCellValue($column . '1', $heading);
    $activeWorksheet->getStyle($column . '1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle($column . '1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

    // Adjust column width
    $maxLen = strlen($heading);
    foreach ($data as $row) {
        $maxLen = max($maxLen, strlen($row[$key]));
    }
    $activeWorksheet->getColumnDimension($column)->setWidth($maxLen + 2);

    $column++;
}

// Populate the worksheet with data
$rowNum = 2;
foreach ($data as $row) {
    $column = 'A';
    foreach ($header as $key => $heading) {
        $activeWorksheet->setCellValue($column . $rowNum, $row[$key]);
        $activeWorksheet->getStyle($column . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle($column . $rowNum)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $column++;
    }
    $rowNum++;
}

// Write the spreadsheet to a file and output it
$writer = new Xlsx($spreadsheet);
$filename = 'report-data-warga.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
