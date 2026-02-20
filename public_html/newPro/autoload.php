<?php

// Register autoloader
spl_autoload_register(function ($namespace) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . $namespace . ".php";
});
