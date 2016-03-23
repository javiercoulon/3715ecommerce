var ERROR = false;
$(document).ready(function() {

    $("#txtpassword2").change(function() {
        if ($("#txtpassword1").val() == $(this).val()) {
            //success
            ERROR = false;
            $("#txtpassword1").removeClass('error_field');
            $("#txtpassword1").addClass('success_field');
            $("#txtpassword2").removeClass('error_field');
            $("#txtpassword2").addClass('success_field');
        } else {
            //error
            ERROR = true;
            $("#txtpassword2").addClass('error_field');
            $("#txtpassword2").removeClass('success_field');
            $("#txtpassword1").addClass('error_field');
            $("#txtpassword1").removeClass('success_field');
        }

    });

    $("#txtpassword1").change(function() {
        if ($("#txtpassword2").val().length > 0) {
            if ($("#txtpassword2").val() == $(this).val()) {
                //success
                ERROR = false;
                $("#txtpassword1").removeClass('error_field');
                $("#txtpassword1").addClass('success_field');
                $("#txtpassword2").removeClass('error_field');
                $("#txtpassword2").addClass('success_field');
            } else {
                //error
                ERROR = true;
                $("#txtpassword2").addClass('error_field');
                $("#txtpassword2").removeClass('success_field');
                $("#txtpassword1").addClass('error_field');
                $("#txtpassword1").removeClass('success_field');
            }
        }


    });
    $("#txtemail").change(function() {
        var email = $(this).val();
        $.ajax({
            type: "POST",
            data: {email: email},
            url: BACKEND_URL + "check_if_emailexists.php",
            success: function(msg) {
                console.info(msg);
                updateEmailStatus((msg));
                //show message
            }
        });
    });

    $("#btn_submit").click(function(e) {
        e.preventDefault();
        if (!ERROR) {
            $("#form1").submit();
        }
    });
});

function updateEmailStatus(json) {
    if (json.state && json.state == 1) {
        if (json.response_code == 1) {
            ERROR = true;
            $("#txtemail").addClass('error_field');
            $("#txtemail").removeClass('success_field');
        } else if (json.response_code == 2) {
            ERROR = false;
            $("#txtemail").removeClass('error_field');
            $("#txtemail").addClass('success_field');
            console.info('secucc')
        }
    }
}