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
<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-address-book" aria-hidden="true"></i>&nbsp; Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">No Sistem</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_pend" name="id_pend"
                        value="<?php echo $data_cek['id_pend']; ?>" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nik" name="nik"
                        value="<?php echo $data_cek['nik']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?php echo $data_cek['nama']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">No. Handphone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="phone" name="phone"
                        value="<?php echo $data_cek['phone']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tempat_lh" name="tempat_lh"
                        value="<?php echo $data_cek['tempat_lh']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl_lh" name="tgl_lh"
                        value="<?php echo $data_cek['tgl_lh']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <select name="jekel" id="jekel" class="form-control select2bs4">
                        <option value="">-- Pilih --</option>
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
                <label class="col-sm-2 col-form-label" id="label">Alamat</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="desa" name="desa" cols="30"
                        rows="3"><?php echo $data_cek['desa']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Blok/Nomor Rumah</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="blok" name="blok"
                        value="<?php echo $data_cek['blok']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nomor_rumah" name="nomor_rumah"
                        value="<?php echo $data_cek['nomor_rumah']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>" />
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Status Kepemilikan</label>
                <div class="col-sm-6">
                    <select name="status_kepemilikan" id="status_kepemilikan" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['status_kepemilikan'] == "Rumah Sendiri") echo "<option value='Rumah Sendiri' selected>Rumah Sendiri</option>";
                        else echo "<option value='Rumah Sendiri'>Rumah Sendiri</option>";

                        if ($data_cek['status_kepemilikan'] == "Kontrak") echo "<option value='Kontrak' selected>Kontrak</option>";
                        else echo "<option value='Kontrak'>Kontrak</option>";
                        ?>

                    </select>
                    <!-- <input type="text" class="form-control" id="status_kepemilikan" name="status_kepemilikan"
                        value="<?php echo $data_cek['status_kepemilikan']; ?>" /> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Agama</label>
                <div class="col-sm-6">
                    <select name="agama" id="agama" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['agama'] == "Islam") echo "<option value='Islam' selected>Islam</option>";
                        else echo "<option value='Islam'>Islam</option>";

                        if ($data_cek['agama'] == "Kristen Protestan") echo "<option value='Kristen Protestan' selected>Kristen Protestan</option>";
                        else echo "<option value='Kristen Protestan'>Kristen Protestan</option>";

                        if ($data_cek['agama'] == "Kristen Katolik") echo "<option value='Kristen Katolik' selected>Kristen Katolik</option>";
                        else echo "<option value='Kristen Katolik'>Kristen Katolik</option>";

                        if ($data_cek['agama'] == "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
                        else echo "<option value='Hindu'>Hindu</option>";

                        if ($data_cek['agama'] == "Buddha") echo "<option value='Buddha' selected>Buddha</option>";
                        else echo "<option value='Buddha'>Buddha</option>";

                        if ($data_cek['agama'] == "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
                        else echo "<option value='Konghucu'>Konghucu</option>";
                        ?>

                    </select>
                    <!-- <input type="text" class="form-control" id="agama" name="agama"
                        value="<?php echo $data_cek['agama']; ?>" /> -->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Status Perkawinan</label>
                <div class="col-sm-6">
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control select2bs4">
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
                <label class="col-sm-2 col-form-label" id="label">Pekerjaan</label>
                <div class="col-sm-6">
                    <select name="pekerjaan" id="pekerjaan" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['pekerjaan'] == "Guru") echo "<option value='Guru' selected>Guru</option>";
                        else echo "<option value='Guru'>Guru</option>";

                        if ($data_cek['pekerjaan'] == "Dosen") echo "<option value='Dosen' selected>Dosen</option>";
                        else echo "<option value='Dosen'>Dosen</option>";

                        if ($data_cek['pekerjaan'] == "Dokter") echo "<option value='Dokter' selected>Dokter</option>";
                        else echo "<option value='Dokter'>Dokter</option>";

                        if ($data_cek['pekerjaan'] == "Perawat") echo "<option value='Perawat' selected>Perawat</option>";
                        else echo "<option value='Perawat'>Perawat</option>";

                        if ($data_cek['pekerjaan'] == "Pengacara") echo "<option value='Pengacara' selected>Pengacara</option>";
                        else echo "<option value='Pengacara'>Pengacara</option>";

                        if ($data_cek['pekerjaan'] == "Notaris") echo "<option value='Notaris' selected>Notaris</option>";
                        else echo "<option value='Notaris'>Notaris</option>";

                        if ($data_cek['pekerjaan'] == "Wiraswasta/Pengusaha") echo "<option value='Wiraswasta/Pengusaha' selected>Wiraswasta/Pengusaha</option>";
                        else echo "<option value='Wiraswasta/Pengusaha'>Wiraswasta/Pengusaha</option>";

                        if ($data_cek['pekerjaan'] == "Karyawan Swasta") echo "<option value='Karyawan Swasta' selected>Karyawan Swasta</option>";
                        else echo "<option value='Karyawan Swasta'>Karyawan Swasta</option>";

                        if ($data_cek['pekerjaan'] == "PNS") echo "<option value='PNS' selected>PNS</option>";
                        else echo "<option value='PNS'>PNS</option>";

                        if ($data_cek['pekerjaan'] == "Polisi") echo "<option value='Polisi' selected>Polisi</option>";
                        else echo "<option value='Polisi'>Polisi</option>";

                        if ($data_cek['pekerjaan'] == "TNI") echo "<option value='TNI' selected>TNI</option>";
                        else echo "<option value='TNI'>TNI</option>";

                        if ($data_cek['pekerjaan'] == "Teknisi") echo "<option value='Teknisi' selected>Teknisi</option>";
                        else echo "<option value='Teknisi'>Teknisi</option>";

                        if ($data_cek['pekerjaan'] == "Buruh") echo "<option value='Buruh' selected>Buruh</option>";
                        else echo "<option value='Buruh'>Buruh</option>";

                        if ($data_cek['pekerjaan'] == "Petani/Nelayan") echo "<option value='Petani/Nelayan' selected>Petani/Nelayan</option>";
                        else echo "<option value='Petani/Nelayan'>Petani/Nelayan</option>";

                        if ($data_cek['pekerjaan'] == "Seniman/Artis") echo "<option value='Seniman/Artis' selected>Seniman/Artis</option>";
                        else echo "<option value='Seniman/Artis'>Seniman/Artis</option>";

                        if ($data_cek['pekerjaan'] == "Freelance") echo "<option value='Freelance' selected>Freelance</option>";
                        else echo "<option value='Freelance'>Freelance</option>";

                        if ($data_cek['pekerjaan'] == "Driver") echo "<option value='Driver' selected>Driver</option>";
                        else echo "<option value='Driver'>Driver</option>";

                        if ($data_cek['pekerjaan'] == "Pekerja Sosial") echo "<option value='Pekerja Sosial' selected>Pekerja Sosial</option>";
                        else echo "<option value='Pekerja Sosial'>Pekerja Sosial</option>";

                        if ($data_cek['pekerjaan'] == "Arsitek") echo "<option value='Arsitek' selected>Arsitek</option>";
                        else echo "<option value='Arsitek'>Arsitek</option>";

                        if ($data_cek['pekerjaan'] == "Peneliti") echo "<option value='Peneliti' selected>Peneliti</option>";
                        else echo "<option value='Peneliti'>Peneliti</option>";

                        if ($data_cek['pekerjaan'] == "Konsultan") echo "<option value='Konsultan' selected>Konsultan</option>";
                        else echo "<option value='Konsultan'>Konsultan</option>";

                        if ($data_cek['pekerjaan'] == "Pekerja Tambang") echo "<option value='Pekerja Tambang' selected>Pekerja Tambang</option>";
                        else echo "<option value='Pekerja Tambang'>Pekerja Tambang</option>";

                        if ($data_cek['pekerjaan'] == "Pemadam Kebakaran") echo "<option value='Pemadam Kebakaran' selected>Pemadam Kebakaran</option>";
                        else echo "<option value='Pemadam Kebakaran'>Pemadam Kebakaran</option>";

                        if ($data_cek['pekerjaan'] == "Pegawai BUMN (ASN)") echo "<option value='Pegawai BUMN (ASN)' selected>Pegawai BUMN (ASN)</option>";
                        else echo "<option value='Pegawai BUMN (ASN)'>Pegawai BUMN (ASN)</option>";

                        if ($data_cek['pekerjaan'] == "Vlogger/Content Creator") echo "<option value='Vlogger/Content Creator' selected>Vlogger/Content Creator</option>";
                        else echo "<option value='Vlogger/Content Creator'>Vlogger/Content Creator</option>";

                        if ($data_cek['pekerjaan'] == "Tidak Bekerja") echo "<option value='Tidak Bekerja' selected>Tidak Bekerja</option>";
                        else echo "<option value='Tidak Bekerja'>Tidak Bekerja</option>";

                        if ($data_cek['pekerjaan'] == "Mahasiswa/Pelajar") echo "<option value='Mahasiswa/Pelajar' selected>Mahasiswa/Pelajar</option>";
                        else echo "<option value='Mahasiswa/Pelajar'>Mahasiswa/Pelajar</option>";
                        ?>

                    </select>
                    <!-- <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                        value="<?php echo $data_cek['pekerjaan']; ?>" /> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kewarganegaraan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                        value="<?php echo $data_cek['kewarganegaraan']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Upload KTP</label>
                <div class="col-sm-6">
                    <input type="file" name="file_ktp" style="font-size:14px;" class="form-control"> <br>
                    <a href="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" target="_blank">
                        <img src="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" alt=""
                            style="width: 150px;">
                    </a>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
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