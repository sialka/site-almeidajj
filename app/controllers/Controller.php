<?php
/**
 *  Controller: Controller.php
 *
 */

namespace app\controllers;

use app\classes\Load;
use app\traits\View;

class Controller {

	use View;

	public function url($file, $chave1, $chave2) {

		$dados = Load::file($file);
		$data_name = array();
		$data_url = array();		

		foreach ($dados as $key => $value) {

			array_push($data_name, $value[$chave1]);
			array_push($data_url, $value[$chave2]);
		}

		foreach ($data_name as $key => $value) {
			$url_array[$value] = $data_url[$key];
		}


		return $url_array;
	}

	public function unit_name_url($file) {

		$dados = Load::file($file);
		$dados_chave = array();
		$dados_url = array();

		foreach ($dados as $key => $value) {
			array_push($dados_chave, $key);
			array_push($dados_url, $value['unidade']);
		}
		foreach ($dados_chave as $key => $value) {
			$url_array[$value] = $dados_url[$key];
		}

		return $url_array;
	}


}