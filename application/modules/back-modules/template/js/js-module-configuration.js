var getUrl = window.location;
var baseUrl = _base_url;
var prefix_folder = "admin";

var path_current = getUrl.origin + getUrl.pathname;
$("a[data-url='" + path_current + "']").addClass("active");
// main-parent-menu
$("a[data-url='" + path_current + "']").closest(".main-parent-menu").addClass("collapsed");

function notif_success(message) {
    Swal.fire({
        title: 'Sukses!',
        html: message,
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    })
}

function notif_error(message) {
    Swal.fire({
        icon: 'error',
        title: 'Kesalahan',
        html: message,
        showConfirmButton: false,
        timer: 1500
      })
}

$('.select2').select2({
    placeholder: "Pilih...",
    allowClear: true
});