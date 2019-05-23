<?php
/**
 * Controller: HomeController.php
 *
 */

namespace app\controllers\site;

use app\classes\Load;
use app\controllers\Controller;

class SubsidiaryController extends Controller {

	public function index($request, $response, $args) {

		$name = $args['name'];

		# Validação
		$validation = ['itaquera', 'casaverde', 'tatuape', 'vilamaria', 'itaimpaulista', 'sorocaba', 'jdimperador', 'brasilia', 'presidenteepitacio', 'itanhandu'];
		if (!in_array($name, $validation)) {
			redirect('/404');
		}

		$subsidiary = (object) Load::file('/app/data/subsidiary.php');

		// dd($unidade->$nome['fotos']);

		$this->view('site.subsidiary', [
			'title' => $subsidiary->$name['title'],
			'subsidiary' => $subsidiary->$name['unidade'],
			'photos' => $subsidiary->$name['fotos'],
			'address' => $subsidiary->$name['endereco'],
			'maps' => $subsidiary->$name['maps'],
			'calendar' => $subsidiary->$name['calendario'],
			'phones' => $subsidiary->$name['telefone'],
			'email' => $subsidiary->$name['email'],
		]);

	}

}