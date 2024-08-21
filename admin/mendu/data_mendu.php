<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Kematian
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-mendu" class="btn btn-secondary" style="font-size: 15px;">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Sebab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, m.tgl_mendu, m.sebab, m.id_mendu from 
			  tb_mendu m inner join tb_pdd p on p.id_pend=m.id_pdd");
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
                            <?php $date = new DateTime($data['tgl_mendu']);
							echo $date->format('d-m-Y');
							?>
                        </td>
                        <td>
                            <?php echo $data['sebab']; ?>
                        </td>
                        <td>
                            <a href="?page=edit-mendu&kode=<?php echo $data['id_mendu']; ?>" title="Ubah"
                                class="btn btn-info btn-sm" style="font-size: 12px;">
                                <i class="fa fa-tag" style="font-size: 12px;"></i>
                            </a>
                            <a href="?page=del-mendu&kode=<?php echo $data['id_pend']; ?>"
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