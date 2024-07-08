<?php

$sql = $koneksi->query("SELECT COUNT(id_pend) as pend  from tb_pdd where status='Ada'");
while ($data = $sql->fetch_assoc()) {
    $pend = $data['pend'];
}

$sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
while ($data = $sql->fetch_assoc()) {
    $kartu = $data['kartu'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='LK'");
while ($data = $sql->fetch_assoc()) {
    $laki = $data['laki'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='PR'");
while ($data = $sql->fetch_assoc()) {
    $prem = $data['prem'];
}

$sql = $koneksi->query("SELECT COUNT(id_lahir) as lahir from tb_lahir");
while ($data = $sql->fetch_assoc()) {
    $lahir = $data['lahir'];
}

$sql = $koneksi->query("SELECT COUNT(id_mendu) as mendu  from tb_mendu");
while ($data = $sql->fetch_assoc()) {
    $mendu = $data['mendu'];
}

$sql = $koneksi->query("SELECT COUNT(id_datang) as datang  from tb_datang");
while ($data = $sql->fetch_assoc()) {
    $datang = $data['datang'];
}

$sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
while ($data = $sql->fetch_assoc()) {
    $pindah = $data['pindah'];
}

?>
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Pesan Alert Info
</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light" style="border-radius:6px;">
            <div class="inner">
                <h3>
                    <?php echo $pend;  ?>
                </h3>

                <p>Penduduk</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add" style="font-size:70px;"></i>
            </div>
            <!-- <a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $kartu;  ?>
                </h3>

                <p>Kartu Keluarga</p>
            </div>
            <div class="icon">
                <i class="ion ion-card"></i>
            </div>
            <!-- <a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $laki;  ?>
                </h3>

                <p>Laki-laki</p>
            </div>
            <div class="icon">
                <i class="ion ion-male"></i>
            </div>
            <!-- <a href="index.php?page=data-izin" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $prem;  ?>
                </h3>

                <p>Perempuan</p>
            </div>
            <div class="icon">
                <i class="ion ion-female"></i>
            </div>
            <!-- <a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $lahir;  ?>
                </h3>

                <p>Lahir</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-happy"></i>
            </div>
            <!-- <a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $mendu;  ?>
                </h3>

                <p>Meninggal</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-sad"></i>
            </div>
            <!-- <a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $datang;  ?>
                </h3>

                <p>Pendatang</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-download"></i>
            </div>
            <!-- <a href="index.php?page=data-izin" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>
                    <?php echo $pindah;  ?>
                </h3>

                <p>Pindah</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-upload"></i>
            </div>
            <!-- <a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a> -->
        </div>
    </div>

</div>

<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Data Grafik
</div>
<div class="row" id="dashboard">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button style="border: 1px solid #adadad;" class="nav-link active" id="v-pills-grafik-warga-pendatang-tab" data-toggle="pill" data-target="#v-pills-grafik-warga-pendatang" type="button" role="tab" aria-controls="v-pills-grafik-warga-pendatang" aria-selected="true">Warga Pendatang</button>
                    <button style="border: 1px solid #adadad;" class="nav-link" id="v-pills-warga-pindah-tab" data-toggle="pill" data-target="#v-pills-warga-pindah" type="button" role="tab" aria-controls="v-pills-warga-pindah" aria-selected="false">Warga Pindah</button>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-grafik-warga-pendatang" role="tabpanel" aria-labelledby="v-pills-grafik-warga-pendatang-tab">
                        <canvas id="grafik-data-warga-pendatang"></canvas>
                    </div>
                    <div class="tab-pane fade" id="v-pills-warga-pindah" role="tabpanel" aria-labelledby="v-pills-warga-pindah-tab">
                        <canvas id="grafik-data-warga-pindah"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>