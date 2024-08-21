<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_kk WHERE id_kk='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

	$karkel = $data_cek['id_kk'];
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
            Anggota Keluarga (Sesuai KK)
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type='hidden' class="form-control" id="id_kk" name="id_kk" value="<?php echo $data_cek['id_kk']; ?>"
                readonly />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nomor Kartu Keluarga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_kk" name="no_kk"
                        value="<?php echo $data_cek['no_kk']; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Kepala Keluarga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kepala" name="kepala"
                        value="<?php echo $data_cek['kepala']; ?>" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Alamat Sesuai KK</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" value="" cols="30" rows="3"
                        readonly><?php echo $data_cek['desa']; ?></textarea>
                </div>
            </div>
            <br>
            <p><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Tambahkan anggota keluarga <br>
                <span style="font-size:13.5px;"> Sesuaikan
                    dengan susunan kartu keluarga
                    dimulai
                    dari Kepala
                    Keluarga</span>
            </p>

            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" id="label">Nama</label>
                <div class="col-sm-4">
                    <select name="id_pend" id="id_pend" class="form-control select2bs4" required>
                        <option selected="selected">- Penduduk -</option>
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
                <div class="col-sm-3">
                    <select name="hubungan" id="hubungan" class="form-control select2bs4">
                        <option>- Hub Keluarga -</option>
                        <option>Kepala Keluarga</option>
                        <option>Istri</option>
                        <option>Anak</option>
                        <option>Orang Tua</option>
                        <option>Mertua</option>
                        <option>Menantu</option>
                        <option>Cucu</option>
                        <option>Famili Lain</option>
                    </select>
                </div>
                <input type="submit" name="Simpan" value="Tambah" class="btn btn-secondary" style="font-size:15px;">
            </div>
        </div>
        <div class="card-body" style="margin-top:-20px;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" style="font-size:15px;">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Hub Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
							$no = 1;
							$sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, a.hubungan, a.id_anggota 
			  from tb_pdd p inner join tb_anggota a on p.id_pend=a.id_pend where status='Ada' and id_kk=$karkel");
							while ($data = $sql->fetch_assoc()) {
							?>

                        <tr>
                            <td>
                                <?php echo $data['nik']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['jekel']; ?>
                            </td>
                            <td>
                                <?php echo $data['hubungan']; ?>
                            </td>
                            <td>
                                <a href="?page=del-anggota&kode=<?php echo $data['id_anggota']; ?>"
                                    onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                    class="btn btn-danger btn-sm" style="font-size:12px;">
                                    <i class="fa fa-trash" style="font-size:12px;"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
							}
							?>
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <a href="?page=data-kartu" title="Kembali" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_anggota (id_kk, id_pend, hubungan) VALUES (
            '" . $_POST['id_kk'] . "',
            '" . $_POST['id_pend'] . "',
            '" . $_POST['hubungan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota&kode=" . $_POST['id_kk'] . "';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota&kode=" . $_POST['id_kk'] . "';
          }
      })</script>";
	}
}
     //selesai proses simpan data