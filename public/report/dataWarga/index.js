var body = $('body');
var startDate = moment().format('DD/MM/YYYY');
var endDate = moment().format('DD/MM/YYYY');
var dataTable = $('#dataTableReportWarga').DataTable();


const calculateAge = (dateString) => {
    const changeFormat = moment(dateString, 'DD/MM/YYYY').format('YYYY-MM-DD');
    const today = new Date();
    const birthDate = new Date(changeFormat);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

$(document).ready(function () {
    $('#reportDataWarga .daterange').daterangepicker({
        startDate: startDate,
        endDate: endDate,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }).on('apply.daterangepicker', function (ev, picker) {
        startDate = picker.startDate.format('YYYY-MM-DD');
        endDate = picker.endDate.format('YYYY-MM-DD');
    });

    var getFilter = () => {
        let jenisKelamin = $('#reportDataWarga select[name="jekel"]').val();
        let usia = $('#reportDataWarga input[name="tgl_lh"]').val();

        return {
            tanggalPeriode: {
                startDate,
                endDate
            },
            jenisKelamin,
            usia
        };
    };

    const loadReport = () => {
        const filter = getFilter();
        $.ajax({
            url: './ajax/dataWarga.php',
            type: 'get',
            dataType: 'json',
            data: {
                filter: JSON.stringify(filter)
            },
            success: function (data) {
                $('#dataTableReportWarga').DataTable().destroy();
                const formattedData = data.result.map((item, index) => [
                    index + 1,
                    item.nik || '-',
                    item.nama || '-',
                    item.tgl_lh || '-',
                    calculateAge(item.tgl_lh) || '-',
                    item.jekel || '-',
                    item.desa || '-',
                    item.rt || '-',
                    item.rw || '-',
                    item.no_kk || '-',
                    item.created_at || '-'
                ]);

                $('#dataTableReportWarga').DataTable({
                    data: formattedData,
                    columns: [
                        { title: "No" },
                        { title: "NIK" },
                        { title: "Nama" },
                        { title: "Tanggal Lahir" },
                        { title: "Usia" },
                        { title: "Jenis Kelamin" },
                        { title: "Desa" },
                        { title: "RT" },
                        { title: "RW" },
                        { title: "Nomor KK" },
                        { title: "Tanggal Terdaftar" }
                    ]
                });
            }
        })
    }

    loadReport();
    body.on('click', '.btn-filter', function (e) {
        e.preventDefault();
        loadReport();
    });

    body.on('click', '.btn-export', function (e) {
        e.preventDefault();

        const filter = JSON.stringify(getFilter());
        window.open('./export/dataWarga.php?filter=' + filter, '_blank');
    })
});
