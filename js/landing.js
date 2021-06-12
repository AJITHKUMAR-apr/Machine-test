var pathName="";
$(document).ready(function () {
    pathName = $('#pathName').val();
});

function login() {
    var flag = 0;
    $('.login-form .required').each(function () {
        if ($(this).val() === '') {
            flag = 1;
            $(this).addClass('needed');
        } else {
            $(this).removeClass('needed');
        }
    });

    $('#loginResponse').removeClass('alert success').slideUp().html('');
    if (flag === 1) {
        $("#loginResponse").addClass('alert').html("Please provide credentials").slideDown(function () {
            workingBG = false;
        });

    } else {
        var username = $('#loginForm').find('#name').val();
        var serialForm = $('#loginForm').serialize();
        $('#loginForm').find('input').attr("disabled", "true");
        $('#loginForm').find('input').attr("select", "true");
        $('#loginButton').html('Processing').attr('disabled', "disabled");
        $('#forgot-toggle-button').hide();
        $.post(pathName + 'login', serialForm, function (data) {
            if (data !== "success") {
                $("#loginResponse").addClass('alert').html(data).slideDown(function () {
                    workingBG = false;
                    $('.login-form .required').addClass('needed');
                    $('#loginButton').html('Login').removeAttr('disabled');
                    $('#login-email').focus();
                });
            } else {
                setTimeout(function () {
                    window.location = pathName + "stocks/search";

                }, 1500);
                $("#loginResponse").addClass('success').html("Logged in").slideDown();
            }
        });
    }

    return false;
}
