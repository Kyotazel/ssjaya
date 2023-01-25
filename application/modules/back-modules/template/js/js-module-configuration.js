var getUrl = window.location;
var baseUrl = _base_url;
var prefix_folder = "admin";

var path_current = getUrl.origin + getUrl.pathname;
$("a[data-url='" + path_current + "']").addClass("active");
// main-parent-menu
$("a[data-url='" + path_current + "']").closest(".main-parent-menu").addClass("collapsed");

function notif_success(message) {
    Swal.fire(
        'Sukses!',
        message,
        'success'
      )
}

function notif_error(message) {
    Swal.fire({
        icon: 'error',
        title: 'Kesalahan',
        text: message,
      })
}