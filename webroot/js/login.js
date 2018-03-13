$(document).ready(function () {
    $(document).on('click', '#btn-login', function () {
        $.ajax({
            url: "http://localhost/blogg/login",
            type: "post",
            dataType: "text",
            data: {
                login_query: 1,
                username: $('#username').val(),
                password: $('#password').val()
            }
        });
    });
});