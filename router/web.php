<?php

use App\Router;

Router::post('/user/login', 'App\Controller\UserController@login');

Router::post('/user/verify', 'App\Controller\UserController@verify');

Router::post('/user/create', 'App\Controller\UserController@create');

Router::post('/user/update', 'App\Controller\UserController@update');

Router::post('/user/delete', 'App\Controller\UserController@delete');
