<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Pendatang Wajib Lapor
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-datang" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped" width="100%" style="font-size:15px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Datang</th>
                        <th style="width:270px;">Keperluan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$no = 1;
					$sql = $koneksi->query("SELECT d.id_datang, d.nik_pelapor, d.nama_pelapor, d.jekel_pelapor, d.tgl_datang, d.keperluan, p.nama from 
			  tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend");
					while ($data = $sql->fetch_assoc()) {
					?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nik_pelapor']; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_pelapor']; ?>
                        </td>
                        <td>
                            <?php if ($data['jekel_pelapor'] == 'LK') {
								echo 'Laki-Laki';
							} elseif ($data['jekel_pelapor'] == 'PR') {
								echo 'Perempuan';
							} else {
								echo 'Tidak Diketahui'; // Jika ada nilai lain selain 'LK' dan 'PR'
							}?>
                        </td>
                        <td>
                            <?php
								$date = new DateTime($data['tgl_datang']);
								echo $date->format('d-m-Y');
								?>
                        </td>
                        <!-- <td>
                            <?php echo $data['nama_pelapor']; ?>
                        </td> -->
                        <td>
                            <?php echo $data['keperluan']; ?>
                        </td>
                        <td>
                            <a href="?page=edit-datang&kode=<?php echo $data['id_datang']; ?>" title="Ubah"
                                class="btn btn-info btn-sm" style="font-size:12px;">
                                <i class="fa fa-tag" style="font-size:12px;"></i>
                            </a>
                            <a href="?page=del-datang&kode=<?php echo $data['id_datang']; ?>"
                                onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                class="btn btn-danger btn-sm" style="font-size:12px;">
                                <i class="fa fa-trash" style="font-size:12px;"></i>
                                </>
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