<?php
/**
 * config.php
 * Return array[ email[], login[ admin[], user[] ] ]
 */

// https://mailtrap.io/

return [
	'email' => [
		'host' => 'smtp.mailtrap.io',
		'port' => 465,
		'username' => '95c2da5cb77921',
		'password' => 'cc0e4f561ab39d',
	],
	'login' => [
		'admin' => [
			'loggedIn' => 'admin_login',
			'redirect' => '/login',
			'idLoggedIn' => 'id_admin',
		],
		'user' => [
			'loggedIn' => 'user_login',
			'redirect' => '/',
			'idLoggedIn' => 'id_user',
		],
	],
];