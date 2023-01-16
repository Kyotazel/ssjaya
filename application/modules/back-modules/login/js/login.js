var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';

$(".btn_login").click((e) => {
    e.preventDefault()
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').empty();

    var formData = new FormData($('#form-login')[0]);

    $.ajax({
        url: url_controller + "do_login",
        type: "POST",
        data: formData,
        contentType: false,
        processData : false,
        dataType: "JSON",
        success: (data) => {
            if(data.status){
                location.href = baseUrl + '/' + prefix_folder + '/home?token='+data.token;
            } else {                
                if (data.error_login != '') {
                    $('.text-message').html(data.error_login);
                }
                if (data.status_forgot_password) {
                    location.href = url_controller + 'forgot_password';
                }         
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
                    $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]);
                }
            }
        }
    })
})

$('#password-addon').click((e) => {
    var password = $("#password");
    if (password.attr("type") == "password") {
        password.attr("type", "text");
    } else {
        password.attr("type", "password")
    }
})