<?php

namespace app\controllers\site;

use app\controllers\Controller;

class ProjectController extends Controller {

	public function index() {

		$this->view('site.3-project', [
			'title' => 'Projeto Almeida JJ',
			'css_file' => [
				'all.css',
				'text-effect.css',
				'partials-project-header.css'			
			]
		]);

	}
}