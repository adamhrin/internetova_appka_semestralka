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

</head>
<body>
<?php
include "header.php";

if (isset($_SESSION['user']) and isset($_SESSION['id_user']))
{
    ?>
    <br>
<div class="container">
    <div> <!--class="col-md-6 col-md-offset-6"-->
        <!-- The table class adds nice spacing and the other classes add additional style -->
        <table class="table table-bordered table-striped table-hover training_players_table">
            <thead>
            <tr>
<?php
$app = new App();
if (isset($_GET['id_training']))
{
    $app->generateTableHeadTrainingsPlayers($_GET['id_training']);

    ?>
            </tr>
            </thead>
            <tbody>

            <tr>
        <!-- You can adjust the width of table columns as well -->
                <th class="col-md-2 text-center">Meno</th>
                <th class="col-md-2 text-center">Nick</th>
                <th class="col-sm-2 col-xs-1 text-center">Príde</th>
                <th class="col-sm-2 col-xs-1 text-center">Nepríde</th>
                <th class="col-sm-2 col-xs-1 text-center">Nevyjadril sa</th>
            </tr>
    <?php
    $app->generateTableTrainingPlayers($_GET['id_training']);
    ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
}
else
{
    //echo "You must login or sign up";
    echo "<script>location.href = 'index.php';</script>";
}
?>
</body>
