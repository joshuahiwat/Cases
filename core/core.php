<?php

spl_autoload_register(function ($className) {

    $fileName = str_replace('\\', '/', $className) . ".php";

    require_once dirname(__DIR__) . '/' . $fileName;

});
