<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * from tb_kk where id_kk ='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    $file_kk = $data_cek['file_kk'];

    $director = 'public/upload/kartuKeluarga/';
    $file = $director . $file_kk;
    if (file_exists($file)) {
        unlink($file);
    }

    $sql_hapus = "DELETE FROM tb_kk WHERE id_kk='" . $_GET['kode'] . "'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-kartu';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-kartu';
                    }
                })</script>";
    }
}
