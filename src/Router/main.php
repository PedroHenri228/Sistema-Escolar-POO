<?php

use App\Http\Routes;

Routes::get('/', 'HomeController@index'); 
Routes::get('/turmas', 'ClassController@list');
Routes::get('/nova_turma', 'ClassController@registerPage');
Routes::get('/nova_atividade', 'ActivityController@registerPage');
Routes::get("/delete/{id}", "ClassController@delete");
Routes::get('/atividades/{id}', 'ActivityController@list');

Routes::post('/nova_turma', 'ClassController@register');
Routes::post('/nova_atividade', 'ActivityController@register');

$method = $_SERVER['REQUEST_METHOD'];


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/sistema_escolar_poo', '', $uri); 


Routes::dispatch($method, $uri);