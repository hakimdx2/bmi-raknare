<?php

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

return function (App $app) {
    // Debug Route
    $app->get('/debug', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Debug: Slim is working");
        return $response;
    });

    // Home
    $app->get('/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'home.twig');
    });

    // Segments (Kvinna, Man, Barn)
    $app->get('/bmi-kvinna/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/segment.twig', ['segment' => 'kvinna']);
    });

    $app->get('/bmi-man/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/segment.twig', ['segment' => 'man']);
    });

    $app->get('/bmi-barn/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/segment.twig', ['segment' => 'barn']);
    });

    // Segment: Äldre (65+)
    $app->get('/bmi-aldre/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/aldre.twig');
    });

    // Segment: Gravid (Pregnancy)
    $app->get('/bmi-gravid/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/gravid.twig');
    });

    // Money Page (Ozempic)
    $app->get('/bmi-ozempic-krav/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/ozempic.twig');
    });

    // Edu Page (Formula)
    $app->get('/bmi-formel/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/formel.twig');
    });

    // Edu Page (Ideal Weight)
    $app->get('/idealvikt/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/idealvikt.twig');
    });

    // Edu Page (Table)
    $app->get('/bmi-tabell/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/tabell.twig');
    });

    // Tool: Calorie Calculator
    $app->get('/kalorier/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/kalorier.twig');
    });

    // Widget Builder
    $app->get('/widget/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/widget-builder.twig');
    });

    // Embed
    $app->get('/embed/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/embed.twig');
    });
    // Legal Pages
    $app->get('/integritetspolicy/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/integritetspolicy.twig');
    });

    $app->get('/kontakt/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/kontakt.twig');
    });

    // Sitemap
    $app->get('/sitemap.xml', function (Request $request, Response $response, $args) {
        $baseUrl = 'https://bmi-raknare.se';
        $today = date('Y-m-d');
        
        $pages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => '/bmi-kvinna/', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => '/bmi-man/', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => '/bmi-barn/', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/bmi-aldre/', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => '/bmi-gravid/', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/bmi-ozempic-krav/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => '/idealvikt/', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/kalorier/', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/bmi-formel/', 'priority' => '0.7', 'changefreq' => 'yearly'],
            ['url' => '/bmi-tabell/', 'priority' => '0.7', 'changefreq' => 'yearly'],
            ['url' => '/integritetspolicy/', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['url' => '/kontakt/', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($pages as $page) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . $page['url'] . '</loc>';
            $xml .= '<lastmod>' . $today . '</lastmod>';
            $xml .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';

        $response->getBody()->write($xml);
        return $response->withHeader('Content-Type', 'application/xml');
    });
};
