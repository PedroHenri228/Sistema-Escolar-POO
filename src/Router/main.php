<?php

use App\Http\Routes;

Routes::get('/', 'HomeController@index'); 
Routes::get('/turmas', 'ClassController@list');
Routes::get('/nova_turma', 'ClassController@registerPage');
Routes::get("/delete/{id}", "ClassController@delete");
Routes::get('/delete_activity/{id}', 'ActivityController@delete');
Routes::get('/editar/{id}', 'ClassController@editPage');
Routes::get('/atividades', 'ActivityController@list');
Routes::get('/nova_atividade', 'ActivityController@registerPage');

Routes::post('/nova_turma', 'ClassController@register');
Routes::post('/nova_atividade', 'ActivityController@registerPage');

$method = $_SERVER['REQUEST_METHOD'];


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/sistema_escolar_poo', '', $uri); 


Routes::dispatch($method, $uri);