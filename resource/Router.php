<?php
namespace App; 

class Router{
	
	public static $getRouter = [];
	public static $postRouter = [];
	public static $patchRouter = [];
	public static $deleteRouter = [];

	public static function get($path, $controller){
		self::$getRouter[$path] = $controller;
	}

	public static function post($path, $controller){
		self::$postRouter[$path] = $controller;
	}

	public static function patch($path, $controller){
		self::$patchRouter[$path] = $controller;
	}

	public static function delete($path, $controller){
		self::$deleteRouter[$path] = $controller;
	}

}