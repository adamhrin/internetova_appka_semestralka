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

    if (isset($_POST['save_account_settings_btn']))
    {
        $app->updateUsersInfo($_SESSION['id_user'], $_POST['ch_firstname'], $_POST['ch_surname'], $_POST['ch_email'],
            $_POST['ch_nick'], $_POST['category']);
        //header("Location: index.php");
    }

    $app->generateAccountSettings($_SESSION['id_user']);

}
else
{
    //echo "You must login or signup";
    echo "<script>location.href = 'index.php';</script>";
}
?>


</body>
