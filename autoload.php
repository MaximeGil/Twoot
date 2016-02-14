<?php

// your autoloader

$autoload_map = array(
    'App' => 'src/App.php',
    'TestCase' => 'tests/TestCase.php',
    'Routing\Route' => 'src/Routing/Route.php',
    'View\TemplateEngine' => 'src/View/TemplateEngine.php',
    'View\TemplateEngineInterface' => 'src/View/TemplateEngineInterface.php',
    'Exception\ExceptionHandler' => 'src/Exception/ExceptionHandler.php',
    'Exception\HttpException' => 'src/Exception/HttpException.php',
    'Exception\templates\exception' => 'src/Exception/templates/exception.php',
    'Model\FinderInterface' => 'src/Model/FinderInterface.php',
    'Model\InMemoryFinder' => 'src/Model/InMemoryFinder.php',
    'Model\JsonFinder' => 'src/Model/JsonFinder.php',
    'Http\Request' =>'src/Http/Request.php'

);

spl_autoload_register(function ($className) use ($autoload_map) {
    if (!isset($autoload_map[$className])) {
        return false;
    }
    require_once __DIR__.'/'.$autoload_map[$className];
});
