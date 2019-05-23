<?php
/**
 * Function: twig.php
 *
 */

// documentação de funções do twig (filters)
// https://twig.symfony.com/doc/2.x/

use app\classes\Flash;
use app\classes\Formdata;
// use app\models\admin\Admin;
use Carbon\Carbon;

$message = new \Twig_SimpleFunction('message', function ($index) {
	echo Flash::get($index);
});

$valueTag = new \Twig_SimpleFunction('valueTag', function ($key) {
	echo Formdata::get($key);
});

$admin = new \Twig_SimpleFunction('admin', function () {
	# return object Admin()
	return Admin::getUser();
});

$timeAgo = new \Twig_SimpleFunction('timeAgo', function ($date) {

	Carbon::setlocale('pt-br');

	$created = Carbon::parse($date);

	return $created->diffForHumans();

});

$stringUcFirst = new \Twig_SimpleFunction('stringUcFirst', function ($string) {

	return ucfirst($string);

});

// Functions used in twig
return [
	$message,
	$valueTag,
	$admin,
	$timeAgo,
	$stringUcFirst,
];

?>