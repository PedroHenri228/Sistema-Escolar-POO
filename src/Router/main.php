<?php

use App\Http\Routes;

Routes::get('/', 'HomeController@index'); 
Routes::get('/turmas', 'ClassController@list');
Routes::get('/nova_turma', 'ClassController@registerPage');
Routes::get('/login', 'UserController@loginPage'); 
Routes::get('/registrar', 'UserController@registerPage'); 
Routes::get('/logout', 'UserController@logout'); 


Routes::post('/registrar', 'UserController@registrar'); 
Routes::post('/login', 'UserController@login');
Routes::post('/nova_turma', 'ClassController@register');


$method = $_SERVER['REQUEST_METHOD'];


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/sistema_escolar_poo', '', $uri); 


Routes::dispatch($method, $uri);