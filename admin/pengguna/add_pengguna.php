	<style>
#label {
    font-weight: 450;
}
	</style>
	<div class="card card-light">
	    <div class="card-header">
	        <h3 class="card-title">
	            <i class="fa fa-address-book" aria-hidden="true"></i>&nbsp; Tambah Data
	        </h3>
	    </div>
	    <form action="" method="post" enctype="multipart/form-data">
	        <div class="card-body">

	            <div class="form-group row">
	                <label class="col-sm-2 col-form-label" id="label">Nama User</label>
	                <div class="col-sm-6">
	                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna"
	                        placeholder="Nama user" required>
	                </div>
	            </div>

	            <div class="form-group row">
	                <label class="col-sm-2 col-form-label" id="label">Email</label>
	                <div class="col-sm-6">
	                    <input type="text" class="form-control" id="username" name="username" placeholder="Email">
	                </div>
	            </div>

	            <div class="form-group row">
	                <label class="col-sm-2 col-form-label" id="label">Password</label>
	                <div class="col-sm-6">
	                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	                </div>
	            </div>

	            <div class="form-group row">
	                <label class="col-sm-2 col-form-label" id="label">Akses User</label>
	                <div class="col-sm-6">
	                    <select name="level" id="level" class="form-control select2bs4">
	                        <option>- Pilih -</option>
	                        <option>Administrator</option>
	                        <option>Ketua RW</option>
	                    </select>
	                </div>
	            </div>

	        </div>
	        <div class="card-footer">
	            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
	            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
	        </div>
	    </form>
	</div>

	<?php

	if (isset($_POST['Simpan'])) {
		//mulai proses simpan data
		$sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level) VALUES (
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $_POST['level'] . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";
		}
	}
     //selesai proses simpan data