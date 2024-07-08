<?php
include '../inc/koneksi.php';
$sql = "select * from tb_surat_domisili inner join tb_pdd on tb_surat_domisili.tb_pdd_id=tb_pdd.id_pend order by id asc";

$querySelect = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_all($querySelect, MYSQLI_ASSOC);
$getData = $data;


echo json_encode([
    'status' => true,
    'message' => 'Berhasil ambil data',
    'result' => array_values($getData),
]);
