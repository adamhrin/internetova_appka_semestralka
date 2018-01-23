<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 30.12.2017
 * Time: 22:02
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "classes/User.php";
include_once "classes/IStorage.php";
include_once "classes/DBStorage.php";


if(isset($_POST['nick_signup']) && isset($_POST['password_signup']))
{
    $db = new DBStorage();
    //debug_to_console("pred registraciou");
    if($_POST['nick_signup'] == 'admin')
    {
        echo 'No';
        die();
    }

    $id_user = 0;
    if($db->registerUser($_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['nick_signup'], $_POST['password_signup'], $id_user))
    {
        $_SESSION['user'] = $_POST['nick_signup'];
        if ($id_user != 0)
        {
            $_SESSION['id_user'] = $id_user;
        }
        else
        {
            echo 'No';
            die();
        }
        echo 'Yes';
        die();
    }
    else // uz taky user existuje
    {
        echo 'No';
        die();
    }
}

function debug_to_console($data)
{
    if(is_array($data) || is_object($data))
    {
        echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
    } else {
        echo("<script>console.log('PHP: ".$data."');</script>");
    }
}
