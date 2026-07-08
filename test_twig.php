<?php
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true,
]);

try {
    echo "Testing home.twig...\n";
    $twig->render('home.twig');
    echo "OK\n";
    
    echo "Testing components/calculator.twig...\n";
    $twig->render('components/calculator.twig');
    echo "OK\n";

    echo "Testing pages/ozempic.twig...\n";
    $twig->render('pages/ozempic.twig');
    echo "OK\n";

    echo "Testing pages/formel.twig...\n";
    $twig->render('pages/formel.twig');
    echo "OK\n";

    echo "Testing pages/segment.twig (with data)...\n";
    $twig->render('pages/segment.twig', ['segment' => 'kvinna']);
    echo "OK\n";
    
    echo "Testing pages/widget-builder.twig...\n";
    $twig->render('pages/widget-builder.twig');
    echo "OK\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    exit(1);
}
