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
			return \APP\Resource\Util::createToken($user);
		}	
		return 	null;
	}

	public function findUserByToken($username, $token)
	{
		$user =	User::findOne(['username' => $username]);
		if($user)
		{
			return \APP\Resource\Util::verifyToken($user,$token);
		}	
		return 	null;
	}


}
