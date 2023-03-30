<?php

spl_autoload_register('classAutoload');

function classAutoload(string $className): void
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (str_contains($url, 'includes')) {
        $path = '../classes/';
    } else {
        $path = 'classes/';
    }

    $extension = '.class.php';

    require_once $path . $className . $extension;
}
