<?php

// framework/autoload.php 在入口文件中加载
require_once __DIR__.'/vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->register();
//add the code needed to autoload the component:
$loader->registerNamespace(
    'Symfony\\Component\\HttpFoundation', __DIR__.'/vendor/symfony/http-foundation'
);