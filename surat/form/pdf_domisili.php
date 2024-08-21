<?php
include '../../inc/koneksi.php';
include '../../vendor/autoload.php';

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
function base64_encode_image($filename)
{
    $path = $filename;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
$base64_stempel = base64_encode_image('../../dist/img/stemple2.png');
$base64_footer = base64_encode_image('../../dist/img/footer2.jpg');
$base64_logo = base64_encode_image('../../dist/img/Picture1.png');

ob_start();
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

    .date-container {
        font-size: 18px;
        font-weight: bold;
        margin: 20px;
    }


    footer {}
    </style>
</head>

<body>
    <section id="header">
        <table style="width: 100%;">
            <tr>
                <td style="width: 17%;">
                    <img src="<?= $base64_logo ?>" alt="Logo Surat" style="height: 120px;">
                </td>
                <td style="text-align: center;">
                    <h1 style="margin: 0; padding: 0; margin-bottom: 1px;">RUKUN WARGA 18</h1>
                    <span style="font-size:17px; font-weight: bold;">Cluster Warga Terrace - Perumahan Grand
                        Wisata</span> <br />
                    <span style="font-size: 15px; font-weight: bold;">Desa Lambang Jaya Kecamatan Tambun Selatan <br>
                        Kabupaten Bekasi</span>
                    <div style="margin-top: 5px; height: 0.5px; background: black;"></div>
                    <div style="margin-top: 2.5px; height: 0.5px; background: black;"></div>
                </td>
            </tr>
        </table>
    </section>
    <section id="tertuju" style="margin-top: 25px;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 15%; font-size:15px;">Nomor</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['no_surat'] ?></td>
            </tr>
            <tr>
                <td style="width: 15%; font-size:15px;">Lampiran</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;">Identitas pemohon / Kartu keluarga</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 5px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:15px;">Kepada Yth.</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 5px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:15px;">
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
                <td colspan="3" style="font-size:15px;">Dengan Hormat,</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:15px;">
                    Yang bertanda tangan di bawah ini Ketua Paguyuban Warga Cluster Water Terrace Desa Lambang Jaya,
                    dengan ini menerangkan bahwa :
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="width: 30%; font-size:15px;">Nama</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['nama'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Tempat, Tanggal Lahir</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['tempat_lh'] ?>, <?= tgl_indo($rowData['tgl_lh']) ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Jenis Kelamin</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['jekel'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Pekerjaan</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Agama</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['agama'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Status Pernikahan</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['status_perkawinan'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Kewarganegaraan</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;"><?= $rowData['kewarganegaraan'] ?></td>
            </tr>
            <tr>
                <td style="font-size:15px;">Alamat</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;">
                    <?= $rowData['desa'] ?>
                </td>
            </tr>
            <tr>
                <td style="font-size:15px;">Maksud dan Tujuan</td>
                <td style="width: 2%;">:</td>
                <td style="font-size:15px;">
                    <?= $rowData['alasan_buat_surat'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:15px;">
                    Demikian surat pengantar ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:15px;">
                    Bekasi, <?php echo date('d F Y') ?>


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
                    <p style="margin: 0; padding: 0; font-size:15px;">
                        Hormat Kami,
                    </p>
                    <img src="<?= $base64_stempel ?>" alt="Stempel"
                        style="height: 90px; padding-top:5px; padding-bottom: 5px;"> <br>
                    <strong style="text-decoration: underline; font-size:14px; padding-top: 10px;">Mohammad
                        Ilyas</strong><br />
                    <i style="font-size:14px;">Ketua Paguyuban</i>
                </td>
                <td style="width: 35%;"></td>
                <td style="text-align: center; vertical-align: top; width: 25%;">
                    <p style="margin: 0; padding: 0; font-size:15px;">Pemohon,</p>
                    <div style="margin-top: 115px;"></div>
                    <div style="border: 0.5px dashed black; margin-bottom: 2.5px;"></div>
                    <div style="width: 100%; height: 0.5px; background: black;"></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="height: 10px;"></td>
            </tr>

        </table>
    </section>
    <footer style="text-align: center;">
        <img src="<?= $base64_footer ?>" alt="Stempel" style="height: 60px; padding-top:45px;">
    </footer>
</body>


</html>


<?php
$html = ob_get_clean();

use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();
$options = new Options();
$options->set('isPhpEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('surat-keterangan-domisili.pdf', ['Attachment' => false]);
?>