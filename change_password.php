<?php
//session_start();

include_once "classes/User.php";
include_once "classes/IStorage.php";
include_once "classes/DBStorage.php";
include_once "classes/App.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Semestralka</title>
    <!-- bootstrap -->

    <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <script src="js/jquery-3.2.1.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax_func.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/my_script.js"></script>

</head>
<body>

<?php
include "header.php";
if (isset($_SESSION['id_user']))
{
    $app = new App();

    ?>
    <div class="container">
        <div class="page-header">
            <h1>Zmena hesla</h1>
        </div>
        <div class="thumbnail">
            <form method="post" id="change_pwd_form">
                <div id="change_pwd" class="thumbnail form-group">
                    <div class="form-group">
                        <label for="old_password">Staré heslo</label>
                        <input type="password" class="form-control" name="old_password" id="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nové heslo</label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                    </div>
                    <div class="form-group">
                        <label for="password_check">Potvrdiť nové heslo</label>
                        <input type="password" class="form-control" name="password_check" id="password_check">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" name="change_pwd_btn" id="change_pwd_btn" disabled="disabled">Ulož</button>
            </form>
        </div>
    </div>
<?php
    if (isset($_POST['change_pwd_btn']))
    {
        $app->updatePassword($_SESSION['id_user'], $_SESSION['user'], $_POST['old_password'], $_POST['new_password']);
        //header("Location: index.php");
    }
}
else
{
    //echo "You must login or signup";
    echo "<script>location.href = 'index.php';</script>";
}
?>

</body>