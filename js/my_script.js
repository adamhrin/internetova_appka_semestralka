$(function () {
    var path = window.location.pathname.split("/").pop();
    if(path == '')
    {
        path = 'index.php';
    }

    var target = $('.navbar-collapse a[href="'+path+'"]');
    target.parent().addClass('active');
    if(path == 'trainings.php')
    {
        var target = $('.navbar-collapse a[href="'+path+'"]');
        target.parent().parent().parent().addClass('active');
    }

    $('#date_time_picker').datetimepicker();
    $('#duration_picker').datetimepicker({
        format: 'hh:ii',
        autoclose: true,
        minView: 0,
        maxView: 1,
        startView: 1
    });
    $('#add_training_form').submit(function (event) {
        var location_form = $('#location_form').val();
        var date_time_form = $('#date_time_form').val();
        var duration_form = $('#duration_form').val();

        if (location_form == '' || date_time_form == '' || duration_form == '')
        {
            alert("Všetko musí byť vyplnené!");
            event.preventDefault();
        }
    });
    $('#password_check').on('input', function(e) {
        if ($(this).val() != "" && $('#new_password').val() != "" && $('#old_password').val() != "")
        {
            $('#change_pwd_btn').removeAttr('disabled');
        }
        else
        {
            $('#change_pwd_btn').attr('disabled', "disabled");
        }
        if ($(this).val() != $('#new_password').val())
        {
            $(this).css('border-color', 'red');
            $('#change_pwd_btn').attr('disabled', "disabled");
        }
        else
        {
            $(this).css('border-color', 'white');
        }
    });
    $('#new_password').on('input', function () {
        if ($(this).val() != "" && $('#password_check').val() != "" && $('#old_password').val() != "")
        {
            $('#change_pwd_btn').removeAttr('disabled');
        }
        else
        {
            $('#change_pwd_btn').attr('disabled', "disabled");
        }
        if ($(this).val() != $('#password_check').val())
        {
            $('#password_check').css('border-color', 'red');
            $('#change_pwd_btn').attr('disabled', "disabled");
        }
        else
        {
            $('#password_check').css('border-color', 'white');
        }
    });
    $('#old_password').on('input', function () {
        if ($(this).val() != "" && $('#new_password').val() != "" && $('#password_check').val() != "")
        {
            $('#change_pwd_btn').removeAttr('disabled');
        }
        else
        {
            $('#change_pwd_btn').attr('disabled', "disabled");
        }
    });
    $('#change_pwd_form').submit(function (event) {
        if ($('#old_password').val() == $('#new_password').val() && $('#old_password').val() != "")
        {
            alert("Nové heslo je rovnaké ako staré");
            event.preventDefault();
        }
    });
});