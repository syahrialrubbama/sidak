<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Kartu Keluarga
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <?php
            if ($data_level == "Administrator") {
            ?>
            <div>
                <a href="?page=add-kartu" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a></a>
            </div>
            <?php
            }
            ?>
            <br>
            <table id="example1" class="table table-bordered table-striped" width="100%" style="font-size:15px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KK</th>
                        <th>Kepala Keluarga</th>
                        <th style="width:270px;">Alamat KK</th>
                        <th>Anggota Keluarga</th>
                        <th style="text-align:center;">File KK</th>
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

                        </td>
                        <td>
                            <a href="?page=anggota&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK"
                                class="btn btn-info btn-sm" style="font-size:13px;">
                                <i class="fa fa-user" style="font-size:12px;"></i>&nbsp; Lihat Anggota Keluarga
                            </a>
                        </td>
                        <td>
                            <center> <a href="public/upload/kartuKeluarga/<?= $data['file_kk'] ?>" target="_blank">
                                    <i class="ion ion-clipboard"
                                        style="font-size:25px; color: #182444; text-align: center; border-radius: 7px;"></i>
                                </a></center>
                            </a>
                        </td>
                        <td>
                            <a href="?page=edit-kartu&kode=<?php echo $data['id_kk']; ?>" title="Ubah"
                                class="btn btn-dark btn-sm" style="font-size:12px;">
                                <i class="fa fa-tag" style="font-size:12px;"></i>
                            </a>
                            <a href="?page=del-kartu&kode=<?php echo $data['id_kk']; ?>"
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
    <!-- /.card-body -->