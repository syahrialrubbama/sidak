<?php
include '../inc/koneksi.php';

// SQL query to group by tgl_pindah and count the number of occurrences
$dataPindahQuery = "
    SELECT 
        DATE_FORMAT(d.tgl_pindah, '%d/%m/%Y') as tgl_pindah, 
        COUNT(*) as jumlah_pindah 
    FROM 
        tb_pindah d 
    INNER JOIN 
        tb_pdd p 
    ON 
        p.id_pend = d.id_pdd 
    GROUP BY 
        DATE_FORMAT(d.tgl_pindah, '%d/%m/%Y')
    ORDER BY
        d.tgl_pindah ASC
";

$dataPindah = $koneksi->query($dataPindahQuery);

$pindahData = $dataPindah->fetch_all(MYSQLI_ASSOC);

// SQL query to group by tgl_datang and count the number of occurrences
$dataPendatangQuery = "
    SELECT 
        DATE_FORMAT(d.tgl_datang, '%d/%m/%Y') as tgl_datang, 
        COUNT(*) as jumlah_datang 
    FROM 
        tb_datang d 
    INNER JOIN 
        tb_pdd p 
    ON 
        d.pelapor = p.id_pend 
    GROUP BY 
        DATE_FORMAT(d.tgl_datang, '%d/%m/%Y')
    ORDER BY
        d.tgl_datang ASC
";

$dataPendatang = $koneksi->query($dataPendatangQuery);

$pendatangData = $dataPendatang->fetch_all(MYSQLI_ASSOC);

echo json_encode([
    'status' => true,
    'message' => 'Berhasil menampilkan data',
    'result' => [
        'grafik_pindah' => $pindahData,
        'grafik_pendatang' => $pendatangData,
    ],
]);
