<?php
//debug_to_console("adas");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "classes/User.php";
include_once "classes/IStorage.php";
include_once "classes/DBStorage.php";

if(isset($_POST['nick_login']) and isset($_POST['password_login']))
{
    $db = new DBStorage();
    //debug_to_console("dflhsdf");
    $user = $db->getUser($_POST['nick_login'], $_POST['password_login']);
    if($user == NULL) // nenaslo usera
    {
        echo "No";
        die();
    }
    else // naslo takeho usera
    {
        $_SESSION['user'] = $_POST['nick_login'];
        $_SESSION['id_user'] = $user['id_user'];
        echo "Yes";
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