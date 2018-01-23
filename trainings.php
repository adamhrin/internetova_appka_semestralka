<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once "classes/User.php";
include_once "classes/IStorage.php";
include_once "classes/DBStorage.php";
include_once "classes/App.php";

$app = new App();

if (isset($_GET['decision']) and isset($_SESSION['user']) and isset($_SESSION['id_user']))
{
    $app->userExpressesOnTraining($_SESSION['id_user'], $_GET['decision'], $_GET['id_training']);
}

if (isset($_POST['id_training']) and isset($_SESSION['user']) and isset($_SESSION['id_user']))
{
    $app->deleteTraining($_POST['id_training']);
}
?>

<!--trainings.php-->
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

if (isset($_SESSION['user']) and isset($_SESSION['id_user']))
{

?>

<div class="container">
<div class="page-header">
    <h1>Prehľad tréningov pre <?php echo $_SESSION['user'] ?>
        <?php
        if ($_SESSION['user'] == 'admin') {
            ?>
            <span id="add_training_btn_big"><a href="add_training.php" class="btn btn-default btn-lg pull-right hidden-xs" role="button">
                    <span class="glyphicon glyphicon-plus-sign"></span> Pridať tréning</a>
            </span>
            <?php
        }
        ?>
    </h1>
    <?php
    if ($_SESSION['user'] == 'admin') {
        ?>
            <p id="add_training_btn_small"><a href="add_training.php" class="btn btn-default btn-lg pull-left hidden-lg hidden-md hidden-sm" role="button">
                    <span class="glyphicon glyphicon-plus-sign"></span> Pridať tréning</a>
            </p>
        <?php
    }
    ?>
</div>
</div>
<div class="container">
<?php

$app->showTrainingsForUser($_SESSION['user'], $_SESSION['id_user']);

?>
<!--
<div class="thumbnail">
    <h2>1.týždeň (01.01. - 07.01.2018)</h2>
</div>
-->
</div>

    <?php
}
else
{
    //echo "You must login or sign up";
    echo "<script>location.href = 'index.php';</script>";
}
?>

</body>


