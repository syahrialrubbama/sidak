<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Laporan Data Warga
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body" id="reportDataWarga">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="">Tanggal Periode</label>
							<input type="text" class="form-control daterange" name="daterange" placeholder="Masukan tanggal periode...">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="">Jenis Kelamin</label>
							<select name="jekel" class="form-control" id="">
								<option value="">-- Pilih ---</option>
								<option value="Laki-Laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="">Usia</label>
							<input type="number" class="form-control" name="tgl_lh" placeholder="Masukan tanggal lahir...">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<button type="button" class="btn btn-primary btn-filter mr-1" style="margin-top: 32px;">
					<i class="fas fa-filter"></i> Filter
				</button>
				<button type="button" class="btn btn-success btn-export" style="margin-top: 32px;">
					<i class="fas fa-file-excel"></i> Excel
				</button>
			</div>
		</div>
		<div class="table-responsive">
			<table id="dataTableReportWarga" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tanggal Lahir</th>
						<th>Usia</th>
						<th>Jenis Kelamin</th>
						<th>Desa</th>
						<th>RT</th>
						<th>RW</th>
						<th>Nomor KK</th>
						<th>Tanggal Terdaftar</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->