<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Kelahiran
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-lahir" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped" style="font-size:15px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Keluarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$no = 1;
					$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tgl_lh, l.jekel, k.no_kk, k.kepala from 
			  tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
					while ($data = $sql->fetch_assoc()) {
					?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nama']; ?>
                        </td>
                        <td>
                            <?php $date = new DateTime($data['tgl_lh']);
							echo $date->format('d-m-Y');
							?>
                        </td>
                        <td>
                            <?php echo $data['jekel']; ?>
                        </td>
                        <td>
                            <?php echo $data['no_kk']; ?> -
                            <?php echo $data['kepala']; ?>
                        </td>
                        <td>
                            <a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah"
                                class="btn btn-info btn-sm" style="font-size: 12px;">
                                <i class="fa fa-tag" style="font-size: 12px;"></i>
                            </a>
                            <a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>"
                                onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                class="btn btn-danger btn-sm" style="font-size: 12px;">
                                <i class="fa fa-trash" style="font-size: 12px;"></i>
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