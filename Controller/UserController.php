<?php

namespace App\Controller;

use App\Models\User;

class UserController{

	public static function Login($request){
		$password = $request->password;
		$username = $request->username;
		$user = User::findUserByCredentials($username, $password);
		if(!$user){
			die("Credentials not valid!");
		}
		$user = User::createToken($user);
		header('Content-Type: application/json');
		echo json_encode($user);
	}

	public function verify($request){
		$token = $request->getHeader()['token'];
		$username = $request->getHeader()['username'];
		$user = User::findUserByToken($username, $token);
		if(!$user){
			die("Credentials not valid!");
		}
		header('Content-Type: application/json');
		echo json_encode($user);
	}

	public function create($request){
		$request->password = password_hash($request->password,PASSWORD_DEFAULT);
		$user = User::findOne(["username" => $request->username]);
		if($user){
			header('Content-Type: application/json');
			$response = [ "Error Message" => "User already exist"];
			die (json_encode($response));
		}
		$user = User::InsertOne($request);
		$user = User::createToken($user);
		header('Content-Type: application/json');
		echo json_encode($user);
	}

	public function update($request){
		$filter =  ['username' => $request->username];
		$update =  ['$set' => ['email' => $request->email]];
		$count = User::updateOne($filter , $update);
		header('Content-Type: application/json');
		echo json_encode($count);
	}

	public function delete($request){
		$filter =  ['username' => $request->username];
		$count = User::deleteOne($filter);
		header('Content-Type: application/json');
		echo json_encode($count);
	}
}