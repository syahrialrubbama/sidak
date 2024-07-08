$(document).ready(function () {
    const getDataWarga = () => {
        $.ajax({
            url: './ajax/dashboardWarga.php',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                const { grafik_pendatang, grafik_pindah } = data.result;

                // Data Warga Pindah (red)
                const labelPindah = grafik_pindah.map(item => item.tgl_pindah);
                const valuePindah = grafik_pindah.map(item => item.jumlah_pindah);
                const ctxWargaPindah = $('#dashboard #grafik-data-warga-pindah');
                new Chart(ctxWargaPindah, {
                    type: 'bar',
                    data: {
                        labels: labelPindah,
                        datasets: [{
                            label: 'Data Warga Pindah',
                            data: valuePindah,
                            backgroundColor: 'lightgreen',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Data Warga Pendatang (blue)
                const labelPendatang = grafik_pendatang.map(item => item.tgl_datang);
                const valuePendatang = grafik_pendatang.map(item => item.jumlah_datang);
                const ctxWargaPendatang = $('#dashboard #grafik-data-warga-pendatang');
                new Chart(ctxWargaPendatang, {
                    type: 'bar',
                    data: {
                        labels: labelPendatang,
                        datasets: [{
                            label: 'Data Warga Pendatang',
                            data: valuePendatang,
                            backgroundColor: 'lightblue',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    };
    getDataWarga();
});
