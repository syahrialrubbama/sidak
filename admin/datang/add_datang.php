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
                <label class="col-sm-2 col-form-label" id="label">Pendatang / Pelapor</label>
                <div class="col-sm-6">
                    <select name="pelapor" id="pelapor" class="form-control select2bs4">
                        <option selected="selected">- Pilih -</option>
                        <?php
				// ambil data dari database
				$query = "select * from tb_pdd where status='Ada'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
                        <option value="<?php echo $row['id_pend'] ?>">
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
                <label class="col-sm-2 col-form-label" id="label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nik_pelapor" name="nik_pelapor" value="" readonly
                        placeholder="NIK">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="" readonly
                        placeholder="Nama">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select name="jekel_pelapor" id="jekel_pelapor" class="form-control" readonly>
                        <option>- Pilih -</option>
                        <option value="LK">Laki-laki</option>
                        <option value="PR">Perempuan</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Tanggal Datang</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Keperluan</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan"
                        cols="30" rows="3" required></textarea>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select name="jekel" id="jekel" class="form-control select2bs4">
                        <option>- Pilih -</option>
                        <option value="LK">Laki-laki</option>
                        <option value="PR">Perempuan</option>
                    </select>
                </div>
            </div> -->







        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-datang" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<?php
	$query = "select * from tb_pdd where status='Ada'";
	$hasil = mysqli_query($koneksi, $query);
	$jsonHasil = json_encode(mysqli_fetch_all($hasil, MYSQLI_ASSOC)); ?>

<script class="json_hasil" data-value="<?= htmlspecialchars($jsonHasil, ENT_QUOTES, 'UTF-8') ?>"></script>

<?php
    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_datang (tgl_datang, keperluan, pelapor, nik_pelapor, nama_pelapor, jekel_pelapor) VALUES (	
			
			'".$_POST['tgl_datang']."',
			'".$_POST['keperluan']."',
            '".$_POST['pelapor']."',
            '".$_POST['nik_pelapor']."',
            '".$_POST['nama_pelapor']."',
            '".$_POST['jekel_pelapor']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-datang';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-datang';
          }
      })</script>";
    }}
     //selesai proses simpan data