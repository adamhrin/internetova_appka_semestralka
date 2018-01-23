$(function(){
    $('#login_button').click(function() {
        var nick_login = $('#nick_login').val();
        var password_login = $('#password_login').val();

        if(nick_login == '' || password_login == '')
        {
            alert("Obidva údaje sú potrebné");
        }
        else
        {
            console.log("pred postom login");
            $.post({
                url: 'login_action.php',
                data: {nick_login: nick_login, password_login: password_login},
                success: function(data){
                    if(data == 'No')
                    {
                        alert("Zlý nick alebo heslo!");
                    }
                    else
                    {
                        $('#loginModal').hide();
                        location.href = 'index.php';
                    }
                }
            });
        }
    });

    $('#signup_button').click(function(){
        var firstname = $('#firstname').val();
        var surname = $('#surname').val();
        var email = $('#email').val();
        var nick_signup = $('#nick_signup').val();
        var password_signup = $('#password_signup').val();
        //console.log("pred postom");

        if(nick_signup == '' || password_signup == '') // ak nie su povinne policka prazdne
        {
            alert("Nick a heslo sú vyžadované!");
        }
        else
        {
            $.post({
                url: "signup_action.php",
                data: {
                    firstname: firstname,
                    surname: surname,
                    email: email,
                    nick_signup: nick_signup,
                    password_signup: password_signup
                },
                success: function(data){
                    if(data == 'No')
                    {
                        alert("Používateľ s týmto nickom a heslom už existuje");
                    }
                    else
                    {
                        $('#signupModal').hide();
                        location.href = 'index.php';
                    }
                }
            });
        }
    });

    $('.acceptBtn').click(function () {
        var current = $(this);
        var trainingDiv = current.parent().parent().parent();
        $.get({
            url: "trainings.php",
            data: {decision: "accept", id_training: current.val()},
            success: function (data) {
                if (trainingDiv.hasClass("declinedTraining"))
                {
                    trainingDiv.removeClass("declinedTraining");
                }
                else if (trainingDiv.hasClass("neutralTraining"))
                {
                    trainingDiv.removeClass("neutralTraining");
                }
                trainingDiv.addClass("acceptedTraining");
            }
        });


    });

    $('.declineBtn').click(function () {
        var current = $(this);
        var trainingDiv = current.parent().parent().parent();
        $.get({
            url: "trainings.php",
            data: {decision: "decline", id_training: current.val()},
            success: function (data) {
                if (trainingDiv.hasClass("acceptedTraining"))
                {
                    trainingDiv.removeClass("acceptedTraining");
                }
                else if (trainingDiv.hasClass("neutralTraining"))
                {
                    trainingDiv.removeClass("neutralTraining");
                }
                trainingDiv.addClass("declinedTraining");
            }
        });
    });

    $('#add_category_btn').click(function () {
        var new_category = $('#add_category_input').val();
        if (new_category == '')
        {
            alert("Údaj musí byť vyplnený");
        }
        else
        {
            $.post({
                url: "add_training.php",
                data: {new_category: new_category},
                success: function (data) {
                    if (data == 'No')
                    {
                        alert('Kategória už existuje!');
                    }
                    else if (data == 'Yes')
                    {
                        alert('Kategória pridaná');
                        location.reload();
                    }
                    else
                    {
                        var html = data;
                        /*data = JSON.parse(data);
                        var id = data.id_category;
                        var title = data.title;
                        var html = '<p>'+
                                        '<input id="chb' + id + '" type="checkbox"  name="category[]" value="' + id + '">' +
                                        '<label for="chb' + id + '">' + title + '</label>' +
                                   '</p>';*/
                        //alert(html);
                        $('#categories').append(html);
                        $('#add_category_input').val('');
                    }
                }
            });
        }
    });

    $('.delete_training_btn').click(function () {
        if (confirm("Naozaj cheš vymazať tento tréning?"))
        {
            var id_training = $(this).val();
            var training_thumbnail =  $(this).parent().parent().parent();
            $.post({
                url: "trainings.php",
                data: {id_training: id_training},
                success: function (data) {
                    training_thumbnail.hide();
                    alert("Tréning úspešne vymazaný");
                }
            });

        }
        else
        {
            console.log("nie");
        }
    })
});