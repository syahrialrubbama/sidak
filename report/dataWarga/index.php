 <style>
#label {
    font-weight: 450;
}
 </style>
 <div class="card card-light">
     <div class="card-header">
         <h3 class="card-title">
             Laporan Data Warga
         </h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body" id="reportDataWarga">
         <div class="row">
             <div class="col-lg-8">
                 <div class="row">
                     <div class="col-lg-4">
                         <div class="form-group">
                             <label for="" id="label">Tanggal Periode</label>
                             <input type="text" class="form-control daterange" name="daterange"
                                 placeholder="Masukan tanggal periode...">
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-group">
                             <label for="" id="label">Jenis Kelamin</label>
                             <select name="jekel" class="form-control select2bs4" id="">
                                 <option value="">-- Pilih ---</option>
                                 <option value="Laki-Laki">Laki - laki</option>
                                 <option value="Perempuan">Perempuan</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-group">
                             <label for="" id="label">Usia</label>
                             <input type="number" class="form-control" name="tgl_lh"
                                 placeholder="Masukan tanggal lahir...">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4">
                 <button type="button" class="btn btn-secondary btn-filter mr-1"
                     style="margin-top: 32px; font-size:15px;">
                     <i class="fas fa-filter" style="font-size: 13px;"></i>&nbsp; Filter
                 </button>
                 <button type="button" class="btn btn-info btn-export" style="margin-top: 32px; font-size:15px;">
                     <i class="fas fa-print" style="font-size: 13px;"></i>&nbsp; Excel
                 </button>
             </div>
         </div>
         <br>
         <div class="table-responsive">
             <table id="dataTableReportWarga" class="table table-bordered table-striped" style="font-size:15px;"
                 width="100%">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th style="min-width: 110px;">NIK</th>
                         <th style="min-width: 140px;">Nama</th>
                         <th style="min-width: 100px;">Tanggal Lahir</th>
                         <th style="min-width: 40px;">Usia</th>
                         <th style="min-width: 110px;">Jenis Kelamin</th>
                         <th style="min-width: 200px;">Alamat</th>
                         <th style="min-width: 30px;">RT/RW</th>
                         <!-- <th style="min-width: 30px;">RW</th> -->
                         <th style="min-width: 130px;">Nomor KK</th>
                         <th style="min-width: 130px;">Tanggal Dibuat</th>
                     </tr>
                 </thead>
                 <tbody>
                 </tbody>
                 </tfoot>
             </table>
         </div>
     </div>
 </div>
 <!-- /.card-body -->