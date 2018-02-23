<?php 

require_once '../vendor/autoload.php';
require_once '../Model/model.php';
require_once '../Model/User.php';
require_once '../Resource/Util.php';
require_once '../Resource/Router.php';
require_once '../router/web.php';
require_once '../Controller/UserController.php';
define('API_SECRET_TOKEN', "ASD#G33232412ftw");
$request = APP\Resource\Util::getRequest();

$url = $_SERVER['REQUEST_URI'];
$requestUri = explode('?',$url,2);

$route;
switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		$route = App\Router::$getRouter;
		break;
	
	case 'POST':
		$route = App\Router::$postRouter;
		break;

	case 'PATCH':
		$route = App\Router::$patchRouter;
		break;

	case 'DELETE':
		$route = App\Router::$deleteRouter;
		break;
	default:
		$route = App\Router::$getRouter;
		break;
}

if(!$route[$requestUri[0]]){
	header('Content-Type: application/json');
	$response = [ "Error Message" => "Page do not exist"];
	die (json_encode($response));
}else{
	$requestRoute = $route[$requestUri[0]];
	$controllerName	  = explode('@', $requestRoute)[0];
	$controllerMethod = explode('@', $requestRoute)[1];
	$controllerName::$controllerMethod($request);
}