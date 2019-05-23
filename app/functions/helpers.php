<?php
/**
 * Function: helpers.php
 *
 */

use app\classes\Flash;
use app\classes\Redirect;

/**
 * Function to test outputs
 */
function dd($data) {
	// var_dump($data);
	print_r($data);
	die();
}

/**
 * Function to test json
 */
function json($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
}

/**
 * Function to return the root directory
 */
function path() {
	$vendorDir = dirname(dirname(__FILE__));
	return dirname($vendorDir);
}

/**
 * Function to generate message using SESSION.
 */
function flash($index, $message) {
	Flash::add($index, $message);
}

/**
 * Function to return tag html.
 */
function error($message) {
	return "<span class='error'>* {$message}</span>";
}

/**
 * Function to return tag html.
 */
function success($message) {
	return "<span class='success'>{$message}</span>";
}

/**
 * Function to return the penultimate url valid
 */
function back() {
	Redirect::back();
	die();
}

/**
 * Function to return the url indicated
 */
function redirect($target) {
	Redirect::redirect($target);
	die();
}

/**
 * Function to filter string informed
 */
function busca() {
	return filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
}

?>