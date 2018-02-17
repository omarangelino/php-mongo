<?php
require_once '../autoload.php';

$url = $_SERVER['REQUEST_URI'];
$requestUri = explode('?',$url,2);

switch ($requestUri[0]) {
	case '/':
		require '../views/home.php';
		break;
	case '/user/login':
		$request = APP\Resource\Util::getRequest();
		App\Controller\UserController::login($request);
		break;
	case '/user/verify':
		$request = APP\Resource\Util::getRequest();
		App\Controller\UserController::verify($request);
		break;
	case '/user/create':
		$request = APP\Resource\Util::getRequest();
		App\Controller\UserController::create($request);
		break;
	case '/user/update':
		$request = APP\Resource\Util::getRequest();
		App\Controller\UserController::update($request);
		break;
	case '/user/delete':
		$request = APP\Resource\Util::getRequest();
		App\Controller\UserController::delete($request);
		break;
	default:
		header('Content-Type: application/json');
		$response = [ "Error Message" => "Page do not exist"];
		die (json_encode($response));
		break;
}