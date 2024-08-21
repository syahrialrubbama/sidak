<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">
            Data Surat Pengantar
        </h3>
    </div>
    <div class="card-body">
        <?php
		if ($data_level == "Administrator") {
		?>
        <div class="mb-2">
            <button type="button" class="btn btn-secondary btn-add" data-url="?page=form-suket-domisili"
                style="font-size: 15px;">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Tambah Data
            </button>
        </div>
        <?php }
		?>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTableSuratDomisili" width="100%"
                style="font-size:15px;">
                <thead>
                    <tr>
                        <th style=" min-width: 50px;">No.</th>
                        <th style=" min-width: 130px;">Nomor Surat</th>
                        <th style=" min-width: 230px;">Nama Warga</th>
                        <th style=" min-width: 280px;">Maksud dan Tujuan</th>
                        <th>Status</th>
                        <th style="min-width: 120px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>