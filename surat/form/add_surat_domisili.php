<?php
include '../../inc/koneksi.php';
$actionPage = $_GET['action'];
$rowData = null;
$id = @$_GET['id'];
if ($actionPage == 'edit') {
	$query = "SELECT * FROM tb_surat_domisili inner join tb_pdd on tb_pdd.id_pend = tb_surat_domisili.tb_pdd_id WHERE id = '$id'";
	$hasil = mysqli_query($koneksi, $query);
	$rowData = mysqli_fetch_assoc($hasil);
}

// handle no surat otomatis
function handleNoSurat($koneksi)
{
	$query = "SELECT max(no_surat) as maxKode FROM tb_surat_domisili";
	$hasil = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($hasil);
	$kode = $data['maxKode'];
	$explode = explode('/', $kode);

	$noUrut = (int) $explode[0];
	$noUrut++;
	$noSuratOtomatis = str_pad($noUrut, 3, '0', STR_PAD_LEFT) . '/PWT/VII/2024';
	return $noSuratOtomatis;
}
$noSuratOtomatis = handleNoSurat($koneksi);
?>
<form action="./submit-domisili.php" method="post" enctype="multipart/form-data">
	<div class="modal-body">
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">Penduduk</label>
			<div class="col-sm-9">
				<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
					<option selected="selected" value="">- Pilih Data -</option>
					<?php
					$query = "SELECT * FROM tb_pdd WHERE status='Ada'";
					$hasil = mysqli_query($koneksi, $query);
					while ($row = mysqli_fetch_array($hasil)) {
					?>
						<option value="<?php echo $row['id_pend'] ?>" <?= @$rowData['tb_pdd_id'] ?? @$rowData['tb_pdd_id'] == $row['id_pend'] ? 'selected' : '' ?>>
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">No. Surat</label>
			<div class="col-sm-9">
				<input class="form-control" name="no_surat" required placeholder="No. Surat..." value="<?= $rowData['no_surat'] ?? $noSuratOtomatis ?>" />
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">Alasan Buat Surat</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="alasan_buat_surat" required placeholder="Alasan Buat Surat..." rows="2"><?= $rowData['alasan_buat_surat'] ?? '' ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">Tujuan Buat Surat</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="tujuan_buat_surat" required placeholder="Tujuan Buat Surat..." rows="2"><?= $rowData['tujuan_buat_surat'] ?? '' ?></textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger btn-close">
			<i class="fas fa-times"></i> Batal
		</button>
		<button type="submit" class="btn btn-primary btn-submit">
			<i class="fas fa-paper-plane"></i> Submit
		</button>
	</div>
</form>

<script>
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})

	const dataForm = () => {
		return {
			no_surat: $('input[name="no_surat"]').val(),
			tb_pdd_id: $('select[name="id_pend"]').val(),
			alasan_buat_surat: $('textarea[name="alasan_buat_surat"]').val(),
			tujuan_buat_surat: $('textarea[name="tujuan_buat_surat"]').val()
		}
	}

	const formValidation = () => {
		const data = dataForm();
		let status = false;
		let message = [];
		if (data.no_surat === '') {
			status = true;
			message.push('No. Surat harus diisi!');
		}
		if (data.tb_pdd_id === '') {
			status = true;
			message.push('Penduduk harus dipilih!');
		}
		if (data.alasan_buat_surat === '') {
			status = true;
			message.push('Alasan Buat Surat harus diisi!');
		}
		if (data.tujuan_buat_surat === '') {
			status = true;
			message.push('Tujuan Buat Surat harus diisi!');
		}

		let setMessage = '';
		if (status) {
			message.forEach(function(msg) {
				setMessage += msg + '<br />';
			});
		}

		return {
			status: status,
			message: setMessage
		}
	}

	body.on('click', '.btn-submit', function(e) {
		e.preventDefault();
		const validate = formValidation();
		if (validate.status) {
			return Swal.fire({
				icon: 'error',
				title: 'Form Validation',
				html: validate.message
			});
		}

		const typeSubmit = '<?= $actionPage == 'edit' ? 'edit' : 'add' ?>';
		const id = '<?= $id ?>';
		$.ajax({
			url: './surat/form/submit-domisili.php',
			method: 'POST',
			data: {
				type: typeSubmit,
				data: dataForm(),
				id: id,
			},
			success: function(data) {
				if (data.status) {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: data.message
					}).then((result) => {
						if (result.value) {
							window.location.reload();
						}
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data.message
					})
				}
			}
		})
	});
</script>