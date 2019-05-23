<?php
/**
 * Controller: HomeController.php
 *
 */

namespace app\controllers\site;

use app\classes\Load;
use app\controllers\Controller;

class AthleteController extends Controller {

	public function index($request, $response, $args) {

		$name = $args['name'];

		# Validação
		$validation = ['maria', 'bruno', 'cleber', 'iago', 'nathan', 'jackson', 'bianca', 'ricardo', 'raul'];
		if (!in_array($name, $validation)) {
			redirect('/404');
		}

		$athlete = (object) Load::file('/app/data/athlete.php');

		$this->view('site.5-athlete', [
			'title' => 'Almeida JJ Itaquera',
			'championships' => $athlete->$name['titulos'],
			'photos' => $athlete->$name['fotos'],
			'name' => $athlete->$name['nome'],
			'nickname' => $athlete->$name['apelido'],
			'birth' => $athlete->$name['nascimento'],
			'belt' => $athlete->$name['faixa'],
			'preparer' => $athlete->$name['preparador'],
			'team' => $athlete->$name['equipe'],
			'sponsors' => $athlete->$name['patrocinadores'],
			'supporters' => $athlete->$name['apoiadores'],
			'css_file' => 
			[
				'all.css',
				'partials-athlete-header.css'	
			]
		]);
	}

}