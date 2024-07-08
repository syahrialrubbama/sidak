<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pdd WHERE id_pend='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<style>
    #label {
        font-weight: 450;
    }
</style>
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-user-circle" aria-hidden="true"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">No Sistem</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_cek['id_pend']; ?>" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">No. Handphone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $data_cek['phone']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">TTL</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <select name="jekel" id="jekel" class="form-control">
                        <option value="">-- Pilih jekel --</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                        else echo "<option value='Laki-Laki'>Laki-Laki</option>";

                        if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                        else echo "<option value='Perempuan'>Perempuan</option>";
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Desa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="desa" name="desa" value="<?php echo $data_cek['desa']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Blok/Nomor Rumah</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="blok" name="blok" value="<?php echo $data_cek['blok']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nomor_rumah" name="nomor_rumah" value="<?php echo $data_cek['nomor_rumah']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Kepemilikan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="status_kepemilikan" name="status_kepemilikan" value="<?php echo $data_cek['status_kepemilikan']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data_cek['agama']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                <div class="col-sm-3">
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['status_perkawinan'] == "Menikah") echo "<option value='Menikah' selected>Menikah</option>";
                        else echo "<option value='Menikah'>Menikah</option>";

                        if ($data_cek['status_perkawinan'] == "Lajang (Belum Menikah)") echo "<option value='Lajang (Belum Menikah)' selected>Lajang (Belum Menikah)</option>";
                        else echo "<option value='Lajang (Belum Menikah)'>Lajang (Belum Menikah)</option>";

                        if ($data_cek['status_perkawinan'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                        else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                        if ($data_cek['status_perkawinan'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                        else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kewarganegaraan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?php echo $data_cek['kewarganegaraan']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload KTP</label>
                <div class="col-sm-6">
                    <input type="file" name="file_ktp" class="form-control"> <br>
                    <a href="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" target="_blank">
                        <img src="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" alt="" style="width: 150px;">
                    </a>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Ubah'])) {
    $file_ktp = $_FILES['file_ktp']['name'];
    $file_ktp_tmp = $_FILES['file_ktp']['tmp_name'];
    $upload_dir = 'public/upload/dataPenduduk/';
    $fileName = time() . '_' . str_replace(' ', '_', $file_ktp);
    $upload_name = $upload_dir . $fileName;

    $id_pend = $_POST['id_pend'];
    if (!empty($file_ktp_tmp)) {
        move_uploaded_file($file_ktp_tmp, $upload_name);
    }

    if ($id_pend) {
        $sql_file = "SELECT file_ktp FROM tb_pdd WHERE id_pend='$id_pend'";
        $query_file = mysqli_query($koneksi, $sql_file);
        $data_file = mysqli_fetch_array($query_file, MYSQLI_BOTH);
        if (file_exists($upload_dir . $data_file['file_ktp']) && $data_file['file_ktp']) {
            unlink($upload_dir . $data_file['file_ktp']);
        }
    } else {
        $upload_name = "default.png";
    }

    $id_pend = $_POST['id_pend'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $tempat_lh = $_POST['tempat_lh'];
    $tgl_lh = $_POST['tgl_lh'];
    $jekel = $_POST['jekel'];
    $desa = $_POST['desa'];
    $blok = $_POST['blok'];
    $nomor_rumah = $_POST['nomor_rumah'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $status_kepemilikan = $_POST['status_kepemilikan'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $file_ktp = $fileName;

    $sql_ubah = "UPDATE tb_pdd SET nik='$nik', nama='$nama', phone='$phone', tempat_lh='$tempat_lh', tgl_lh='$tgl_lh', jekel='$jekel', desa='$desa', blok='$blok', nomor_rumah='$nomor_rumah', rt='$rt', rw='$rw', status_kepemilikan='$status_kepemilikan', agama='$agama', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan', file_ktp='$file_ktp' WHERE id_pend='$id_pend'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
    }
}
