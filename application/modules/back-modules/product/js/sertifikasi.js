var url_controller = baseUrl + '/' + prefix_folder + '/' + 'product/sertifikasi/';
var table, id_use;
var url_sertifikasi = $("#url").val();
let ck_deskripsi, ck_manfaat

$(document).ready(function () {
    table = $("#table-data").DataTable({
        "ajax": {
            "url": url_controller + "list_data/" + url_sertifikasi,
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [2],
                "class": "text-center"
            },
        ],
    })
    $('.dropdown-toggle').dropdown()
})

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
                url: url_controller + 'delete_data/' + url_sertifikasi,
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
    e.preventDefault(); 
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').empty();
    $('.invalid-feedback').removeClass('d-block');
    // $('#telepon').val(telp.getRawValue());
    var formData = new FormData($('.form_input')[0]);
    var url;
    var status;
    if (save_method == 'add') {
        url = 'save';
        status = "Ditambahkan";
    } else {
        url = 'update';
        status = "Diubah";
        formData.append('id', id_use);
    }

    $.ajax({
        url: url_controller + url + "/" + url_sertifikasi,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                notif_success(`<b>Sukses :</b> Data berhasil ${status}`);
                table.ajax.reload(null, false);
                $("#modal_form").modal("hide");
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
        url: url_controller + 'list_data/' + url_sertifikasi,
        type: "POST",
        dataType: "JSON",
        data: {id: id_use},
        success: function (data) {
            if (data.status) {
                $('.update_photo').css('display', 'block');
                $('[name="nama"]').val(data.data.nama);
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