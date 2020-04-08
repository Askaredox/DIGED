(function ($) {
    $("#UpdatePassword").submit(function (ev) {
        ev.preventDefault();
        var self = this;
        $.ajax({
            url: 'Docente/Docente_home/changePassword',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                $("#Pw1 > input").removeClass('is-invalid');
                $("#Pw2 > input").removeClass('is-invalid');
                $("#Pw1 > input").addClass('is-valid');
                $("#Pw2 > input").addClass('is-valid');
                var json = JSON.parse(data);
                window.location.replace(json.url);
                //console.log(data);
            },
            statusCode: {
                400: function (xhr) {

                    $("#Pw1 > input").removeClass('is-invalid');
                    $("#Pw2 > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.P1.length != 0) {
                        $("#Pw1 > div").html(json.P1);
                        $("#Pw1 > input").addClass('is-invalid');
                    }
                    if (json.P2.length != 0) {
                        $("#Pw2 > div").html(json.P2);
                        $("#Pw2 > input").addClass('is-invalid');
                    }
                }
            }
        });
    });
})(jQuery)
