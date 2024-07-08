<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Kartu Keluarga
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-kartu" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a></a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Alamat KK</th>
                        <th>Anggota KK</th>
                        <th>Kartu Keluarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from tb_kk");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['no_kk']; ?>
                            </td>
                            <td>
                                <?php echo $data['kepala']; ?>
                            </td>
                            <td>
                                <?php echo $data['desa']; ?>
                                RT
                                <?php echo $data['rt']; ?>/ RW
                                <?php echo $data['rw']; ?>.
                            </td>
                            <td>
                                <a href="?page=anggota&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK" class="btn btn-info btn-sm">
                                    <i class="fa fa-users"></i>
                                </a>
                            </td>
                            <td>
                                <a href="public/upload/kartuKeluarga/<?= $data['file_kk'] ?>" target="_blank">
                                    <img src="public/upload/kartuKeluarga/<?= $data['file_kk'] ?>" alt="" style="width: 100px;">
                                </a>
                            </td>
                            <td>
                                <a href="?page=edit-kartu&kode=<?php echo $data['id_kk']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-kartu&kode=<?php echo $data['id_kk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
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
    <!-- /.card-body -->