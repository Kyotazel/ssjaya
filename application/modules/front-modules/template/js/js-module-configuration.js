var getUrl = window.location;
var baseUrl = _base_url;
var prefix_folder = "";

function notif_success(message) {
    Toastify({
        text: `<div class="alert alert-success alert-dismissible alert-label-icon rounded-label fade show mb-0" role="alert">
                    <i class="ri-check-double-line label-icon"></i>${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`,
        // className: "success",
        duration: 3000,
        gravity: "top", // `top` or `bottom`
        position: "right",
        escapeMarkup : false,
        close: false
    }).showToast();
}

function notif_error(message) {
    Toastify({
        text: `<div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show mb-0" role="alert">
                <i class="ri-error-warning-line label-icon"></i><strong>Error</strong> - ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`,
        className: "danger",
        style: {
            background: "linear-gradient(to right, #ff4747, #f72a2a)",
        },
        duration: 3000,
        escapeMarkup : false,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
    }).showToast();
}