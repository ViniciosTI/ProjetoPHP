<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/ 
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
$router->group(['prefix' => '/api'], function() use($router){
    $router->post("/calcular", "Calculo@calcular");
    $router->post("/porcentagem", "Calculo@porcentagem");
});
$router->get('/', function () use ($router)  {
    return $router->app->version();
});
