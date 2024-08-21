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

function monthToRomawi($month)
{
	switch ($month) {
		case '01':
			return 'I';
			break;
		case '02':
			return 'II';
			break;
		case '03':
			return 'III';
			break;
		case '04':
			return 'IV';
			break;
		case '05':
			return 'V';
			break;
		case '06':
			return 'VI';
			break;
		case '07':
			return 'VII';
			break;
		case '08':
			return 'VIII';
			break;
		case '09':
			return 'IX';
			break;
		case '10':
			return 'X';
			break;
		case '11':
			return 'XI';
			break;
		case '12':
			return 'XII';
			break;
		default:
			return 'I';
			break;
	}
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
	$noSuratOtomatis = str_pad($noUrut, 3, '0', STR_PAD_LEFT) . '/PWT/' . monthToRomawi(date('m')) . '/' . date('Y');
	return $noSuratOtomatis;
}
$noSuratOtomatis = handleNoSurat($koneksi);
?>
<?php
//Mulai Sesion
session_start();
// Set timezone
date_default_timezone_set('Asia/Jakarta');
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
?>
<style>
#label {
    font-weight: 450;
}
</style>
<form action="./submit-domisili.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" id="label">Warga</label>
            <div class="col-sm-9">
                <select name="id_pend" id="id_pend" class="form-control select2bs4" required>
                    <option selected="selected" value="">- Pilih Data -</option>
                    <?php
					$query = "SELECT * FROM tb_pdd WHERE status='Ada'";
					$hasil = mysqli_query($koneksi, $query);
					while ($row = mysqli_fetch_array($hasil)) {
					?>
                    <option value="<?php echo $row['id_pend'] ?>"
                        <?= @$rowData['tb_pdd_id'] ?? @$rowData['tb_pdd_id'] == $row['id_pend'] ? 'selected' : '' ?>>
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
            <label class="col-sm-3 col-form-label" id="label">Nomor Surat</label>
            <div class="col-sm-9">
                <input class="form-control" name="no_surat" readonly required placeholder="No. Surat..."
                    value="<?= $rowData['no_surat'] ?? $noSuratOtomatis ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" id="label">Maksud dan Tujuan</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="alasan_buat_surat" required placeholder="Maksud dan Tujuan"
                    rows="2"><?= $rowData['alasan_buat_surat'] ?? '' ?></textarea>
            </div>
        </div>
        <?php
		if ($data_level == "Administrator") {
		?>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" id="label">Status</label>
            <div class="col-sm-9">
                <select name="tujuan_buat_surat" id="tujuan_buat_surat" class="form-control select2bs4">
                    <!-- <textarea class="form-control" name="tujuan_buat_surat" required placeholder="Tujuan Buat Surat..."
                    rows="2"><?= $rowData['tujuan_buat_surat'] ?? '' ?></textarea> -->
                    <!-- <option>- Pilih -</option> -->
                    <option value="Surat Pengantar Diproses">Surat Pengantar Diproses</option>

                </select>
            </div>
        </div>
        <?php } ?>
        <?php
		if ($data_level == "Ketua RW") {
		?>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" id="label">Status Surat</label>
            <div class="col-sm-9">
                <select name="tujuan_buat_surat" id="tujuan_buat_surat" class="form-control select2bs4">
                    <!-- <textarea class="form-control" name="tujuan_buat_surat" required placeholder="Tujuan Buat Surat..."
                    rows="2"><?= $rowData['tujuan_buat_surat'] ?? '' ?></textarea> -->
                    <!-- <option>- Pilih -</option> -->
                    <option value="Surat Disetujui">Surat Disetujui</option>
                    <option value="Surat Ditolak">Surat Ditolak</option>

                </select>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-close" style="font-size: 15px;">
            <i class="fas fa-times" style="font-size: 13.5px;"></i>&nbsp; Batal
        </button>
        <button type="submit" class="btn btn-info btn-submit" style="font-size: 15px;">
            <i class="fas fa-paper-plane" style="font-size: 13.5px;"></i>&nbsp; Submit
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
        tujuan_buat_surat: $('select[name="tujuan_buat_surat"]').val()
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