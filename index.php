<?php
session_start();
ob_start();
require_once 'autoload.php';
require_once 'config/config.php';
require_once 'views/layouts/header.php';

function redirectIndex()
{
    header("Location: ".base_url);
}

if(!isset($_SESSION['user']) && !isset($GET['a']) && !isset($_GET['c']))
{
    $userController = new usersController();
    $userController->register();
}

if(isset($_GET['c']))
{
    $nameController = $_GET['c']."Controller";
    if(class_exists($nameController))
    {
        $controller = new $nameController;

        if(isset($_GET['a']) && method_exists($controller, $_GET['a']))
        {
            $action = $_GET['a'];

            $controller->$action();
        }else
        {
            echo "<h1>Sorry, the page you were looking for doesn’t exist, try to go to the <a href='". base_url ."'>index</a></h1>";
        }
    }else
    {
        echo "<h1>Sorry, the page you were looking for doesn’t exist, try to go to the <a href='". base_url ."'>index</a></h1>";
    }
}

if(isset($_SESSION['user']) && !isset($GET['a']) && !isset($_GET['c']))
{
    $choresControlelr = new choresController();
    $choresControlelr->main();
}

include_once 'views/layouts/footer.php';
?>