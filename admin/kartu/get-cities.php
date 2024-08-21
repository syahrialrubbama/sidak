<?php

include '../../inc/koneksi.php';

$koneksi = mysqli_connect($servername, $username, $password, $dbname);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['province_id'])) {
    $province_id = $_GET['province_id'];

    $query = "SELECT * FROM reg_regencies WHERE province_id = '$province_id' ORDER BY name ASC";
    $hasil = mysqli_query($koneksi, $query);

    $cities = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $cities[] = ['id' => $row['id'], 'name' => $row['name']];
    }

    mysqli_close($koneksi);

    echo json_encode($cities);
} else {
    echo json_encode([]);
}
?>