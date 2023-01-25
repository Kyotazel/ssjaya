var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';
var table, save_method, id_use;

$(document).ready(function () {
    table = $("#table-data").DataTable({
        "ajax": {
            "url": url_controller + "list_data",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [3, 5, 6],
                "class": "text-center"
            },
        ],
    })
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

$(document).on('click', '.change_status', function () {
    var selector = $(this);
    $(this).find('input').prop('checked');
    update_status(selector)

});

function update_status(selector) {
    var id = selector.data('id');
    var field = selector.data('status');
    active_status = selector.find('input').prop('checked') ? 1 : 0;
    $.ajax({
        url: url_controller + 'update_status',
        type: "POST",
        dataType: "JSON",
        data: {
            'id': id,
            'status': active_status,
            'field': field
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
        url: url_controller + url,
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
        url: url_controller + 'list_data',
        type: "POST",
        dataType: "JSON",
        data: {id: id_use},
        success: function (data) {
            if (data.status) {
                $('[name="name"]').val(data.data.name);
                $('[name="link"]').val(data.data.link);
                $('[name="icon"]').val(data.data.icon);
                $('[name="menu_type"]').val(data.data.menu_type);
                $('[name="is_group"]').val(data.data.is_group);
                $('[name="group"]').val(data.data.group);
                $('#modal_form').modal('show');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            notif_error(textStatus);
        }
    })
})