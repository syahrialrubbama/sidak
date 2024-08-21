<style>
#label {
    font-weight: 450;
}
</style>
<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-address-book" aria-hidden="true"></i>&nbsp; Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nomor Kartu Keluarga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kepala Keluarga</label>
                <div class="col-sm-6">
                    <!-- <input type="text" class="form-control" id="kepala" name="kepala" placeholder="Kepala Keluarga"
                        required> -->
                    <select name="kepala" id="kepala" class="form-control select2bs4" required autocomplete="off">
                        <option selected="selected">- Pilih -</option>
                        <?php
							// ambil data dari database
							$query = "select * from tb_pdd where status='Ada'";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
							?>
                        <option value="<?php echo $row['nama'] ?>">
                            <?php echo $row['nik'] ?>
                            -
                            <?php echo $row['nama'] ?>
                        </option>
                        <?php
							}
							?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Alamat Sesuai KK</label>
                <div class="col-sm-6">

                    <textarea type="text" class="form-control" id="desa" name="desa" placeholder="Alamat Sesuai KK"
                        cols="30" rows="3" required></textarea>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
                </div>
            </div> -->

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kecamatan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kec" name="kec" placeholder="Kecamatan Sesuai KK"
                        required>
                </div>
            </div> -->
            <!-- 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kabupaten</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kab" name="kab" placeholder="Kabupaten Sesuai KK"
                        required>
                </div>
            </div> -->

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Provinsi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi Sesuai KK"
                        required> 
                    <select name="prov" id="prov" class="form-control select2bs4" required autocomplete="off">
                        <option selected="selected">- Pilih -</option>
                        <?php
							// ambil data dari database
							$query = "select * from reg_provinces order by name asc";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
							?>
                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['name'] ?>
                        </option>
                        <?php
							}
							?>
                    </select>

                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kota/Kabupaten</label>
                <div class="col-sm-6">
                    <select name="kab" id="kab" class="form-control select2bs4" required autocomplete="off">
                        <option selected="selected">- Pilih -</option>
                        <?php
							// ambil data dari database
							$query = "select * from reg_regencies order by name asc";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
							?>
                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['name'] ?>
                        </option>
                        <?php
							}
							?>
                    </select>
                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kecamatan</label>
                <div class="col-sm-6">
                    <select name="kec" id="kec" class="form-control select2bs4" required autocomplete="off">
                        <option selected="selected">- Pilih -</option>
                        <?php
							// ambil data dari database
							$query = "select * from reg_districts order by name asc";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
							?>
                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['name'] ?>
                        </option>
                        <?php
							}
							?>
                    </select>
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Upload KK</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="file_kk" name="file_kk" required
                        style="font-size:14px;">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<script>
$(document).ready(function() {
    $('#prov').change(function() {
        var province_id = $(this).val();
        if (province_id) {
            $.ajax({
                url: 'get-cities.php', // Pastikan URL ini benar
                type: 'GET',
                data: {
                    province_id: province_id
                },
                dataType: 'json',
                success: function(data) {
                    $('#kab').empty();
                    $('#kab').append(
                        '<option selected="selected">- Pilih -</option>');
                    $.each(data, function(key, value) {
                        $('#kab').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        } else {
            $('#kab').empty();
            $('#kab').append('<option selected="selected">- Pilih -</option>');
        }
    });
});
</script>
<?php

if (isset($_POST['Simpan'])) {
    $file_kk = $_FILES['file_kk']['name'];
    $file_kk_tmp = $_FILES['file_kk']['tmp_name'];
    $upload_dir = 'public/upload/kartuKeluarga/';
    $fileName = time() . '_' . str_replace(' ', '_', $file_kk);
    $upload_name = $upload_dir . $fileName;

    if (!empty($file_kk_tmp)) {
        move_uploaded_file($file_kk_tmp, $upload_name);
    }


    $sql_simpan = "INSERT INTO tb_kk (no_kk, kepala, desa,  file_kk) VALUES (
        '" . $_POST['no_kk'] . "',
        '" . $_POST['kepala'] . "',
        '" . $_POST['desa'] . "',
        '" . $fileName . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kartu';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kartu';
          }
      })</script>";
    }
}
     //selesai proses simpan data