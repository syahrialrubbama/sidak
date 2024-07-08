<?php 
require_once('inc/koneksi.php');
// extracting POST Variables
extract($_POST);
    $error = [];
    $check = $conn->query("SELECT * FROM `tb_pdd` where nik = '{$nik}'". (isset($id) && $id > 0 ? " and id != '{$id}' " : "" ));
    if($check->num_rows > 0){
        $error['field_name'] = 'nik';
        $error['msg']=" Code already exists on the product list";
    }
    echo json_encode($error);
?>