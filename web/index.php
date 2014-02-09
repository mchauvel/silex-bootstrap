<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/{pageName}', function ($pageName) use ($app) {
    return $app['twig']->render($pageName.'.html.twig');
})
->value('pageName', 'index');

$app->run();
