(function ($) {
    $("#frm_Login").submit(function (ev) {
        $("#alert").html("");
        ev.preventDefault();
        var self = this;
        $.ajax({
            url: 'Login',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                $("#Psw > input").removeClass('is-invalid');
                $("#Usr > input").removeClass('is-invalid');
                $("#Psw > input").addClass('is-valid');
                $("#Usr > input").addClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function (xhr) {

                    $("#Psw > input").removeClass('is-invalid');
                    $("#Usr > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.txtUser.length != 0) {
                        $("#Usr > div").html(json.txtUser);
                        $("#Usr > input").addClass('is-invalid');
                    }
                    if (json.txtPass.length != 0) {
                        $("#Psw > div").html(json.txtPass);
                        $("#Psw > input").addClass('is-invalid');
                    }
                },
                401: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    $("#alert").html('<div class="alert alert-danger" role="alert">' + json.msg + '</div>');
                }

            }
        });
    });
})(jQuery)