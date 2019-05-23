<?php

namespace app\controllers\site;

use app\controllers\Controller;

class TeamController extends Controller {

	public function index() {

		$this->view('site.2-team', [
            'title' => 'Equipe Almeida Jiu-Jitsu',
            'css_file' => [
				'all.css',
				'text-effect.css',
				'partials-team-header.css'
			]				
		]);

	}
}