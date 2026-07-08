<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Auto-detect structure (local vs flat prod)
$vendorPath = file_exists(__DIR__ . '/vendor/autoload.php') 
    ? __DIR__ . '/vendor/autoload.php' 
    : __DIR__ . '/../vendor/autoload.php';
require $vendorPath;

// Determine base path for other files
$basePath = file_exists(__DIR__ . '/src/routes.php') ? __DIR__ : dirname(__DIR__);

// Create App
$app = AppFactory::create();

// Environment (simple detection)
$isProduction = getenv('APP_ENV') === 'production' || $_SERVER['SERVER_NAME'] === 'bmi-raknare.se';

// Create Twig with Cache for Production
$twig = Twig::create($basePath . '/templates', [
    'cache' => $isProduction ? $basePath . '/cache' : false,
    'debug' => !$isProduction
]);

// Define Base URL based on Environment
if ($isProduction) {
    $baseUrl = 'https://bmi-raknare.se';
} else {
    // Dynamic logic for local/dev (supports localhost, .test, customs ports)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'];
}

$twig->getEnvironment()->addGlobal('base_url', $baseUrl);

// Add Twig Middleware
$app->add(TwigMiddleware::create($app, $twig));

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add Error Middleware (Disable details in prod)
$errorMiddleware = $app->addErrorMiddleware(!$isProduction, true, true);

// Custom 404 Handler
$errorMiddleware->setErrorHandler(\Slim\Exception\HttpNotFoundException::class, function ($request, $exception, $displayErrorDetails, $logErrors, $logErrorDetails) use ($app, $twig) {
    $response = $app->getResponseFactory()->createResponse();
    return $twig->render($response->withStatus(404), '404.twig');
});

// Load Routes
$routes = require $basePath . '/src/routes.php';
$routes($app);

$app->run();
