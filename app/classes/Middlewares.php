<?php
/**
 * Class: Middlewares.php
 *
 */

namespace app\classes;

class Middlewares {

	/**
	 * $config receives a array[]
	 */
	private $config;

	# Load file 'config.php'
	function __construct() {
		$this->config = (object) Load::file('/config.php');
	}

	/**
	 * if the SESSION 'loggedIn' is active, return the data of 'redirect'
	 */
	function admin() {

		$config = $this->config->login['admin'];

		$admin = function ($request, $response, $next) use ($config) {

			if (!isset($_SESSION[$config['loggedIn']])) {
				return $response->withRedirect($config['redirect']);
			}

			$response = $next($request, $response);

			return $response;
		};

		return $admin;
	}

}