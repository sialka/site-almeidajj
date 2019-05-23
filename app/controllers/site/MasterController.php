<?php
/**
 * Controller: HomeController.php
 *
 */

namespace app\controllers\site;

use app\classes\Load;
use app\controllers\Controller;

class MasterController extends Controller {

	public function index($request, $response, $args) {

		$name = $args['name'];

		# Validação
		$validation = ['caio', 'diogo', 'alemao', 'gaucho', 'guga'];
		if (!in_array($name, $validation)) {
			redirect('/404');
		}

		$master = (object) Load::file('/app/data/master.php')[$name];		   
		// dd($master->nome);
  
		$this->view('site.4-master', [
			'title' => 'Almeida JJ Itaquera',
			'master' => $master->nome,
			'photos' => $master->fotos,
			'about' => $master->sobre,
			'belt' => $master->faixa,
			'formation' => $master->formacao,
			'championships' => $master->titulos,
			'css_file' => [
				'all.css',	
				'partials-master-header.css'			
			]				
		]);

		
	}

}