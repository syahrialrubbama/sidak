<?php
include '../../inc/koneksi.php';

$dataPost = $_POST;
if ($dataPost['type'] == 'add') {
    $formData = $dataPost['data'];

    $tb_pdd_id = $formData['tb_pdd_id'];
    $alasan_buat_surat = $formData['alasan_buat_surat'];
    $tujuan_buat_surat = $formData['tujuan_buat_surat'];
    $no_surat = $formData['no_surat'];

    $query = "INSERT INTO tb_surat_domisili (tb_pdd_id, alasan_buat_surat, tujuan_buat_surat, no_surat) VALUES ('$tb_pdd_id', '$alasan_buat_surat', '$tujuan_buat_surat', '$no_surat')";
    $result = mysqli_query($koneksi, $query);

    header('Content-Type: application/json'); // Set response header ke JSON

    if ($result) {
        echo json_encode(array('status' => true, 'message' => 'Data berhasil disimpan!'));
    } else {
        echo json_encode(array('status' => false, 'message' => mysqli_error($koneksi)));
    }
} else {
    $formData = $dataPost['data'];

    $id = $dataPost['id'];
    $tb_pdd_id = $formData['tb_pdd_id'];
    $alasan_buat_surat = $formData['alasan_buat_surat'];
    $tujuan_buat_surat = $formData['tujuan_buat_surat'];
    $no_surat = $formData['no_surat'];

    $query = "UPDATE tb_surat_domisili SET tb_pdd_id = '$tb_pdd_id', alasan_buat_surat = '$alasan_buat_surat', tujuan_buat_surat = '$tujuan_buat_surat', no_surat = '$no_surat' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    header('Content-Type: application/json'); // Set response header ke JSON

    if ($result) {
        echo json_encode(array('status' => true, 'message' => 'Data berhasil diupdate!'));
    } else {
        echo json_encode(array('status' => false, 'message' => mysqli_error($koneksi)));
    }
}