var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';
var table, id_use;
let ck_deskripsi, ck_manfaat

$(document).ready(function () {
    table = $("#table-data").DataTable({
        "ajax": {
            "url": url_controller + "list_data",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [4],
                "class": "text-center"
            },
            {
                "targets": [1],
                "class": "text-wrap",
            }
        ],
    })
    $('.dropdown-toggle').dropdown()

    if(save_method == 'update') {
        $('.for_update').css('display', 'block');
    }
})

ClassicEditor
    .create( document.querySelector( '#deskripsi' ) )
    .then( newEditor => {
        ck_deskripsi = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#manfaat' ) )
    .then( newEditor => {
        ck_manfaat = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

$(document).on('click', '.btn_delete', function () {
    id = $(this).data('id');
    Swal.fire({
        icon: 'question',
        text: 'Yakin ingin menghapus data?',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary rounded-pill w-xs me-2 mb-1 mr-3',
        confirmButtonText: "Ya , Lanjutkan",
        cancelButtonText: "Batal",
        cancelButtonClass: 'btn btn-danger rounded-pill w-xs mb-1',
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url_controller + 'delete_data',
                type: "POST",
                dataType: "JSON",
                data: {
                    'id': id
                },
                success: function (data) {
                    if (data.status) {
                        notif_success("<b>Sukses : </b> Data Berhasil Dihapus")
                        table.ajax.reload(null, false);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    notif_error(textStatus);
                }
            })
        }
    });
});


$(document).on('click', '.change_to_active', function () {
    var selector = $(this);
    let status = 1;
    Swal.fire({
        icon: 'question',
        text: 'Ganti menjadi aktif?',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary rounded-pill w-xs me-2 mb-1 mr-3',
        confirmButtonText: "Ya , Lanjutkan",
        cancelButtonText: "Batal",
        cancelButtonClass: 'btn btn-danger rounded-pill w-xs mb-1',
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            update_status(selector, status)
        }
    })
});

$(document).on('click', '.change_to_not_active', function () {
    var selector = $(this);
    let status = 0;
    Swal.fire({
        icon: 'question',
        text: 'Ganti menjadi tidak aktif?',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary rounded-pill w-xs me-2 mb-1 mr-3',
        confirmButtonText: "Ya , Lanjutkan",
        cancelButtonText: "Batal",
        cancelButtonClass: 'btn btn-danger rounded-pill w-xs mb-1',
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            update_status(selector, status)
        }
    })
});


function update_status(selector, status) {
    var id = selector.data('id');
    $.ajax({
        url: url_controller + 'update_status',
        type: "POST",
        dataType: "JSON",
        data: {
            'id': id,
            'status': status
        },
        success: function (data) {
            if (data.status) {
                notif_success("Data berhasil diupdate");
                table.ajax.reload();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            notif_error(textStatus);
        }

    }); //end ajax
}

function add() {
    save_method = 'add';
    $('.form_input')[0].reset();
    $('.modal-title').html('TAMBAH DATA');
    $('.invalid-feedback').empty();
    $('.invalid-feedback').removeClass('d-block');
    $('.form-control').removeClass('is-invalid');
    $('#modal_form').modal('show');
}

$('.btn_save').click(function (e) {
    save_method = $(this).data('method');
    const deskripsi = ck_deskripsi.getData();
    const manfaat = ck_manfaat.getData();
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').empty();
    $('.invalid-feedback').removeClass('d-block');
    // $('#telepon').val(telp.getRawValue());
    var formData = new FormData($('.form_input')[0]);
    formData.append('deskripsi', deskripsi);
    formData.append('manfaat', manfaat);
    var url;
    var status;
    if (save_method == 'add') {
        url = 'save';
        status = "Ditambahkan";
    } else {
        id_use = $(this).data("id")
        url = 'update';
        status = "Diubah";
        formData.append('id', id_use);
    }

    $.ajax({
        url: url_controller + url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                notif_success(`<b>Sukses :</b> Data berhasil ${status}`);
                window.location.href = data.redirect
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                    $('[name="' + data.inputerror[i] + '"]').siblings(':last').text(data.error_string[i]);
                    $('[name="' + data.inputerror[i] + '"]').siblings(':last').addClass('d-block');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            notif_error(textStatus);
        },
    }); //end ajax
});

$(document).on('click', '.btn_edit', function () {
    $('.modal-title').html('EDIT DATA');
    $('.invalid-feedback').empty();
    $('.invalid-feedback').removeClass('d-block');
    $('.form-control').removeClass('is-invalid');
    id_use = $(this).data("id")
    save_method = 'update';
    $.ajax({
        url: url_controller + 'list_data',
        type: "POST",
        dataType: "JSON",
        data: {id: id_use},
        success: function (data) {
            if (data.status) {
                $('.update_photo').css('display', 'block');
                $('[name="nama"]').val(data.data.nama);
                $('[name="komentar"]').val(data.data.komentar);
                $('[name="jabatan"]').val(data.data.jabatan);
                $('[name="id_produk"]').val(data.data.id_produk);
                $('#modal_form').modal('show');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            notif_error(textStatus);
        }
    })
})

$(document).on('click', '[data-toggle="modal"]', function () {
    var titleLabel = $(this).data('title');
    var imageSrc = $(this).data('img');
    $("#modalImage").attr("src", imageSrc);
    $("#imageModalLabel").text(titleLabel);
});