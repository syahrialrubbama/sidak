<div class="card card-light">
	<div class="card-header">
		<h3 class="card-title">
			Data Warga
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pend" class="btn btn-secondary" style="font-size: 15px;">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Nomor KK</th>
						<th>KTP</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala, p.file_ktp from 
			  tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
			  left join tb_kk k on a.id_kk=k.id_kk where status='Ada'");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
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
								<?php echo $data['desa']; ?>
								RT
								<?php echo $data['rt']; ?>/ RW
								<?php echo $data['rw']; ?>.
							</td>
							<td>
								<?php echo $data['no_kk']; ?>-
								<?php echo $data['kepala']; ?>
							</td>
							<td>
								<a href="public/upload/dataPenduduk/<?= $data['file_ktp'] ?>" target="_blank">
									<img src="public/upload/dataPenduduk/<?= $data['file_ktp'] ?>" alt="" style="width: 80px;">
								</a>
							</td>
							<td>
								<div class="text-center">
									<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail" class="btn btn-dark btn-sm">
										<i class="fa fa-user" style="font-size: 13px;"></i>
									</a>
									<a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" title="Ubah" class="btn btn-info btn-sm">
										<i class="fa fa-tag" style="font-size: 13px;"></i>
									</a>
									<a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash" style="font-size: 13px;"></i>
									</a>
								</div>
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
	<!-- /.card-body -->