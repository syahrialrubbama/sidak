<?php
include "../inc/koneksi.php";

$dataGet = json_decode($_GET['filter'], 1);

function changeFormat($date)
{
    $explode = explode('/', $date);
    return $explode[2] . '-' . $explode[1] . '-' . $explode[0];
}
$startDate = changeFormat($dataGet['tanggalPeriode']['startDate']);
$endDate = changeFormat($dataGet['tanggalPeriode']['endDate']);
$jenisKelamin = $dataGet['jenisKelamin'];
$usia = $dataGet['usia'];



$sql = "SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala, DATE_FORMAT(p.tgl_lh, '%d/%m/%Y') as tgl_lh, DATE_FORMAT(p.created_at, '%d/%m/%Y') as created_at
FROM tb_pdd p 
LEFT JOIN tb_anggota a ON p.id_pend = a.id_pend 
LEFT JOIN tb_kk k ON a.id_kk = k.id_kk 
WHERE status = 'Ada'";

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND DATE(p.created_at) >= '$startDate' AND DATE(p.created_at) <= '$endDate'";
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

echo json_encode([
    'status' => true,
    'message' => 'Berhasil filter data',
    'result' => array_values($filterData),
]);
