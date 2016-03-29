<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

// Add middleware to the application
$app = new \Slim\App($container);
$app->add(new \Slim\HttpCache\Cache('public', 86400, false));