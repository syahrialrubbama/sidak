<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, p.id_pend, p.nama, d.nik_pelapor, d.nama_pelapor, d.jekel_pelapor from 
		tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend WHERE id_datang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_datang" name="id_datang" value="<?php echo $data_cek['id_datang']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_datang" name="nama_datang" value="<?php echo $data_cek['nama_datang']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                else echo "<option value='LK'>LK</option>";

                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                else echo "<option value='PR'>PR</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Datang</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" value="<?php echo $data_cek['tgl_datang']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pelapor</label>
				<div class="col-sm-6">
					<select name="pelapor" id="pelapor" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_pdd";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_pend'] ?>" <?=$data_cek[
						 'id_pend']==$row[ 'id_pend'] ? "selected" : null ?>>
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
				<label class="col-sm-2 col-form-label">NIK Pelapor</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nik_pelapor" name="nik_pelapor" value="<?= $data_cek['nik_pelapor'] ?>" placeholder="NIK Pelapor...">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelapor</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="<?= $data_cek['nama_pelapor'] ?>" placeholder="Nama Pelapor...">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin Pelapor</label>
				<div class="col-sm-3">
					<select name="jekel_pelapor" id="jekel_pelapor" class="form-control">
						<option value="">- Pilih -</option>
						<option value="LK" <?= $data_cek['jekel_pelapor'] == 'LK' ? 'selected' : '' ?>>Laki-laki</option>
						<option value="PR"  <?= $data_cek['jekel_pelapor'] == 'PR' ? 'selected' : '' ?>>Perempuan</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-datang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$query = "select * from tb_pdd";
$hasil = mysqli_query($koneksi, $query);
$jsonHasil = json_encode(mysqli_fetch_all($hasil, MYSQLI_ASSOC)); ?>

<script class="json_hasil" data-value="<?= htmlspecialchars($jsonHasil, ENT_QUOTES, 'UTF-8') ?>"></script>

<?php
    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_datang SET 
		nik='".$_POST['nik']."',
		nama_datang='".$_POST['nama_datang']."',
		jekel='".$_POST['jekel']."',
		tgl_datang='".$_POST['tgl_datang']."',
		pelapor='".$_POST['pelapor']."',
		nik_pelapor='".$_POST['nik_pelapor']."',
		nama_pelapor='".$_POST['nama_pelapor']."',
		jekel_pelapor='".$_POST['jekel_pelapor']."'
		WHERE id_datang='".$_POST['id_datang']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
    }}
