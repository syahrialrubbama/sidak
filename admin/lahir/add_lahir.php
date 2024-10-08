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
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bayi" required
                        autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Tanggal Lahir</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tgl_lh" name="tgl_lh" required>
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
                <label class="col-sm-2 col-form-label" id="label">Keluarga</label>
                <div class="col-sm-6">
                    <select name="id_kk" id="id_kk" class="form-control select2bs4" required>
                        <option selected="selected">- Pilih -</option>
                        <?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
                        <option value="<?php echo $row['id_kk'] ?>">
                            <?php echo $row['no_kk'] ?>
                            -
                            <?php echo $row['kepala'] ?>
                        </option>
                        <?php
						}
						?>
                    </select>
                </div>


            </div>
            <br>
            <div>
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data-lahir" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_lahir (nama, tgl_lh, jekel, id_kk) VALUES (
            '" . $_POST['nama'] . "',
			'" . $_POST['tgl_lh'] . "',
            '" . $_POST['jekel'] . "',
            '" . $_POST['id_kk'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-lahir';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-lahir';
          }
      })</script>";
	}
}
     //selesai proses simpan data