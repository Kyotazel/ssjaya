var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';
var table = $("#table-data").DataTable({});
var save_method, id_use;

$(document).ready(function () {
    table.destroy();
    table = $("#table-data").DataTable({
        "ajax": {
            "url": url_controller + "list_data",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [5],
                "class": "text-center"
            },
            {
                "targets": [2,4],
                "class": "text-wrap",
            }
        ],
    })
})

function add() {
    save_method = 'add';
    $('.form_input')[0].reset();
    $('.modal-title').html('TAMBAH DATA');
    $('.invalid-feedback').empty();
    $('.invalid-feedback').removeClass('d-block');
    $('.form-control').removeClass('is-invalid');
    select2 = $('.select2');
    select2.val(null).trigger('change');
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
                produk = data.data.produk;
                arr_prod = produk.split(", ")

                mySelect = document.getElementById("product");
                select2 = $(".select2")
                select2.val(null).trigger('change');

                mySelect.querySelectorAll('option').forEach(option => {
                    if (arr_prod.indexOf(option.value) > -1) {
                      option.selected = true;
                    }
                  });
                  
                select2.trigger('change');
                $('[name="nama_apotek"]').val(data.data.nama_apotek);
                $('[name="id_sales"]').val(data.data.id_sales);
                $('[name="kota"]').val(data.data.kota);
                $('[name="alamat"]').val(data.data.alamat);
                $('[name="produk"]').val(data.data.produk);
                $('#modal_form').modal('show');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            notif_error(textStatus);
        }
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

$("#filter_submit").click(function(e) {
    e.preventDefault();
    filter_city = $("#filter_city").val();    
    filter_product = $("#filter_product").val();    
    table.destroy();
    table = $("#table-data").DataTable({
        "ajax": {
            "url": url_controller + "list_data",
            "data": {filter_city: filter_city, filter_product: filter_product},
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [5],
                "class": "text-center"
            },
            {
                "targets": [2,4],
                "class": "text-wrap",
            }
        ],
    })
})