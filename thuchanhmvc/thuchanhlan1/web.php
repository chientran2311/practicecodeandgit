<?php
require_once 'config.php';

$controller = isset($_GET["controller"]) ? $_GET["controller"] : 'property';
$action = isset($_GET["action"]) ? $_GET["action"] : 'index';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerClass.php";

if(file_exists($controllerFile)) {
    require_once($controllerFile);
    $controllerNow = new $controllerClass();
    $controllerNow->$action();
}else{
    echo"No controllers were found";
}
?>

