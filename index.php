<?php

set_include_path(get_include_path()
    .PATH_SEPARATOR.'application/controller'
    .PATH_SEPARATOR.'application/model'
    .PATH_SEPARATOR.'application/view'
    .PATH_SEPARATOR.'application/core'
    .PATH_SEPARATOR.'packeges/phpQuery');

$resultLoad = spl_autoload_register(function ($class){
    include ($class.'.php');
});
$front = FrontController::getInstance();
try {
    $front->route();
} catch(Exception $e) {
    if ($e->getMessage() == '404') {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        echo '<h1>404</h1>';
    }
}