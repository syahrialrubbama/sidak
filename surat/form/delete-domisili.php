<?php
include '../../inc/koneksi.php';
$id = $_POST['id'];
$query = "DELETE FROM tb_surat_domisili WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $query);

header('Content-Type: application/json'); // Set response header ke JSON
if ($hasil) {
    echo json_encode(array('status' => true, 'message' => 'Data berhasil dihapus!'));
} else {
    echo json_encode(array('status' => false, 'message' => mysqli_error($koneksi)));
}
