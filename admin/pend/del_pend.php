<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * from tb_pdd where id_pend ='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    $file_ktp = $data_cek['file_ktp'];

    $director = 'public/upload/dataPenduduk/';
    $file = $director . $file_ktp;
    if (file_exists($file)) {
        unlink($file);
    }

    $sql_hapus = "DELETE FROM tb_pdd WHERE id_pend='" . $_GET['kode'] . "'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pend';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pend';
                    }
                })</script>";
    }
}
