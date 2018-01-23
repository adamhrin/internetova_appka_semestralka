<?php
include_once "classes/User.php";
include_once "classes/IStorage.php";
include_once "classes/DBStorage.php";
include_once "classes/App.php";

$app = new App();
if (isset($_POST['new_category']))
{
    $app->addCategory();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Semestralka</title>
    <!-- bootstrap -->
    <!--ano si tu -->

    <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">


    <script src="js/jquery-3.2.1.min.js"></script>
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
    if($_SESSION['user'] != 'admin')
    {
        echo "Nemáš povolenie na pridanie tréningu!";
    }
    else
    {
?>

<div class="container">
<div class="page-header">
    <h1>Pridať tréning</h1>
</div>
    <div class="thumbnail">
        <form id="add_training_form" method="post">
            <div class="form-group">
                <label for="location_form">Miesto</label>
                <input type="text" class="form-control" name="location_form" id="location_form"
                       aria-describedby="locationHelp" placeholder="Rosinská cesta">
                <small id="locationHelp" class="form-text text-muted">Rosinská cesta, Stará menza, ŠH Javorku ...
                </small>
            </div>
            <div class="form-group">
                <label>Čas</label>
                <div id="date_time_picker" class="input-group date">
                    <input type="text" class="form-control" name="date_time_form" id="date_time_form"
                           placeholder="2018-01-01 18:30"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="form-group">
                <label>Trvanie</label>
                <div id="duration_picker" class="input-group date">
                    <input type="text" class="form-control" name="duration_form" id="duration_form"
                           placeholder="01:30"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <label>Kategórie</label>
            <div class="thumbnail">
                <div id="categories">
                    <?php

                    $app->generateCategoriesCheckboxes();

                    ?>
                </div>
                <div class="input-group input-group-md">
                    <input id="add_category_input" type="text" class="form-control" placeholder="Pridaj kategóriu">
                    <span class="input-group-btn">
                        <button id="add_category_btn" name="add_category_btn" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-plus-sign"></span> Pridať
                        </button>
                    </span>
                </div>
            </div>
            <button type="submit" name="add_training" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus-sign"></span> Pridať
            </button>
        </form>
    </div>
</div>
    <?php
        if (isset($_POST['add_training']))
        {
            $app->addTraining();
        }
    }
}
else
{
    //echo "You must login or sign up";
    echo "<script>location.href = 'index.php';</script>";
}
?>
</body>
