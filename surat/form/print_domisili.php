<?php
include '../../inc/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_surat_domisili inner join tb_pdd on tb_pdd.id_pend = tb_surat_domisili.tb_pdd_id WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $query);
$rowData = mysqli_fetch_assoc($hasil);


function tgl_indo($tanggal)
{
    $date = $tanggal;

    $dateTime = new DateTime($date);

    $formattedDate = $dateTime->format('j F Y');

    $monthNames = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];
    foreach ($monthNames as $en => $id) {
        $formattedDate = str_replace($en, $id, $formattedDate);
    }

    return $formattedDate;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar</title>
    <link rel="shortcut icon" href="../../dist/img/logo-water.png" type="image/x-icon">
    <style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    @media print {
        * {
            -webkit-print-color-adjust: exact;
        }
    }
    </style>
</head>

<body style="padding: 25px;" onload="printAndClose()">
    <section id="header">
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%;">
                    <img src="../../dist/img/logo-water2.png" alt="Logo Surat" style="height: 80px;">
                </td>
                <td style="text-align: center;">
                    <h2 style="margin: 0; padding: 0; margin-bottom: 10px;">PAGUYUBAN WARGA WATER TERRACE</h2>
                    <span>Cluster Warga Terrace - Grand Wisata</span> <br />
                    <span>Desa Lambang Jaya Kecamatan Tambun Selatan Kabupaten Bekasi</span>
                    <div style="margin-top: 5px; height: 0.5px; background: black;"></div>
                    <div style="margin-top: 2.5px; height: 0.5px; background: black;"></div>
                </td>
            </tr>
        </table>
    </section>
    <section id="tertuju" style="margin-top: 25px;">
        <table style="width: 100%;">
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td><?= $rowData['no_surat'] ?></td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>Identitas pemohon / Kartu keluarga</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 5px;"></td>
            </tr>
            <tr>
                <td colspan="3">Kepada Yth.</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 5px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    Bapak Ketua RT 001/17 - Cluster Water Spring <br />
                    Desa Lambang Jaya – Kec. Tambun Selatan <br />
                    Di Tempat

                </td>
            </tr>
        </table>
    </section>
    <section id="isiSurat">
        <table style="width: 100%;">
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h4 style="margin: 0; padding: 0;">SURAT PENGANTAR</h4>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3">Dengan Hormat,</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    Yang bertanda tangan di bawah ini Ketua Paguyuban Warga Cluster Water Terrace Desa <br />
                    Lambang Jaya, dengan ini menerangkan bahwa :
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="width: 25%;">Nama</td>
                <td>:</td>
                <td><?= $rowData['nama'] ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $rowData['tempat_lh'] ?>, <?= tgl_indo($rowData['tgl_lh']) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $rowData['jekel'] ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $rowData['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $rowData['agama'] ?></td>
            </tr>
            <tr>
                <td>Status Pernikahan</td>
                <td>:</td>
                <td><?= $rowData['status_perkawinan'] ?></td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td><?= $rowData['kewarganegaraan'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <?= $rowData['desa'] ?>
                </td>
            </tr>
            <tr>
                <td>Maksud dan Tujuan</td>
                <td>:</td>
                <td>
                    <?= $rowData['alasan_buat_surat'] ?> <br />
                    <?= $rowData['tujuan_buat_surat'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    Demikian surat pengantar ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    Bekasi, 20 Juni 2024
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
        </table>
    </section>
    <section id="footerSurat">
        <table style="width: 100%;">
            <tr>
                <td style="text-align: left;">
                    <p style="margin: 0; padding: 0;">
                        Hormat Kami,
                    </p>
                    <img src="../../dist/img/stempel.png" alt="Stempel" style="height: 100px;"> <br />
                    <strong style="text-decoration: underline;">Deri Azis</strong><br />
                    <i>Ketua Paguyuban</i>
                </td>
                <td style="width: 35%;"></td>
                <td style="text-align: center; vertical-align: top; width: 25%;">
                    <p style="margin: 0; padding: 0;">Pemohon,</p>
                    <div style="margin-top: 100px;"></div>
                    <div style="border: 0.5px dashed black; margin-bottom: 2.5px;"></div>
                    <div style="width: 100%; height: 0.5px; background: black;"></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 30px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <i>Tembusan Kepada Yth:</i>
                    <ul style="list-style: none;">
                        <li>1. Ketua RW 017 – Cluster Water Spring </li>
                        <li>2. Arsip</li>
                    </ul>
                </td>
            </tr>
        </table>
    </section>
</body>

</html>

<script>
function printAndClose() {
    window.print();
    window.onafterprint = function() {
        window.close();
    };
}
</script>