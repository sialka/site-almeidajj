<?php
/**
 * List of Routes
 **/

require_once "../bootstrap.php";

// Home
$app->get('/', 'app\controllers\site\HomeController:index');
$app->get('/404', 'app\controllers\site\HomeController:destroy');

// About
$app->get('/team', 'app\controllers\site\TeamController:index');
$app->get('/project', 'app\controllers\site\ProjectController:index');

// Master
$app->group('/master', function () use ($app) {
	$app->get('/{name}', 'app\controllers\site\MasterController:index');
});

// Atletas Patrocionados
$app->group('/athlete', function () use ($app) {
	$app->get('/{name}', 'app\controllers\site\AthleteController:index');
});


// Unidades
$app->group('/unidade', function () use ($app) {
	$app->get('/{name}', 'app\controllers\site\SubsidiaryController:index');
});



$app->run();
