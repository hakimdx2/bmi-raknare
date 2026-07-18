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

    // ISO-BMI (page dédiée générique — cible "iso bmi", renvoie vers /bmi-barn/ pour les enfants)
    $app->get('/iso-bmi/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/iso-bmi.twig');
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

    // About & Terms Pages (required for AdSense approval)
    $app->get('/om-oss/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/om-oss.twig');
    });

    $app->get('/anvandarvillkor/', function (Request $request, Response $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/anvandarvillkor.twig');
    });

    // Sitemap
    $app->get('/sitemap.xml', function (Request $request, Response $response, $args) {
        $baseUrl = 'https://bmi-raknare.se';

        // lastmod = vraie date de dernière modification du template de la page
        // (via filemtime), pas la date du jour. Un lastmod honnête garde sa valeur
        // de signal ; un lastmod qui affiche "aujourd'hui" à chaque crawl finit ignoré.
        // Les pages qui partagent un template (segments kvinna/man/barn) partagent
        // donc le même lastmod, ce qui est correct : elles évoluent ensemble.
        $templatesDir = dirname(__DIR__) . '/templates';
        $fallbackDate = date('Y-m-d');

        // url => priorité, fréquence, template relatif à /templates
        $pages = [
            ['url' => '/',                   'priority' => '1.0', 'changefreq' => 'weekly',  'tpl' => 'home.twig'],
            ['url' => '/bmi-kvinna/',        'priority' => '0.9', 'changefreq' => 'monthly', 'tpl' => 'pages/segment.twig'],
            ['url' => '/bmi-man/',           'priority' => '0.9', 'changefreq' => 'monthly', 'tpl' => 'pages/segment.twig'],
            ['url' => '/bmi-barn/',          'priority' => '0.8', 'changefreq' => 'monthly', 'tpl' => 'pages/segment.twig'],
            ['url' => '/iso-bmi/',           'priority' => '0.8', 'changefreq' => 'monthly', 'tpl' => 'pages/iso-bmi.twig'],
            ['url' => '/bmi-aldre/',         'priority' => '0.9', 'changefreq' => 'monthly', 'tpl' => 'pages/aldre.twig'],
            ['url' => '/bmi-gravid/',        'priority' => '0.8', 'changefreq' => 'monthly', 'tpl' => 'pages/gravid.twig'],
            ['url' => '/bmi-ozempic-krav/',  'priority' => '1.0', 'changefreq' => 'weekly',  'tpl' => 'pages/ozempic.twig'],
            ['url' => '/idealvikt/',         'priority' => '0.9', 'changefreq' => 'weekly',  'tpl' => 'pages/idealvikt.twig'],
            ['url' => '/kalorier/',          'priority' => '0.9', 'changefreq' => 'weekly',  'tpl' => 'pages/kalorier.twig'],
            ['url' => '/bmi-formel/',        'priority' => '0.7', 'changefreq' => 'yearly',  'tpl' => 'pages/formel.twig'],
            ['url' => '/bmi-tabell/',        'priority' => '0.7', 'changefreq' => 'yearly',  'tpl' => 'pages/tabell.twig'],
            ['url' => '/integritetspolicy/', 'priority' => '0.3', 'changefreq' => 'yearly',  'tpl' => 'pages/integritetspolicy.twig'],
            ['url' => '/kontakt/',           'priority' => '0.3', 'changefreq' => 'yearly',  'tpl' => 'pages/kontakt.twig'],
            ['url' => '/om-oss/',            'priority' => '0.5', 'changefreq' => 'monthly', 'tpl' => 'pages/om-oss.twig'],
            ['url' => '/anvandarvillkor/',   'priority' => '0.3', 'changefreq' => 'yearly',  'tpl' => 'pages/anvandarvillkor.twig'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($pages as $page) {
            $tplPath = $templatesDir . '/' . $page['tpl'];
            $lastmod = is_file($tplPath) ? date('Y-m-d', filemtime($tplPath)) : $fallbackDate;

            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . $page['url'] . '</loc>';
            $xml .= '<lastmod>' . $lastmod . '</lastmod>';
            $xml .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        $response->getBody()->write($xml);
        return $response->withHeader('Content-Type', 'application/xml');
    });
};
