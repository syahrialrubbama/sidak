<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data User
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pengguna" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped" style="font-size:15px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Email</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_pengguna");
					while ($data = $sql->fetch_assoc()) {
					?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_pengguna']; ?>
                        </td>
                        <td>
                            <?php echo $data['username']; ?>
                        </td>
                        <td>
                            <?php echo $data['level']; ?>
                        </td>
                        <td>
                            <a href="?page=edit-pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah"
                                class="btn btn-info btn-sm" style="font-size: 12px;">
                                <i class="fa fa-tag" style="font-size: 12px;"></i>
                            </a>
                            <a href="?page=del-pengguna&kode=<?php echo $data['id_pengguna']; ?>"
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