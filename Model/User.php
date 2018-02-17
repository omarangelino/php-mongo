<?php
namespace App\Models;

use App\Models\Model;

class User extends Model {

	protected static $table = "users";
	protected $password;

	public function __construct(){

	}
	
	public function findUserByCredentials($username, $password){
		$user =	User::findOne(['username' => $username]);
		if($user && password_verify($password,$user->password))
		{
			return $user;
		}	
		return 	null;
	}

	public function findUserByToken($username, $token)
	{
		$user =	User::findOne(['username' => $username]);
		if($user)
		{
			return User::verifyToken($user,$token);
		}	
		return 	null;
	}

	public static function createToken($user){
		$token = hash("md5", API_SECRET_TOKEN.$user->_id);
		$user = [ "username" => $user->username, "token" => $token];
		return $user;
	}

	public static function verifyToken($user, $token){
		if(hash("md5", API_SECRET_TOKEN.$user->_id) == $token){
			return $user;
		}else{
			return null;
		}
	}

}
