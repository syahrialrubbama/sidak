<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Warga
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <?php
            if ($data_level == "Administrator") {
            ?>
            <div>
                <a href="?page=add-pend" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
            </div>
            <?php
            }
            ?>
            <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="font-size:15px; width:10px;">No</th>
                            <th style="width:120px; font-size:15px;">NIK</th>
                            <th style="width:130px; font-size:15px;">Nama</th>
                            <th style="font-size:15px; width:100px;">Jenis Kelamin</th>
                            <th style="width:210px; font-size:15px;">Alamat</th>
                            <th style="width:120px; font-size:15px;">Nomor KK</th>
                            <th style="text-align: center; font-size:15px;">File KTP</th>
                            <th style="width:90px; font-size:15px;">Aksi</th>
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
                            <td style="font-size:15px;">
                                <?php echo $data['nik']; ?>
                            </td>
                            <td style="font-size:15px;">
                                <?php echo $data['nama']; ?>
                            </td>
                            <td style="font-size:15px;">
                                <?php echo $data['jekel']; ?>
                            </td>
                            <td style="font-size:15px;">
                                <?php echo $data['desa']; ?>
                                RT
                                <?php echo $data['rt']; ?>/ RW
                                <?php echo $data['rw']; ?>.
                            </td>
                            <td style="font-size:15px;">
                                <?php echo $data['no_kk']; ?>
                            </td>
                            <td>
                                <center> <a href="public/upload/dataPenduduk/<?= $data['file_ktp'] ?>" target="_blank"
                                        style="border-radius: 7px;">
                                        <i class="ion ion-clipboard"
                                            style="font-size:25px; color: #182444; text-align: center; border-radius: 7px;"></i>
                                    </a></center>
                            </td>
                            <td>
                                <div class="text-left">
                                    <a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail"
                                        class="btn btn-dark btn-sm" style="font-size: 12px;">
                                        <i class="fa fa-user" style="font-size: 12px;"></i>
                                    </a>
                                    <a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" title="Ubah"
                                        class="btn btn-info btn-sm" style="font-size: 12px;">
                                        <i class="fa fa-tag" style="font-size: 12px;"></i>
                                    </a>
                                    <a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>"
                                        onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus"
                                        class="btn btn-danger btn-sm" style="font-size: 12px;">
                                        <i class="fa fa-trash" style="font-size: 12px;"></i>
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
    </div>
    <!-- /.card-body -->