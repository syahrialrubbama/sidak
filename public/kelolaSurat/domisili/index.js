var body = $('body');
var dataTableSuratDomisili = $('#dataTableSuratDomisili').DataTable();

$(document).ready(function () {

    const getLoadDomisili = () => {
        $.ajax({
            url: './ajax/domisili.php',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                $('#dataTableSuratDomisili').DataTable().destroy();
                
                const formattedData = data.result.map((item, index) => [
                    index + 1,
                    item.no_surat || '-',
                    `${item.nik} - ${item.nama}` || '-',
                    item.alasan_buat_surat || '-',
                    item.tujuan_buat_surat || '-',
                   
                    `
                    <div class="text-center">
                    ${item.tujuan_buat_surat !== 'Surat Pengantar Diproses' ? `
                        <button type="button" class="btn btn-info btn-pdf mb-2 btn-sm" data-id="${item.id}" title="PDF Surat" style="font-size: 11px;">
                            <i class="fas fa-print" style="font-size: 11px;"></i>
                        </button>
                         ` : ''}
                        <button type="button" class="btn btn-dark btn-edit mb-2 btn-sm" data-id="${item.id}" title="Edit Surat"  style="font-size: 11px;">
                            <i class="fas fa-tag" style="font-size: 11px;"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-delete mb-2 btn-sm" data-id="${item.id}" title="Hapus Surat"  style="font-size: 11px;">
                            <i class="fas fa-trash" style="font-size: 11px;"></i>
                        </button>
                    </div>
                    `
                ]);

                $('#dataTableSuratDomisili').DataTable({
                    data: formattedData,
                    columns: [
                        { title: "No" },                        
                        { title: "Nomor Surat" },
                        { title: "Nama Warga" },
                        { title: "Maksud dan Tujuan" },
                        { title: "Status" },
                        { title: "Action" }
                    ]
                });
            }
        })
    }
    getLoadDomisili();

    body.on('click', '.btn-add', function (e) {
        e.preventDefault();
        $('#modalFormLg').modal('show');

        $('#modalFormLgLabel').html('Tambah Surat Pengantar');
        $.ajax({
            url: './surat/form/add_surat_domisili.php',
            type: 'get',
            dataType: 'text',
            data: {
                action: 'add'
            },
            success: function (data) {
                $('#output_modal').html(data);

                $(body).on('click', '.btn-close', function (e) {
                    e.preventDefault();
                    $('#modalFormLg').modal('hide');
                })
            }
        })
    });

    body.on('click', '.btn-delete', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: './surat/form/delete-domisili.php',
                    type: 'post',
                    data: {
                        id: $(this).data('id')
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: data.message,
                                icon: 'success'
                            })
                            getLoadDomisili();
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message,
                                icon: 'error'
                            })
                        }
                    }
                })
            }
        })
    })

    body.on('click', '.btn-edit', function (e) {
        e.preventDefault();
        $('#modalFormLg').modal('show');

        $('#modalFormLgLabel').html('Edit Surat Pengantar');
        $.ajax({
            url: './surat/form/add_surat_domisili.php',
            type: 'get',
            dataType: 'text',
            data: {
                action: 'edit',
                id: $(this).data('id')
            },
            success: function (data) {
                $('#output_modal').html(data);

                $(body).on('click', '.btn-close', function (e) {
                    e.preventDefault();
                    $('#modalFormLg').modal('hide');
                })
            }
        })
    });

    body.on('click', '.btn-print', function (e) {
        e.preventDefault();
        const url = 'surat/form/print_domisili.php?id=' + $(this).data('id');
        window.open(url, '_blank');
    })

    body.on('click', '.btn-pdf', function (e) {
        e.preventDefault();
        const url = 'surat/form/pdf_domisili.php?id=' + $(this).data('id');
        window.open(url, '_blank');
    });
});
