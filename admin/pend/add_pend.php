<style>
#label {
    font-weight: 450;
}
</style>

<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-list"></i>&nbsp; Tambah Data Warga
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label label" id="label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Warga" required
                        autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nomor Telpon</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telpon" required
                        autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir"
                        required>
                </div>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select name="jekel" id="jekel" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Alamat</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="desa" name="desa" placeholder="Alamat" cols="30"
                        rows="3" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Blok/Nomor Rumah</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="blok" name="blok" placeholder="Blok" required>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nomor_rumah" name="nomor_rumah"
                        placeholder="Nomor Rumah" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Status Kepemilikan</label>
                <div class="col-sm-6">
                    <select name="status_kepemilikan" id="status_kepemilikan" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option>Rumah Sendiri</option>
                        <option>Kontrak</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Agama</label>
                <div class="col-sm-6">
                    <!-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required> -->
                    <select name="agama" id="agama" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option>Islam</option>
                        <option>Kristen Protestan</option>
                        <option>Kristen Katolik</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Konghucu</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Status Perkawinan</label>
                <div class="col-sm-6">
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option>Menikah</option>
                        <option>Lajang (Belum Menikah)</option>
                        <option>Cerai Mati</option>
                        <option>Cerai Hidup</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Pekerjaan</label>
                <div class="col-sm-6">
                    <!-- <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required> -->
                    <select name="pekerjaan" id="pekerjaan" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option>Guru</option>
                        <option>Dosen</option>
                        <option>Dokter</option>
                        <option>Perawat</option>
                        <option>Pengacara</option>
                        <option>Notaris</option>
                        <option>Wiraswasta/Pengusaha</option>
                        <option>Karyawan Swasta</option>
                        <option>PNS</option>
                        <option>Polisi</option>
                        <option>TNI</option>
                        <option>Teknisi</option>
                        <option>Buruh</option>
                        <option>Petani/Nelayan</option>
                        <option>Seniman/Artis</option>
                        <option>Freelance</option>
                        <option>Driver</option>
                        <option>Pekerja Sosial</option>
                        <option>Arsitek</option>
                        <option>Peneliti</option>
                        <option>Konsultan</option>
                        <option>Pekerja Tambang</option>
                        <option>Pemadam Kebakaran</option>
                        <option>Pegawai BUMN (ASN)</option>
                        <option>Vlogger/Content Creator</option>
                        <option>Tidak Bekerja</option>
                        <option>Mahasiswa/Pelajar</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kewarganegaraan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                        placeholder="Kewarganegaraan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Upload KTP</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="file_ktp" name="file_ktp" style="font-size:14px;"
                        required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    $file_ktp = $_FILES['file_ktp']['name'];
    $file_ktp_tmp = $_FILES['file_ktp']['tmp_name'];
    $upload_dir = 'public/upload/dataPenduduk/';
    $fileName = time() . '_' . str_replace(' ', '_', $file_ktp);
    $upload_name = $upload_dir . $fileName;

    if (!empty($file_ktp_tmp)) {
        move_uploaded_file($file_ktp_tmp, $upload_name);
    }

    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_pdd (nik, nama, phone, tempat_lh, tgl_lh, jekel, desa, blok, nomor_rumah, rt, rw, status_kepemilikan, agama, pekerjaan, status_perkawinan, kewarganegaraan, status, created_at, updated_at, file_ktp) VALUES (
            '" . $_POST['nik'] . "',
            '" . $_POST['nama'] . "',
            '" . $_POST['phone'] . "',
			'" . $_POST['tempat_lh'] . "',
			'" . $_POST['tgl_lh'] . "',
            '" . $_POST['jekel'] . "',
            '" . $_POST['desa'] . "',
            '" . $_POST['blok'] . "',
            '" . $_POST['nomor_rumah'] . "',
			'" . $_POST['rt'] . "',
			'" . $_POST['rw'] . "',
			'" . $_POST['status_kepemilikan'] . "',
			'" . $_POST['agama'] . "',
			'" . $_POST['pekerjaan'] . "',            
			'" . $_POST['status_perkawinan'] . "',
			'" . $_POST['kewarganegaraan'] . "',
            'Ada',
			'" . date('Y-m-d H:m') . "',
			'" . date('Y-m-d H:m') . "',
			'" . $fileName . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pend';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pend';
          }
      })</script>";
    }
}
     //selesai proses simpan data