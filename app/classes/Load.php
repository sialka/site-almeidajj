<?php
/**
 * Class: Load.php
 *
 */

namespace app\classes;

class Load {

	/**
	 * Function static returns the complete file path
	 */
	public static function file($file) {
		$file = path() . $file;		

		if (!file_exists($file)) {
			throw new \Exception("Esse arquivo não existe: {$file}");
		}

		return require $file;
	}

}