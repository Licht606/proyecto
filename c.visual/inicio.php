<?php 

require_once 'config/config.php';
require_once 'modelo/db.php';

if(!isset($_GET["controlador"])) $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controlador/'.$_GET["controlador"].'.php';

/* Check if controller exists */
if(!file_exists($controller_path)) $controller_path = 'controlador/'.constant("DEFAULT_CONTROLLER").'.php';

/* Load controller */
require_once $controller_path;
$controllerName = $_GET["controlador"].'Controller';
$controller = new $controllerName();

/* Check if method is defined */
$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();


/* Load views */
require_once 'vista/plantilla/header.php';
require_once 'vista/'.$_GET["controlador"].'/'.$controller->view.'.php';
require_once 'vista/plantilla/footer.php';

?>