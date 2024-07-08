<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * from tb_pdd where id_pend ='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<style>
	#label {
		font-weight: 450;
	}

	label {
		font-weight: 450;
	}

	.label {
		font-weight: 450;
	}
</style>
<div class="card card-light">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-address-book" aria-hidden="true"></i>&nbsp; Detail Warga
		</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 210px">
						<b id="label">NIK</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['nik']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Nama</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['nama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Nomor Telpon</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['phone']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Tempat, Tanggal Lahir</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['tempat_lh']; ?>
						/
						<?php echo date('d-m-Y', strtotime($data_cek['tgl_lh'])); ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Jenis Kelamin</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['jekel']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Alamat</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['desa']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Blok / Nomor Rumah</b>
					</td>
					<td>:

						&nbsp; Blok. <?php echo $data_cek['blok']; ?> / Nomor
						<?php echo $data_cek['nomor_rumah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">RT / RW</b>
					</td>
					<td>:

						&nbsp; RT. <?php echo $data_cek['rt']; ?> / RW.
						<?php echo $data_cek['rw']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Status Kepemilikan</b>
					</td>
					<td>:

						&nbsp; <?php echo $data_cek['status_kepemilikan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Agama</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['agama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Status Perkawinan</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['status_perkawinan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Pekerjaan</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['pekerjaan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">Kewarganegaraan</b>
					</td>
					<td>:
						&nbsp; <?php echo $data_cek['kewarganegaraan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b id="label">KTP</b>
					</td>
					<td>:
						&nbsp; <a href="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" target="_blank">
							<img src="public/upload/dataPenduduk/<?php echo $data_cek['file_ktp']; ?>" alt="" style="width: 200px;">
						</a>
					</td>
				</tr>

			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-pend" class="btn btn-secondary">Kembali</a>
		</div>
	</div>
</div>